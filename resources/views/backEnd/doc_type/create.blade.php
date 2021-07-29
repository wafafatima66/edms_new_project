@extends('backEnd.master')
@section('mainContent')
<div class="row">
	<div class="col-md-5">
	

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
				<h5>Add New Type</h5>
			</div>
			<div class="card-block">
				{{ Form::open(['class' => '', 'files' => true, 'url' => 'doc_type_code',
				'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
					<div class="row">
						<div class="col-md-12">

							

							<div class="form-group row">
				                <label for="type_name" class="col-md-4 col-form-label text-md-right">Application Type</label>

				                <div class="col-md-6">
									<select class="js-example-basic-single col-sm-12 {{ $errors->has('app_type') ? ' is-invalid' : '' }}" name="app_type" id="app_type">
										<option value="">Select Type</option>
										@if(isset($app_types))
											@foreach($app_types as $app)
												<option value="{{$app->id}}">
												  {{$app->app_type_name}}
												</option>
											@endforeach
										@endif
										</select>
										@if ($errors->has('app_type'))
										<span class="invalid-feedback invalid-select" role="alert">
											<strong>{{ $errors->first('app_type') }}</strong>
										</span>
										@endif
				                </div>
				            </div>

							{{-- <div class="form-group row">
								<label for="type_name" class="col-md-4 col-form-label text-md-right" >Document Type</label>
								<div class="col-md-6">
								<select class="js-example-basic-single col-sm-12 {{ $errors->has('type_name') ? ' is-invalid' : '' }}" name="type_name" id="type_name" >
								<option value="">Select Document Type</option>
								</select>
							</div>
							</div> --}}

						
							<div class="form-group row">
				                <label for="type_name" class="col-md-4 col-form-label text-md-right">Document Type</label>

				                <div class="col-md-6">
				                    <input id="type_name" type="text" class="form-control{{ $errors->has('type_name') ? ' is-invalid' : '' }}" name="type_name" value="{{ old('type_name') }}" autocomplete="off" >

				                    @if ($errors->has('type_name'))
				                        <span class="invalid-feedback" role="alert">
				                            <strong>{{ $errors->first('type_name') }}</strong>
				                        </span>
				                    @endif
				                </div>
				            </div>

				            <div class="form-group row">
				                <label for="type_code" class="col-md-4 col-form-label text-md-right">Document Type Code</label>

				                <div class="col-md-6">
				                    <input id="type_code" type="text" class="form-control{{ $errors->has('type_code') ? ' is-invalid' : '' }}" name="type_code" value="{{ old('type_code') }}" autocomplete="off" >

				                    @if ($errors->has('type_code'))
				                        <span class="invalid-feedback" role="alert">
				                            <strong>{{ $errors->first('type_code') }}</strong>
				                        </span>
				                    @endif
				                </div>
				            </div>

				          
						</div>
					</div>
					<div class="form-group row mt-4">
						<div class="col-sm-12 text-center">
							<button type="submit" class="btn btn-primary m-b-0">Add</button>
						</div>
					</div>
				{{ Form::close()}}
			</div>
		</div>
	</div>
	<div class="col-md-7">
		<div class="card">
			<div class="card-header">
				<h5>Doc Type & Code</h5>
			</div>
			<div class="card-block">
				<div class="dt-responsive table-responsive">
				<table id="basic-btn" class="table table-striped table-bordered nowrap">
					<thead>
						<tr>
							<th>SL.</th>
							<th>Application Type</th>
							<th>Doc Type</th>
							<th>Type Code</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if(isset($doc_types))
							@php $i = 1 @endphp
							@foreach($doc_types as $doc_type)
							<tr>
								<td>{{$i++}}</td>
								
								<td>
									@php
										$app_type = $doc_type->app_type ;
										echo App\AppTypes::where('id','=',$app_type)->value('app_type_name');
									@endphp
								</td>
								<td>{{$doc_type->type_name}}</td>
								<td>{{$doc_type->type_code}}</td>
								<td> 
									<a href="{{ url('doc_type_code/'.$doc_type->id.'/edit') }}" title="Edit">
										<button type="button" class="btn btn-info action-icon"><i class="fa fa-edit"></i></button>
									</a>


									{{ Form::open(['action' => ['ErpDocTypeController@destroy',$doc_type->id], 'method' => 'POST','class' => 'pull-right']) }}
									{{ Form::hidden('_method','DELETE')}}
									<button type="submit" class="btn btn-danger action-icon"><i class="fa fa-trash-o"></i></button>
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

	{{-- changing document type according to application type --}}
	<script type="text/javascript">
		jQuery(document).ready(function ()
		{
				jQuery('select[name="app_type_name"]').on('change',function(){
				   var countryID = jQuery(this).val();
				   if(countryID)
				   {
					  jQuery.ajax({
						 url : 'doc_type_code/getDoc/'+countryID,
						 type : "GET",
						 dataType : "json",
						 success:function(data)
						 {
							console.log(data);
							jQuery('select[name="type_name"]').empty();
							jQuery.each(data, function(key,value){
							   $('select[name="type_name"]').append('<option value="'+ value +'">'+ value +'</option>');
							});
						 }
					  });
				   }
				   else
				   {
					  $('select[name="doc_type"]').empty();
				   }
				});
		});
		</script>
	


@endSection