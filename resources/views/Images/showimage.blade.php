<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Show Image</title>
	<style>
		.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card mt-5">
					<div class="card-header">Show Images</div>

					<div class="card-body">
						<form action="" method="get" enctype="multipart/form-data">
							@csrf
							
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" value="{{ $data->name }}" readonly>
							</div>
							<div class="form-group img-container">
								<label>Profile Image</label>
								<input type="file" name="file" class="form-control" onchange="previewFile(this)">
                                <img id="previewimg" alt="Profile Image"  class="center" src="{{ asset('images') }}/{{ $data->profileimage }}" style="max-width: 400px; max-length:1000px; "/>
							</div>
							
							
							<a href="{{url('Images/allImage')}}" class="btn btn-danger">Back</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function previewFile(input)
    {
        var file=$("input[type=file]").get(0).files[0];
        if(file)
        {
            var reader=new FileReader();
            reader.onload=function()
            {
                $("#previewimg").attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        }

    }
</script>

</html>
