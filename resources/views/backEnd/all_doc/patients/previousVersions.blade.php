
<style type="text/css">
	.modal-dialog{
		 width: 1250px !important;
	}

	@media (min-width: 992px) {
  .modal-lg {
    width: 1250px;
  }
}

@media (min-width: 576px){
.modal-dialog {
    max-width: 1250px;
   
}
</style>
<div class="table-responsive">
	<table class="table m-0">
		<thead>
				    <th>Doc Type</th>
                    <th>Doc Code </th>
                    <th>Name</th>
                    <th>Speciality</th>
                    <th>Version No</th>
				    <th>Updated Date</th>
				    <th>Preview<br>
				    	For print and View, Click in Preview
				    </th>
			</thead>
		<tbody>
			@if(count($previousVersionss)>0)
			@foreach($previousVersionss as $value)
			<tr>
				<td>{{$value->name}}</td>
                <td>{{$value->document_type_code}}</td>
                <td>{{$value->document_name}}</td>
                <td>{{$value->name}}</td>
				<td>{{$value->version_no}}</td>
				<td>{{date('d-M-Y', strtotime($value->updated_at))}}</td>
				<td>
					@if($value->file_type == 'jpg' || $value->file_type == 'png' || $value->file_type == 'jpeg') 

<img class="img-responsive" src="{{asset('public'.$value->upload_document)}}" width="100%" height="auto">

@else

<iframe src="https://docs.google.com/gview?url={{asset('public'.$value->upload_document)}}&embedded=true"
        style="width: 60%; height: 150px">
            <p>Your browser does not support iframes.</p>
</iframe>
@endif
				</td>
			</tr>
			@endforeach
			@else
			<tr>
				<td>No Previous Versions</td>
				
			</tr>
			@endif



		</tbody>
	</table>
</div>

  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>