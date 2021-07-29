@extends('backEnd.master')
@section('mainContent')
<div class="row">
    <div class="col-md-8">

        @if(session()->has('message-danger'))
        <div class="alert alert-danger">
            {{ session()->get('message-danger') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5>Edit Document Type</h5>
            </div>
            <div class="card-block">
				{{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'doc_type_code/'.$editData->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
               
                <div class="row">
                    <div class="col-md-12">


                        <div class="form-group row">
                            <label for="type_name" class="col-md-4 col-form-label text-md-right">Application Type</label>

                            <div class="col-md-6">
                                <select class="js-example-basic-single col-sm-12 {{ $errors->has('app_type') ? ' is-invalid' : '' }}" name="app_type" id="app_type">
                                    {{-- <option value="">Select Type</option>
                                    <option value="" selected>Select Type 2</option> --}}
                                    @if(isset($app_types))
                                        @foreach($app_types as $app)
                                            <option value="{{$app->id}}" @if ($app->id==$editData->app_type)
                                                selected
                                            @endif>
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

                        <div class="form-group row">
                            <label for="type_name" class="col-md-4 col-form-label text-md-right">Document Type</label>

                            <div class="col-md-6">
                                <input id="type_name" type="text"
                                    class="form-control{{ $errors->has('type_name') ? ' is-invalid' : '' }}"
                                    name="type_name" value="{{ $editData->type_name }}" autocomplete="off">

                                @if ($errors->has('type_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('type_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="type_code" class="col-md-4 col-form-label text-md-right">Document Type
                                Code</label>

                            <div class="col-md-6">
                                <input id="type_code" type="text"
                                    class="form-control{{ $errors->has('type_code') ? ' is-invalid' : '' }}"
                                    name="type_code" value="{{ $editData->type_code }}" autocomplete="off">

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
                        <button type="submit" class="btn btn-primary m-b-0">Update</button>
                    </div>
                </div>
                {{ Form::close()}}
            </div>
        </div>
    </div>

</div>

@endSection
