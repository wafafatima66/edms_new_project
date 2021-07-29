@extends('backEnd.master')
@section('mainContent')

<div class="card">
	<div class="card-header">
	<strong>All Documents</strong> 
	
</div>
</div>
<div class="col-12">
	<div class="row">
		<div class="card  mr-3">
			<div class="card-block" style="padding: 32px;">
				<a href="{{ url('doc_list/0/'.$id) }}">
					<div class="row align-items-center m-l-0">
						<div class="col-auto">
							<i class="ti-settings f-40 text-c-purple"></i>
						</div>
						<div class="col-auto">
							<h6 class="text-muted m-b-10">All</h6>
							<h2 class="m-b-0">@if(isset($allDoc)) {{count($allDoc)}}  @endif</h2>
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
				<a href="{{ url('doc_list/'.$row->id.'/'.$row->app_type) }}">
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
							<h2 class="m-b-0">{{$row->total_doc_nos}}</h2>
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