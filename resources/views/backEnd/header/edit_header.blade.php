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
				<h5>Edit Dashboard Settings</h5>
            </div>
            
			<div class="card-block">
				{{ Form::open(['class' => '', 'files' => true, 
				'method' => 'put', 'url' => 'header_edit','enctype' => 'multipart/form-data']) }}
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row">
				                <label for="type_name" class="col-md-4 col-form-label text-md-right">Header</label>

				                <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="header" value="{{ $header }}" autocomplete="off" placeholder="{{ $header }}">

				                </div>
				            </div>

						</div>
						<div class="col-md-12">
							<div class="form-group row">
                            <label for="type_name" class="col-md-4 col-form-label text-md-right" >Header Title</label>

				                <div class="col-md-6">
				                    <input id="name" type="text" class="form-control" name="header_t" value="{{ $header_t }}" autocomplete="off" placeholder="{{ $header_t }}">
				                </div>
				            </div>

						</div>

						<div class="col-md-12">

							<div class="form-group row">
								<label class="col-md-4 col-form-label text-md-right"  for="upload_document">Upload logo </label>
								<div class="col-md-6">
									<input data-preview="#preview" class="form-control" type="file" name="img" id="img">	
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group row">
                            <label for="type_name" class="col-md-4 col-form-label text-md-right" >Expandable Information</label>

				                <div class="col-md-6">
				                    <input id="name" type="text" class="form-control" name="exp_info" value="{{ $exp_info }}" autocomplete="off" placeholder="{{ $exp_info }}">
				                </div>
				            </div>

						</div>
						<div class="col-md-12">
							<div class="form-group row">
                            <label for="type_name" class="col-md-4 col-form-label text-md-right" >Telephone</label>

				                <div class="col-md-6">
				                    <input id="name" type="text" class="form-control" name="tel" value="{{ $tel }}" autocomplete="off" placeholder="{{ $tel }}">
				                </div>
				            </div>

						</div>
						<div class="col-md-12">
							<div class="form-group row">
                            <label for="type_name" class="col-md-4 col-form-label text-md-right" >Email</label>

				                <div class="col-md-6">
				                    <input id="name" type="email" class="form-control" name="email" value="{{ $email }}" autocomplete="off" placeholder="{{ $email }}">
				                </div>
				            </div>

						</div>
					</div>
					<div class="form-group row mt-4">
						<div class="col-sm-12 text-center">
							<button type="submit" class="btn btn-primary m-b-0">update</button>
						</div>
					</div>
				{{ Form::close()}}
			</div>
		</div>
	</div>

</div>

@endSection