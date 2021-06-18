
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-12">
		<table class="table-striped " border="1">
			<thead>
				<tr>
					<th>id</th>
					<th>Device Brand</th>
					<th>Device Name</th>
					<th>Device id</th>
					<th>Created At</th>
					<th>Updated At</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as  $getdata)
				<tr>
					
					<td>{{$getdata->id}}</td>
					<td>{{$getdata->device_brand}}</td>
					<td>{{$getdata->device_name}}</td>
					<td>{{$getdata->device_id}}</td>
					<td>{{$getdata->created_at}}</td>
					<td>{{$getdata->updated_at}}</td>
					@endforeach
				</tr>
			</tbody>
</table>
		
		</div>
		
	</div>
</div>
	
</body>
</html>



