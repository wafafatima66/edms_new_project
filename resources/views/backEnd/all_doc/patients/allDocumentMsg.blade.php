@extends('backEnd.master')
@section('mainContent')

@if (session()->has('path'))
 
<a id="auto_download" href="{{ url('public'.session()->get('path')) }}" download hidden></a>
@endif
<script type="text/javascript">
   window.onload = function(){
  document.getElementById('auto_download').click();
}
</script>

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

@if(session()->has('message-success-checkedOut'))
<div class="alert alert-success mb-3 background-success" role="alert">
    {{ session()->get('message-success-checkedOut') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif(session()->has('message-danger-checkedOut'))
<div class="alert alert-danger">
    {{ session()->get('message-danger-checkedOut') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


<div class="card">
    <div class="card-header">
        <h5>All Documents Notifications</h5>
        
    </div>
       
    <div class="card-block">
        
        <div class="table table-responsive">
        <table id="basic-btn" class="table table-striped table-bordered nowrap">
            <thead>
                <tr>
                    <th>Doc Type</th>
                    <th>Doc Code </th>
                    <th>Name</th>
                    <th>Create Date</th>
                    <th>Speciality</th>
                    <th>Current Version</th>
                    <!-- <th>Consultant</th> -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach($documents as $doc)
                @if($doc->active_status == 1)
                <tr>
                  
                    <td>{{$doc->type_name}}
                    </td>
                    <td>{{$doc->document_type_code}}</td>
                    <td>{{$doc->document_name}}</td>
                    
                    <td>{{date('d-M-Y', strtotime($doc->created_at))}}</td>
                    <td>{{$doc->name}}</td>
                    <td>{{$doc->version_no}}</td>
                  <!--   <td>{{$doc->consultant}}</td> -->
                    <td>
                       

    <!-- <a href="#myModal" data-toggle="modal" data-target="#myModal_{{ $doc->id}}" title="Properties">
        <button type="button" class="btn btn-success action-icon"><i class="fa fa-eye"></i></button>
    </a> -->

    <!-- Document Details Model -->
     <div class="modal fade" id="myModal_{{ $doc->id}}" role="dialog" >
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    @if( isset($doc->document_name) )
                        <h4 class="modal-title" style="color:#000000">{{$doc->document_name}} - Previous Versions</h4>
                    @endif
                </div>
                <div class="modal-body" >
                    <div class="table-responsive">
                        <table class="table m-0">
                            <tbody>
                                <tr>
                                    <th scope="col">Document Code</th>
                                    <td>{{$doc->document_type_code}}</td>
                                </tr>

                               

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
                   
                        
                 
                         
                          <a  title="Preview" data-modal-size="modal-lg" href="{{url('preview_doc', $doc->id)}}"><button type="button" class="btn btn-success action-icon"><i class="ti ti-file"></i></button></a>

                         

                   


                      

                        

                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        </div>
    </div>

</div>



@endSection
