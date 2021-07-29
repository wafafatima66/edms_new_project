@extends('backEnd.master')
@section('mainContent')
<style type="text/css">
.hider{
  width: 100%;
  height: 55px;
  background-color: #FFFFFF;
  z-index: 9999;

}
</style>
<div class="row">
  <div class="col-12">
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

  </div>
</div>
<div class="row">
	<div class="col-md-4">

		<div class="card">
			<div class="card-header">
				<h5>Document Properties</h5>
			</div>
			<div class="card-block">
				{{ Form::open(['class' => '', 'files' => true, 'url' => 'document/update/'.$editData->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}
       <div class="row">
        <div class="form-group col-md-12">


          <label for="doc_type">Document Type:</label>
          <select class="js-example-basic-single col-sm-12 {{ $errors->has('doc_type') ? ' is-invalid' : '' }}" name="doc_type" id="doc_type">
            <option value="">Select Type</option>
            @if(isset($doc_types))
            @foreach($doc_types as $key=>$value)
            <option value="{{$value->id}}"
              @if(isset($editData))
              @if($editData->doc_type == $value->id)
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

        <div class="form-group col-md-12">
          <label for="document_type_code">Document Type Code: <span class="required"> (*) </span></label>
          <input type="text" class="form-control  {{ $errors->has('document_type_code') ? ' is-invalid' : '' }}" value="{{ $editData->document_type_code }}" name="document_type_code" id="document_type_code" />
          @if ($errors->has('document_type_code'))
          <span class="invalid-feedback" role="alert" >
           <span class="messages"><strong>{{ $errors->first('document_type_code') }}</strong></span>
         </span>
         @endif
       </div>

       <div class="form-group col-md-12">
        <label for="document_name">Document Name: <span class="required"> (*) </span></label>
        <input type="text" class="form-control {{ $errors->has('document_name') ? ' is-invalid' : '' }}" value="{{ $editData->document_name }}" name="document_name"/>
        @if ($errors->has('document_name'))
        <span class="invalid-feedback" role="alert" >
         <span class="messages"><strong>{{ $errors->first('document_name') }}</strong></span>
       </span>
       @endif
     </div>

     <div class="form-group col-md-12">
      <label for="owner">Owner: <span class="required"> (*) </span></label>
      <input type="text" class="form-control {{ $errors->has('owner') ? ' is-invalid' : '' }}" value="{{Auth::user()->name}}" name="owner" readonly="readonly" />
      @if ($errors->has('owner'))
      <span class="invalid-feedback" role="alert" >
       <span class="messages"><strong>{{ $errors->first('owner') }}</strong></span>
     </span>
     @endif
   </div>

   <div class="form-group col-md-12">
    <label for="speciality">Speciality:</label>
    <select class="js-example-basic-single col-sm-12 {{ $errors->has('speciality') ? ' is-invalid' : '' }}" name="speciality" id="speciality">
      <option value="">Select Speciality</option>
      @if(isset($specalitys))
      @foreach($specalitys as $key=>$value)
      <option value="{{$value->id}}"
        @if(isset($editData))
        @if($editData->speciality == $value->id)
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
  
  <div class="form-group col-md-12">
    <label for="consultant">Consultant:</label>
    <select class="js-example-basic-single col-sm-12 {{ $errors->has('consultant') ? ' is-invalid' : '' }}" name="consultant" id="consultant">
      <option value="">Select Consultant</option>
      @if(isset($consultants))
      @foreach($consultants as $key=>$value)
      <option value="{{$value->id}}"
        @if(isset($editData))
        @if($editData->consultant == $value->id)
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


  <div class="form-group col-md-12">
    <label for="created_date">Created Date: <span class="required"> (*) </span></label>
    <input disabled="disabled" type="" class="form-control datepicker {{ $errors->has('created_date') ? ' is-invalid' : '' }}" value="{{ date('d-m-Y', strtotime($editData->created_date)) }}"/>
    @if ($errors->has('created_date'))
    <span class="invalid-feedback" role="alert" >
      <span class="messages"><strong>{{ $errors->first('created_date') }}</strong></span>
    </span>
    @endif
  </div>
  <input type="hidden"  value="{{ date('d-m-Y', strtotime($editData->created_date)) }}" name="created_date"/>

  <div class="form-group col-md-12">
    <label for="document_date">Document Date: <span class="required"> (*) </span></label>
    <input type="" class="form-control datepicker {{ $errors->has('document_date') ? ' is-invalid' : '' }}" value="{{ date('d-m-Y', strtotime($editData->document_date)) }}" name="document_date"/>
    @if ($errors->has('document_date'))
    <span class="invalid-feedback" role="alert" >
      <span class="messages"><strong>{{ $errors->first('document_date') }}</strong></span>
    </span>
    @endif
  </div>

  <div class="form-group col-md-12">
    <label for="version_type">Doc Version Type: <span class="required"> (*) </span></label>
    <select class="js-example-basic-single col-sm-12 {{ $errors->has('version_type') ? ' is-invalid' : '' }}" name="version_type" id="version_type">
      <option value="Minor"
      @if(isset($editData))
      @if($editData->version_type == 'Minor')
      selected
      @endif
      @endif
      >Minor</option>
      <option value="Major"
      `@if(isset($editData))
      @if($editData->version_type == 'Major')
      selected
      @endif
      @endif
      >Major</option>

    </select>
    @if ($errors->has('version_type'))
    <span class="invalid-feedback" role="alert" >
      <span class="messages"><strong>{{ $errors->first('version_type') }}</strong></span>
    </span>
    @endif
  </div>

  <div class="form-group col-md-12">
    <label for="upload_document">Upload Document <span class="required"> (*) </span></label>
    <input data-preview="#preview" class="form-control" type="file" name="upload_document" id="upload_document">
    @if ($errors->has('upload_document'))
    <span class="invalid-feedback" role="alert" >
      <span class="messages"><strong>{{ $errors->first('upload_document') }}</strong></span>
    </span>
    @endif
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
  <div class="col-lg-12 hider">
    <h5 style="padding: 15px;">Document Preview</h5>
  </div>

  <div class="card" style="margin-top: -55px; z-index: 100;">
    @if($editData->file_type == 'jpg' || $editData->file_type == 'png' || $editData->file_type == 'jpeg') 

    <img class="img-responsive" src="{{asset('public'.$editData->upload_document)}}" width="100%" height="auto">

    @else

    <iframe src="https://docs.google.com/gview?url={{asset('public'.$editData->upload_document)}}&embedded=true"
      style="width: 100%; height: 1000px">
      <p>Your browser does not support iframes.</p>
    </iframe>
    @endif




  </div>
</div>
</div>
<style type="text/css">
div[aria-label="Pop-out"] {
  display: none;
}
.ndfHFb-c4YZDc-Wrql6b{
  display: none !important;
}
</style>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
     <div class="card-header">
      <h5>Send Email</h5>
    </div>
    <div class="card-block">
<div class="row">
<div class="col-lg-5">
   {{ Form::open(['class' => '', 'files' => true, 'url' => 'send_email/'.$editData->id,
        'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
  <div class="col-lg-12">
            <label for="receiver_id">Receiver Name:</label>
            <select class="js-example-basic-single col-lg-12 {{ $errors->has('receiver_id') ? ' is-invalid' : '' }}" name="receiver_id" id="receiver_id">
              <option value="">Select User</option>
              @foreach ($user as $row)
              <option value="{{$row->id}}">{{$row->name}}</option>    
              @endforeach


            </select>
            @if ($errors->has('receiver_id'))
            <span class="invalid-feedback invalid-select" role="alert">
              <strong>{{ $errors->first('receiver_id') }}</strong>
            </span>
            @endif
          </div>

      <div class="col-lg-12 pt-1">
            <label for="document_name" >Add Comment:</label>

            <textarea class="form-control" name="msg" placeholder="Write Your Comment"></textarea>
            @if ($errors->has('msg'))
            <span class="invalid-feedback invalid-select" role="alert">
              <strong>{{ $errors->first('msg') }}</strong>
            </span>
            @endif
          </div>

           <div class="form-group row mt-4">
        <div class="col-sm-12 text-center">
         <button type="submit" class="btn btn-primary m-b-0">Submit</button>
       </div>
     </div>
        {{ Form::close()}}
</div>
<div class="col-lg-7">
  <h5>All Comments</h5>
   <div class="table-responsive">
    <table class="table table-hover">
      @foreach($allComments as $value)
      <tr>
        <td>
          <div class="d-inline-block">
            <div class="row">
              <a href="#"><h6 class="pl-2" style="color: blue"> {{ $value->sender_name}} </h6> </a> 
              <p class="pr-2 pl-2"> To </p> 
              <a href="#"><h6 style="color: blue"> {{ $value->receiver_name}} </h6></a> 
            </div>
            <p class="text-muted">{{$value->msg}}</p>
            <p class="text-muted">{{date('H:i d-M-Y', strtotime($value->created_at))}}</p>
          </div>
        </td>
      </tr>

      @endforeach
    </table>
  </div>
</div>
</div>






     
  
   </div>


 </div>
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
                   console.log(data);
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


