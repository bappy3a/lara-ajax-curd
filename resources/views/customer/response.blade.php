<table class="table table-sctiped table-hover table-bordered">
	<thead>
		<th>ID</th>
		<th>Name</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Registered Date</th>
		<th>Manage</th>
	</thead>
	<tbody>
		@foreach($datas as $data)
		<tr>
			<td> {{$data->id }}</td>
			<td>{{ $data->name }}</td>
			<td>{{ $data->phone }}</td>
			<td>{{ $data->email }}</td>
			<td>{{ $data->created_at->format('M d,Y') }}</td>
			<td>
				<a href="{{ url('view/customer/data',$data->id) }}" id="view" class="btn btn-sm btn-success" >View</a>
				<a href="{{ url('edit/customer/data',$data->id) }}" class="btn btn-sm btn-primary" >Edite</a>
				<a onclick="return confirm('Are you sure to delete')" href="{{ url('delete/customer/data',$data->id) }}" id="delete" class="btn btn-sm btn-danger" >Delete</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{-- {!! $datas->render() !!} --}}