<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Edit Record</title>
</head>
<body>

	<div class="container mt-5">
		<div class="row">
			<div class="col-md-12">
				<h3 class="float-center">Edit Record</h3>
				
				<div class="card">
					<div class="card-header">{{$data->id}}</div>
					<div class="card-body">
					<form action="{{route('student.update',$data->id)}}" method="Post">
					@csrf
						<div class="form-group">
							<label for="name">Name</label>	
							<input type="text" name="name" class="form-control" value="{{$data->name}}" >
						</div>

						<div class="form-group">
							<label for="email">Email</label>		
							<input type="email" name="email" class="form-control" value="{{$data->email}} " >
						</div>
						<div class="form-group">
							<label for="phone">Phone</label>		
							<input type="text" name="phone" class="form-control" value="{{$data->phone}}" >
						</div>
						<button type="submit" class="btn btn-success">Update</button>
						
						<a href="{{url('student')}}" class="btn btn-danger">Back</a>
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>h