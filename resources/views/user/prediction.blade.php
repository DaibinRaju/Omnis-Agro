@extends('user.layout')
@section('body')
<div class="col-md-12 col-xl-12 col-lg-12">
    <div class="card card-contact-box ">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-header-title">
                    <h2 class="f-40 m-b-20">Scan Result</h2>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                <a href="/user/scan">    <button type="button" class="btn btn-primary m-r-5"><i class="feather icon-plus"></i> New scan</button></a>
                </div>
            </div>
        </div>
        <div class="card-body ">
            <div class="card-contain text-center ">
                <img src="/images/{{$name ?? ''}}" style="height: 300px; width: 300px;" alt=" " class="img-radius m-t-20">
                
                <div class="w-100">
                    
                    <h6 class="f-w-400 f-20 p-b-5 m-0 p-t-15 ">Scan ID: {{$log->id}}</h6>
                    <h6 class="f-w-400 f-20 p-b-5 m-0 p-t-15 ">Scanned on: {{$log->created_at}}</h6>
                    <h6 class="f-w-400 f-20 p-b-5 m-0 p-t-15 ">Scan result: {{array_key_first($classes)}}</h6>
                    @foreach($classes as $class=>$percent)
                    <div class="card-progress p-t-10">
                        <div class="row ">
                            <div class="col-sm-3 text-right ">
                                <label class="text-muted ">{{$class}}</label>
                            </div>
                            <div class="col-sm-6 ">
                                <div class="progress ">
                                    <div class="progress-bar bg-c-blue " style="width:{{$percent}}%"></div>
                                </div>
                            </div>
                            <div class="col-sm-3 ">
                                <label class="text-muted ">{{$percent}}%</label>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <h6 class="f-w-400 f-20 p-b-5 m-0 p-t-15 ">{{$sol->solution}}</h6>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection