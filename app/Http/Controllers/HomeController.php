<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\Solution;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $logs = Log::where('user_id',Auth::user()->id)->get();
        
        return view('user.history', compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.scan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'input_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        //dd($request);
        if ($request->hasFile('input_img')) {
            $image = $request->file('input_img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

            

            $process = new Process(['python3', 'model_loader.py','images/'.$name]);
            $process->run();

            // executes after the command finishes
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            $out= $process->getOutput();
            
            $outArray=explode(" ",$out);
           
            $probability=$outArray[5];
            $identifications=["Bacterial Spot","Early Blight", "Healthy","Late blight", "Leaf Mold","Septoria leaf spot","Spider mites","Tomato target spot","Mosaic virus","Yello curl leaf virus"];
            for($i=0;$i<5;++$i){
                $classes[$identifications[(int)($outArray[$i])]]=$outArray[$i+5];
            }

            $firstKey=array_key_first($classes);
            
            $sol=Solution::where('name',$firstKey)->first();
            $log=Log::create([
                'path' =>$name,
                'user_id'=>Auth::user()->id,
                'result'=>serialize($classes)
            ]);
            
            return view('user.prediction',compact('classes','name','log','sol'));
            
        }
        return back()->with('success','Image Upload successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log=Log::findOrFail($id);
        if($log->user_id!=Auth::user()->id){
            return back();
        }
        $name=$log->path;
        $classes=unserialize($log->result);
        $firstKey=array_key_first($classes); 
        $sol=Solution::where('name',$firstKey)->first();
        return view('user.prediction',compact('classes','name','log','sol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $log=Log::findOrfail($id);
        $log->delete();
        return back()->with('success', 'deleted');
    }
}
