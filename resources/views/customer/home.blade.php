@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                		Customer data
                	<div class="pull-right">
						<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Customer</button>
					</div>
                </div>
 
                <div class="card-body table-responsive" id="ShowAllDataAjax">
                    
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
                </div>
					{!! $datas->render() !!}
            </div>
        </div>
    </div>
</div>
<div id="getalldata" data-url="{{ url('get/customer/data') }}"></div>
<div class="load">
	<img src="{{ asset('lod.gif') }}" alt="">
</div>

<!-- Add Customer Model -->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ url('add/customer/data') }}" method="POST" id="addcustomerform">
    	@csrf
    	<div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add Customer Data</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
			  </div>
			  <input type="text" class="form-control" placeholder="Name" name="name" autocomplete="on">
			</div>
	        <div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
			  </div>
			  <input type="text" class="form-control" placeholder="Phome" name="phone" autocomplete="on">
			</div>
	        <div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
			  </div>
			  <input type="text" class="form-control" placeholder="Email" name="email" autocomplete="on">
			</div>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
    </form>
  </div>
</div>



<!-- Customer Singel View Model -->
<div class="modal fade" id="viewCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			  <div class="cname">Dapibus ac facidivsis in</div>
			  <div class="cphone">Porta ac consectetur ac</div>	 
			  <div class="cemail">Morbi leo risus</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




@endsection
