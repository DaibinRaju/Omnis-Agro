<?php

namespace App\Http\Controllers;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Http\Request;

class PredictionController extends Controller
{
    public function index(){
        return view('prediction');
    }
    
    
    public function predict(Request $request)
    {
        $image = $request->file('input_img');
        $name = time().'.'.$image->getClientOriginalExtension();
        dd($image);
        if ($request->hasFile('input_img')) {
            $image = $request->file('input_img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            //$this->save();
    
            return back()->with('success','Image Upload successfully');
        }
        
        /*
        $process = new Process(['python3', 'model_loader.py']);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $out= $process->getOutput();

        dd($out); 
        return view('prediction', 'out'); */
        //return view('prediction');
    }


}
