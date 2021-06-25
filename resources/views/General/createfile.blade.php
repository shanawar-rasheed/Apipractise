<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Add student</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card mt-5">
					<div class="card-header">Upload File</div>
                    <h3>{{ __('message.welcome') }}</h3>
                    <h3>{{ __('message.language') }}</h3>
					<div class="card-body">
						<form action="{{route('uploadFile.store')}}" method="Post" enctype="multipart/form-data" >
							@csrf
								@if(Session::get('success'))
								<div class="alert alert-success">
									{{Session::get('success')}}
								</div>
								@endif
								@if(Session::get('fail'))
								<div class="alert alert-warning">
									{{Session::get('fail')}}
								</div>
								@endif
							<div class="form-group">
								<label>File</label>
								<input type="file" name="file" class="form-control">
							</div>
							<button class="btn btn-success" type="submit">Submit</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
