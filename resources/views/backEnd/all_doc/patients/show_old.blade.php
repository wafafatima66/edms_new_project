<!-- @extends('backEnd.master')
@section('styles')
<style type="text/css">
    body {
  font-family: "Roboto", san-serif;
}

.center{
  text-align: center;
}
.menu {
  width: 120px;
  z-index: 1;
  box-shadow: 0 4px 5px 3px rgba(0, 0, 0, 0.2);
  position: fixed;
  display: none;
  transition: 0.2s display ease-in;

  .menu-options {
    list-style: none;
    padding: 10px 0;
    z-index: 1;
    
    .menu-option {
      font-weight: 500;
      z-index: 1;
      font-size: 14px;
      padding: 10px 40px 10px 20px;
      // border-bottom: 1.5px solid rgba(0, 0, 0, 0.2);
      cursor: pointer;

      &:hover {
        background: rgba(0, 0, 0, 0.2);
      }
    }
  }
}



button{
  background: grey;
  border: none;
  
  .next{
    color:green;
  }
  
  &[disabled="false"]:hover{
    .next{
      color: red;
      animation: move 0.5s;
      animation-iteration-count: 2;
    }
  }
}

@keyframes move{
  from{
    transform: translate(0%);
  }
  50%{
    transform: translate(-40%);
  }
  to{
    transform: transform(0%);
  }
}







</style>
@endsection

@section('mainContent')

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
    <div class="">
        <div class="row p-3">
            <h5 class="col" style="font-size: 1.3em">{{ ucfirst($patient->first_name) }} {{ ucfirst($patient->last_name) }} {{ ucfirst($patient->sur_name) }}</h5>
            <h5 class="col" style="font-size: 1.3em">Gender: {{ ucfirst($patient->gender) }}</h5>
            <h5 class="col" style="font-size: 1.3em">Born: {{date('d-M-Y', strtotime($patient->date_of_birth))}}</h5>
            <h5 class="col" style="font-size: 1.3em">Patient ID: {{$patient->patient_id}}</h5>
        </div>
        <div class="row p-3">
            <h5 class="col" style="font-size: 1.3em">{{ ucfirst($patient->address) }}</h5>
            <h4 class="col"></h4>
            <h4 class="col"></h4>
            <h5 class="col" style="font-size: 1.3em">NHS Number: {{$patient->nhs_no}}</h5>
        </div>
        <hr color="#000000">
    
      
        <!-- <a href="{{ url('document/create/'.$patient->id) }}" style="float: right; padding: 8px;" class="btn btn-success"> Add Document </a> -->
    </div>
    <div class="card-block">
        
        <div class="table table-responsive">
        <table id="basic-btn" class="table table-striped table-bordered nowrap">
            <thead>
                <tr>
                    <th class="context-menu-one btn btn-neutral">Doc Code </th>
                    <th>Name</th>
                    <th>Doc Type</th>
                    <th>Date</th>
                    <th>Speciality</th>
                    <th>Consultant</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach($patient->documents as $doc)
                @if($doc->active_status == 1)
                <tr>
                    <div class="menu" hidden="true">
  <ul class="menu-options">
    <li class="menu-option">Back</li>
    <li class="menu-option">Reload</li>
    <li class="menu-option">Save</li>
    <li class="menu-option">Save As</li>
    <li class="menu-option">Inspect</li>
  </ul>
</div>

                    <td>{{$doc->document_type_code}}</td>
                    <td><h3 class="center context-menu-one btn btn-neutral">{{$doc->document_name}}</h3></td>
                    <td>{{$doc->doc_type}}</td>
                    <td>{{date('d-M-Y', strtotime($doc->created_at))}}</td>
                    <td>{{$doc->speciality}}</td>
                    <td>{{$doc->consultant}}</td>
                    <td>
                        <!-- <iframe src="https://docs.google.com/gview?url=http://localhost/dms/document/{{$doc->id}}&embedded=true"></iframe> -->

                        <!-- <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://remote.url.tld/path/to/document.doc' width='1366px' height='623px' frameborder='0'>This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe> -->

                        <a href="{{url('document/edit/'.$doc->id)}}" title="Edit"><button type="button" class="btn btn-info action-icon"><i class="fa fa-edit"></i></button></a>

                        <a class="modalLink" title="Delete" data-modal-size="modal-md" href="{{url('deleteDocumentView', $doc->id)}}"><button type="button" class="btn btn-danger action-icon"><i class="fa fa-trash-o"></i></button>

                        <a href="{{url('document/'.$doc->id)}}" target="_blank"><button type="button" class="btn btn-sm" style="background-color: lightgrey; font-size: 1.05em;">Read File</button></a>
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

@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
     $(function() {
        $.contextMenu({
            selector: '.context-menu-one', 
            callback: function(key, options) {
                var m = "clicked: " + key;
                window.console && console.log(m) || alert(m); 
            },
            items: {
                "edit": {name: "Edit", icon: "edit"},
                "cut": {name: "Cut", icon: "cut"},
               copy: {name: "Copy", icon: "copy"},
                "paste": {name: "Paste", icon: "paste"},
                "delete": {name: "Delete", icon: "delete"},
                "sep1": "---------",
                "quit": {name: "Quit", icon: function(){
                    return 'context-menu-icon context-menu-icon-quit';
                }}
            }
        });

        $('.context-menu-one').on('click', function(e){
            console.log('clicked', this);
        })    
    });
     const menu = document.querySelector(".menu");
const menuOption = document.querySelector(".menu-option");
let menuVisible = false;

const toggleMenu = command => {
  menu.style.display = command === "show" ? "block" : "none";
  menuVisible = !menuVisible;
};

const setPosition = ({ top, left }) => {
  menu.style.left = `${left}px`;
  menu.style.top = `${top}px`;
  toggleMenu("show");
};

window.addEventListener("click", e => {
  if (menuVisible) toggleMenu("hide");
});

menuOption.addEventListener("click", e => {
  console.log("mouse-option", e.target.innerHTML);
});

window.addEventListener("contextmenu", e => {
  e.preventDefault();
  const origin = {
    left: e.pageX,
    top: e.pageY
  };
  setPosition(origin);
  return false;
});
});

</script>
@endsection -->