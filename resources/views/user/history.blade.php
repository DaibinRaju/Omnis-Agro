@extends('user.layout')
@section('body')

<div class="row">
    <div class="col-sm-12">
        <div class="page-titles">
            <div class="align-self-center text-right">
            </div>
        </div>
        <div class="tab-content">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class=" col-md-3 col-sm-3">
                            <h5 class="card-title float-left align-self-center">History</h5>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <div class="float-right d-none d-xl-inline-block d-lg-inline-block">

                                <a href="/user/scan" class="float-right btn waves-effect waves-light btn-rounded btn-primary">New Scan</a>
                            </div>
                        </div>
                    </div>


                    <div class="clearfix"></div>
                    <div class="table-responsive">
                        <table class="table color-table primary-table">
                            <thead>
                                <tr>
                                    
                                    <th>Scan Id</th>
                                    <th>Scanned At</th>
                                    <th>Actions</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($logs as $row)
                                <tr>
                                    
                                    <td>{{$row['id']}}</td>
                                    <td>{{$row['created_at']}}</td>
                                    <td>
                                        <a href="/user/scan/{{$row['id']}}"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                                        <a id="delete" onclick="verify()" href="/user/scan/delete/{{$row['id']}}"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@if(session()->has('success'))
<script src="/assets/js/plugins/sweetalert.min.js"></script>
<script>
    swal("Success", "Entry deleted", "success");
</script>
@endif

@endsection