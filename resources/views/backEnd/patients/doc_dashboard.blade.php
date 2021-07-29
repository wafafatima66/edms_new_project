@extends('backEnd.master')
@section('mainContent')

<div class="card">
    
       
    <div class="card-block">
        
    <div class="col-md-12">
        <div class="row">
            <h6 class="col" style="font-size: 1.3em">Patient Name: {{ ucfirst($patient_data->first_name) }} {{ ucfirst($patient_data->last_name) }} {{ ucfirst($patient_data->sur_name) }}</h6>
            <h6 class="col" style="font-size: 1.3em">Gender: {{ ucfirst($patient_data->gender) }}</h6>
            <h6 class="col" style="font-size: 1.3em">Born: {{date('d-M-Y', strtotime($patient_data->date_of_birth))}}</h6>
            <h6 class="col" style="font-size: 1.3em">Patient ID: {{$patient_data->patient_id}}</h6>
        </div>
        <hr color="#000000">
        <div class="row">
            <h6 class="col" style="font-size: 1.3em">Address: {{ ucfirst($patient_data->address) }}</h6>
            <h6 class="col" style="font-size: 1.3em">NHS Number: {{$patient_data->nhs_no}}</h6>
            <h4 class="col"></h4>
            <h6 class="col" style="font-size: 1.3em"></h6>
        </div>
        
    </div>
    </div>

</div>


<div class="card">
	<div class="card-header">
		<strong>All Documents</strong> 

		<a href="{{ url('document/create/'.$patient_data->id) }}" title="Add Document"><button type="button" class="btn btn-success action-icon pull-right">Add Document</button></a>

	</div>
</div>
<div class="col-12">
	<div class="row">
		<div class="card  mr-3">
			<div class="card-block" style="padding: 32px;">
				<a href="{{ url('patient_doc_list/0/All') }}">
					<div class="row align-items-center m-l-0">
						<div class="col-auto">
							<i class="ti-settings f-40 text-c-purple"></i>
						</div>
						<div class="col-auto">
							<h6 class="text-muted m-b-10">All</h6>
							<h2 class="m-b-0">@if(isset($allDoc)) {{count($allDoc)}} @endif</h2>
						</div>
					</div>
				</a>
			</div>
		</div>
		@if(isset($allDocType))
		@foreach($allDocType as $row)
		<div class="card  mr-3">
			<style type="text/css">
				.bg_color{
					background-color: #f8d7da;
				}
			</style>
			

			<div class="card-block <?php if($row->type_code == 'ALER'){echo "bg_color";}?>" style="padding: 32px; border-radius: inherit;" >
				<a href="{{ url('patient_doc_list/'.$row->id.'/'.$row->type_name) }}">
					<div class="row align-items-center m-l-0">
						<div class="col-auto">
							
								@if($row->type_code == 'ALER')
								<i class="fa fa-warning red-color" style="font-size:42px;color:red"></i>
								@else
								<i class="fa fa-file f-30 text-c-purple"></i>
								@endif
							
							
							
						</div>
						<div class="col-auto">
							<h6 class="text-muted m-b-10">{{$row->type_name}}</h6>
							<h2 class="m-b-0">
								<?php 
								$result = App\ErpDocumentType::patient_doc_type_counting($patient_user_define_id, $row->id)
								?>


								<?php
								if(isset($result)){
									echo count($result);

								}
								?>

								
							</h2>
						</div>
					</div>
				</a>
			</div>

		</div>
		@endforeach
		@endif
	</div>
</div>
@endsection