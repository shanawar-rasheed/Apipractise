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
					<div class="card-header">Add Student</div>
					
					<div class="card-body">
						<form action="{{route('student.store')}}" method="Post">
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
								<label>Name</label>
								<input type="text" name="name" class="form-control">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control">
							</div>
							<div class="form-group">
								<label>Phone</label>
								<input type="text" name="phone" class="form-control">
							</div>
							<button class="btn btn-success" type="submit">Submit</button>
							<a href="{{url('student')}}" class="btn btn-danger">Back</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>