@extends('user.layout')
@section('body')


<div class="row col-md-12 card" style="flex-direction: row;">
    <div class="col-md-3">

    </div>

    <div class="col-md-6">
        <div class="card-header  border-0 p-2 pb-0">
            <div class="my-auto align-self-center">
                <img src="/assets/images/logo.png" id="blah" alt="" style="width:100%; height:256px;" class="img-fluid ">
            </div>
        </div>
        <div class="card-body pt-0">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="custom-file">
                    <input type="file" name="input_img" onchange="readURL(this);" class="custom-file-input" id="customFile" required>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="text-center">
                    <br />
                    <input type="submit" class="btn  btn-success" value="Scan image">
                    <hr class="wid-80 b-wid-3 my-4">
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-3">

    </div>
</div>





<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);

            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection