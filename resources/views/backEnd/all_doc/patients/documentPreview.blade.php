@if($documentUrl->file_type == 'jpg' || $documentUrl->file_type == 'png' || $documentUrl->file_type == 'jpeg') 

<img class="img-responsive" src="{{asset('public'.$documentUrl->upload_document)}}" width="100%" height="auto">

@else

<iframe src="https://docs.google.com/gview?url={{asset('public'.$documentUrl->upload_document)}}&embedded=true"
        style="width: 90%; height: 1000px">
            <p>Your browser does not support iframes.</p>
</iframe>
@endif

<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>





