@extends('user.layout')
@section('body')


<div class="card ">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="card-body">
                <div class="text-center">
                    <h4 class="mb-4 f-w-400">Change your password</h4>
                </div>
                <form method="post">
                    <div class="row">
                        <div class="col-xl-3"></div>
                        <div class="col-xl-6">
                            @csrf
                            <div class="input-group mb-4">
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Current password" required>
                                @error('password')
                                <label class="error jquery-validation-error small form-text invalid-feedback" for="password">{{$errors->first('password')}}</label>
                                @enderror
                            </div>
                            <div class="input-group mb-4">
                                <input type="password" id="newpassword" name="newpassword" class="form-control @error('newpassword') is-invalid @enderror" placeholder="New password" required>
                                @error('newpassword')
                                <label class="error jquery-validation-error small form-text invalid-feedback" for="password">{{$errors->first('newpassword')}}</label>
                                @enderror
                            </div>
                            <div class="input-group mb-4">
                                <input type="password" id="repassword" name="repassword" class="form-control @error('repassword') is-invalid @enderror" placeholder="Confirm password" required>
                                @error('repassword')
                                <label class="error jquery-validation-error small form-text invalid-feedback" for="repassword">Passwords do not match</label>
                                @enderror
                            </div>
                            <button class="btn btn-block btn-primary mb-4 rounded-pill">Change password</button>
                        </div>
                    </div>
                </form>
                <div class="col-xl-3"></div>
            </div>
        </div>
    </div>
</div>
@if(session()->has('success'))
<script src="/assets/js/plugins/sweetalert.min.js"></script>
<script>
    swal("Success", "Password changed", "success");
</script>
@endif

@if(session()->has('error'))
<script src="/assets/js/plugins/sweetalert.min.js"></script>
<script>
    swal("Error", "Incorrect password", "error");
</script>
@endif
@endsection