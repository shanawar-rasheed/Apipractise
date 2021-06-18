<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
	<title>Add Student</title>
</head>
<body>
	
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<a href="{{url('student/create')}}" class="btn btn-info mt-5">Add Student</a>
			<div class="card">
				<div class="card-header">
					
				</div>
				<div class="card-body">
					<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $data_var)
					<tr>
						<td>{{$data_var->id}}</td>
						<td>{{$data_var->name}}</td>
						<td>{{$data_var->email}}</td>
						<td>{{$data_var->phone}}</td>
						<td>
							<a href="{{route('student.show',$data_var->id)}}" class="btn btn-success">View</a>
							<a href="{{route('student.edit',$data_var->id)}}" class="btn btn-info">Edit</a>
							<a href="{{route('student.delete',$data_var->id)}}" class="btn btn-danger">Delete</a>
						</td>
					</tr>

					@endforeach
				</tbody>
			</table>
					<div class="d-flex justify-content-right ">
						
						{{$data->onEachSide(5)->links()}}

						<style type="text/css">
							.w-5
							{
								display: none;
							}
						</style>
					</div>
				</div>
			
			</div>	
		</div>
	</div>
</div>
				

			
</body>
</html>