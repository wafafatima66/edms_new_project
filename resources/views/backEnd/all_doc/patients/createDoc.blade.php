@extends('backEnd.master')
@section('mainContent')
<style type="text/css">
p{
	font-size: 15px;
}
.required {
	color: red;
}
</style>
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
<div class="card">
	<div class="card-header">
		<h5>Add New Document 

		</h5>
		<a class="btn btn-success mr-3 pull-right" href="{{ route('patient.show',$patient->id) }}">Back</a>
	</div>
	<div class="card-block">
		{{ Form::open(['class' => '', 'files' => true, 'url' => 'document/store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}
		<div class="row">
			<div class="col-md-8 offset-md-2 pt-4">
				<div class="row">
					<input type="text" class="form-control" value="{{ $patient->id }}" name="patient_id" hidden />
					<input type="hidden" class="form-control" value="{{ URL('/') }}" name="url" id="url" />

					<div class="form-group col-md-6">
				  	<label for="doc_type">Document Type:</label>
				  	<select class="js-example-basic-single col-sm-12 {{ $errors->has('doc_type') ? ' is-invalid' : '' }}" name="doc_type" id="doc_type">
					<option value="">Select Type</option>
					@if(isset($doc_types))
						@foreach($doc_types as $key=>$value)
							<option value="{{$value->id}}"
								@if(isset($editData))
									@if($editData->department_id == $value->id)
										selected
									@endif
								@endif
								>{{$value->type_name}}
							</option>
						@endforeach
					@endif
					</select>
					@if ($errors->has('department_id'))
					<span class="invalid-feedback invalid-select" role="alert">
						<strong>{{ $errors->first('department_id') }}</strong>
					</span>
					@endif
				</div>

					<div class="form-group col-md-6">
						<label for="document_type_code">Document Type Code: <span class="required"> (*) </span></label>
						<input type="text" class="form-control  {{ $errors->has('document_type_code') ? ' is-invalid' : '' }}" value="{{ old('document_type_code') }}" name="document_type_code" id="document_type_code" />
						@if ($errors->has('document_type_code'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('document_type_code') }}</strong></span>
						</span>
						@endif
					</div>

					

					<!-- <div class="form-group col-md-6">
						<label for="doc_type">Document Type: <span class="required"> (*) </span></label>
						<input type="text" class="form-control {{ $errors->has('doc_type') ? ' is-invalid' : '' }}" value="{{ old('doc_type') }}" name="doc_type"/>
						@if ($errors->has('doc_type'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('doc_type') }}</strong></span>
						</span>
						@endif
					</div> -->
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label for="document_name">Document Name: <span class="required"> (*) </span></label>
						<input type="text" class="form-control {{ $errors->has('document_name') ? ' is-invalid' : '' }}" value="{{ old('document_name') }}" name="document_name"/>
						@if ($errors->has('document_name'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('document_name') }}</strong></span>
						</span>
						@endif
					</div>

					<div class="form-group col-md-6">
						<label for="owner">Owner: <span class="required"> (*) </span></label>
						<input type="text" class="form-control {{ $errors->has('owner') ? ' is-invalid' : '' }}" value="{{Auth::user()->name}}" name="owner" readonly="readonly" />
						@if ($errors->has('owner'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('owner') }}</strong></span>
						</span>
						@endif
					</div>
				</div>

				<div class="row">
				<div class="form-group col-md-6">
				  	<label for="speciality">Speciality:</label>
				  	<select class="js-example-basic-single col-sm-12 {{ $errors->has('doc_type') ? ' is-invalid' : '' }}" name="speciality" id="speciality">
					<option value="">Select Speciality</option>
					@if(isset($specalitys))
						@foreach($specalitys as $key=>$value)
							<option value="{{$value->id}}"
								@if(isset($editData))
									@if($editData->department_id == $value->id)
										selected
									@endif
								@endif
								>{{$value->name}}
							</option>
						@endforeach
					@endif
					</select>
					@if ($errors->has('speciality'))
					<span class="invalid-feedback invalid-select" role="alert">
						<strong>{{ $errors->first('speciality') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group col-md-6">
				  	<label for="consultant">Consultant:</label>
				  	<select class="js-example-basic-single col-sm-12 {{ $errors->has('doc_type') ? ' is-invalid' : '' }}" name="consultant" id="consultant">
					<option value="">Select Consultant</option>
					@if(isset($consultants))
						@foreach($consultants as $key=>$value)
							<option value="{{$value->id}}"
								@if(isset($editData))
									@if($editData->department_id == $value->id)
										selected
									@endif
								@endif
								>{{$value->name}}
							</option>
						@endforeach
					@endif
					</select>
					@if ($errors->has('speciality'))
					<span class="invalid-feedback invalid-select" role="alert">
						<strong>{{ $errors->first('speciality') }}</strong>
					</span>
					@endif
				</div>
				</div>

				<div class="row">

					<div class="form-group col-md-6">
						<label for="created_date">Created Date: <span class="required"> (*) </span></label>
						<input type="" class="form-control datepicker {{ $errors->has('created_date') ? ' is-invalid' : '' }}" value="{{ date('d-m-Y') }}" name="created_date"/>
						@if ($errors->has('created_date'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('created_date') }}</strong></span>
						</span>
						@endif
					</div>

					<div class="form-group col-md-6">
						<label for="document_date">Document Date: <span class="required"> (*) </span></label>
						<input type="" class="form-control datepicker {{ $errors->has('document_date') ? ' is-invalid' : '' }}" value="{{ old('document_date') }}" name="document_date"/>
						@if ($errors->has('document_date'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('document_date') }}</strong></span>
						</span>
						@endif
					</div>
					

					
				</div>

				<div class="row">
					<div class="form-group col-md-6">
                        <label for="upload_document">Upload Document <span class="required"> (*) </span></label>
                        <input data-preview="#preview" class="form-control" type="file" name="upload_document" id="upload_document" required>
                        @if ($errors->has('upload_document'))
                            <span class="invalid-feedback" role="alert" >
                                <span class="messages"><strong>{{ $errors->first('upload_document') }}</strong></span>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
						
					</div>
				</div>
			</div>
		</div>
			
		<div class="form-group row mt-5">
			<div class="col-sm-8 offset-md-2 text-center">
				<a class="col-md-2 btn btn-danger mr-3" href="{{ route('patient.show',$patient->id) }}">Cancel</a>
				<button type="submit" class="col-md-2 btn btn-primary">Save</button>
			</div>
		</div>
		{{ Form::close()}}
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {

		$.ajaxSetup({
		  headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});
 
        $('#doc_type').on('change', function(e) {
        e.preventDefault();
        //doc_type = $(this).val();
       
          
            var url = $('#url').val();
        // alert(url + '/' + 'getDocTypeCode');
            var formData = {
                doc_type: $(this).val()
            };
            // get section for student
            $.ajax({
                type: "POST",
                data: formData,
               // dataType: 'json',
                url: url+'/getDocTypeCode',
                success: function(data) {
                  //  console.log(data);
                  if(data){
                  	$("#document_type_code").val('');
                  }
                  $("#document_type_code").val(data);
                   
                 
                   
                  
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
      
    });
});
</script>
@endSection