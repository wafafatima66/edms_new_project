@extends('backEnd.master')
@section('mainContent')
<div class="row">
	<div class="col-md-4">
		@if(session()->has('message-success'))
			<div class="alert alert-success mb-3 background-success" role="alert">
				{{ session()->get('message-success') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@elseif(session()->has('message-danger'))
			<div class="alert alert-danger">
				{{ session()->get('message-danger') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
		@if(session()->has('message-success-delete'))
			<div class="alert alert-danger mb-3 background-danger" role="alert">
				{{ session()->get('message-success-delete') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@elseif(session()->has('message-danger-delete'))
			<div class="alert alert-danger">
				{{ session()->get('message-danger-delete') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif

		<div class="card">
			<div class="card-header">
				<h5>Add New Application Type</h5>
			</div>
			<div class="card-block">
				{{ Form::open(['class' => '', 'files' => true, 'url' => 'application_type',
				'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-form-label">Application Name</label>
								<input type="text" class="form-control {{ $errors->has('role_name') ? ' is-invalid' : '' }}" name="app_name" id="app_name" placeholder="Add new application name" value="{{old('app_name')}}" autocomplete="off">

								@if ($errors->has('app_name'))
								<span class="invalid-feedback" role="alert">
									<span class="messages"><strong>{{ $errors->first('app_name') }}</strong></span>
								</span>
								@endif
							</div>
						</div>
					</div>
					<div class="form-group row mt-4">
						<div class="col-sm-12 text-center">
							<button type="submit" class="btn btn-primary m-b-0">Submit</button>
						</div>
					</div>
				{{ Form::close()}}
			</div>
		</div>
	</div>
	<div class="col-md-8">
		@if(session()->has('message-success-assign-role'))
			<div class="alert alert-success mb-3 background-success" role="alert">
				{{ session()->get('message-success-assign-role') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@elseif(session()->has('message-danger'))
			<div class="alert alert-danger">
				{{ session()->get('message-danger') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
		<div class="card">
			<div class="card-header">
				<h5>Application Types</h5>
			</div>
			<div class="card-block">
				<div class="dt-responsive table-responsive">
				<table id="basic-btn" class="table table-striped table-bordered nowrap">
					<thead>
						<tr>
							<th>Application id</th>
							<th>Application Name</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@if(isset($app_types))
							@php $i = 1 @endphp
							@foreach($app_types as $app)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$app->app_type_name}}</td>
								<td>
									<a href="{{ url('application_type/'.$app->id.'/edit') }}" title="edit">
										<button type="button" class="btn btn-info action-icon"><i class="fa fa-edit"></i></button>
									</a>
									

									{{ Form::open(['action' => ['ErpAppTypeController@destroy',$app->id], 'method' => 'POST','class' => 'pull-left ']) }}
									{{ Form::hidden('_method','DELETE')}}
									<button type="submit" class="btn btn-danger action-icon mr-2"><i class="fa fa-trash-o"></i></button>
									{{ Form::close()}}
								
							    </td>
							</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
			</div>
		</div>
	</div>
</div>

@endSection