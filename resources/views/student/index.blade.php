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
			<a href="{{ route('student.export-excel') }}" class="btn btn-success mt-5 float-right">Excel</a>
			<a href="{{ route('student.export-csv') }}" class="btn btn-danger mt-5 float-right mr-2">CSV</a>
			<a href="{{ route('student.export-pdf') }}" class="btn btn-primary mt-5 float-right mr-2">PDF</a>
			<div class="card">
				<div class="card-header">
					
				</div>
				<div class="card-body">
					<div class="form-group">
						<label for="autocomplete" class=" font-weight-bold">Autocomplete </label>
						<input type="text" class=" form-control typeahead" placeholder="Search...">
					</div>
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
					{{-- <div class="d-flex justify-content-right ">
						
						{{$data->onEachSide(5)->links()}}

						<style type="text/css">
							.w-5
							{
								display: none;
							}
						</style>
					</div> --}}
				</div>
			
			</div>	
		</div>
	</div>
</div>
				

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>	
		var path="{{ route('student.autocompleteSearch') }}";
		$('input.typeahead').typeahead({
			source:function(searches,process){
			 return $.get(path,{searches:searches},function(data){
				return process(data);
			 });
			}
		});	
	</script>		
</body>
</html>