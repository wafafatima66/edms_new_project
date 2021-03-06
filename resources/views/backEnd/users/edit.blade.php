@extends('backEnd.master')
@section('mainContent')
<div class="row">
    <div class="col-md-8 mx-auto">

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
                <h5>Edit User</h5>
            </div>
            <div class="card-block">
                {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'user/'.$editData->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                    value="{{ $editData->name }}" autocomplete="off">

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ $editData->email }}" autocomplete="off">

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role_id"
                                class="col-md-4 col-form-label text-md-right">{{ __('Role ID') }}</label>
                            <div class="col-md-6">
                                <select name="role_id" id="role_id" class="js-example-basic-single col-sm-12">
                                    <option value="">Select role</option>
                                    @if(isset($roles))
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}" @if(isset($editData)) @foreach($editData->roles as
                                        $rol)
                                        @if($rol->id == $role->id)
                                        selected
                                        @endif
                                        @endforeach
                                        @endif
                                        >{{$role->name}}</option>
                                    @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('role_id'))
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <span class="messages"><strong>{{ $errors->first('role_id') }}</strong></span>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="text"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password">

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="app_type_name" class="col-md-4 col-form-label text-md-right">Application
                                Type</label>

                            <div class="col-md-6">

                                <div class="form-check">
                                    @foreach ($app_types as $app)
                                        <label class="col-form-label text-md-right" style="font-weight: 500">
                                            {{$app->app_type_name}}
                                        </label>

                                        <div class="form-inline">
                                            @foreach ($doctypes as $doc)
    
                                            @if ($doc->app_type == $app->id)
                                            <div class="form-check mx-2">
                                                <input type="checkbox" name="document_type_id[]" value="{{ $doc->id }}" @if (in_array($doc->id , $modules))
                                                checked 
                                                @endif>
                                                <label class="ml-2">{{ $doc->type_name }}</label>
                                            </div>
                                            @endif
    
                                            @endforeach
                                        </div>

                                    @endforeach
                                    

                                   
                                </div>

                                @if ($errors->has('app_type_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('app_type_name') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div> 
{{-- 
                        <div class="form-group row">
                            <label for="app_type_name" class="col-md-4 col-form-label text-md-right">Application
                                Type</label>

                            <div class="col-md-6">

                                <div class="form-check">
                                    <label class="col-form-label text-md-right" style="font-weight: 500">
                                        Rio
                                    </label>

                                    <div class="form-inline">
                                        @foreach ($doctypes as $doc)

                                        @if ($doc->app_type_name == 'Rio')
                                        <div class="form-check mx-2">
                                            <input type="checkbox" name="document_type_id_1[]" value="{{ $doc->id }}" @if (in_array($doc->id , $modules))
                                            checked 
                                            @endif>
                                            <label class="ml-2">{{ $doc->type_name }}</label>
                                        </div>
                                        @endif

                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-check">
                                    <label class="col-form-label text-md-right " style="font-weight: 500">
                                        Synergy
                                    </label>

                                    <div class="form-inline">
                                        @foreach ($doctypes as $doc)
                                        @if ($doc->app_type_name == 'Synergy')
                                        <div class="form-check mx-2">
                                            <input type="checkbox" name="document_type_id_2[]" value="{{ $doc->id }}" @if (in_array($doc->id , $modules))
                                            checked 
                                            @endif>
                                            <label class="ml-2">{{ $doc->type_name }}</label>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-check">
                                    <label class="col-form-label text-md-right" style="font-weight: 500">
                                        Mosaic
                                    </label>

                                    <div class="form-inline">
                                        @foreach ($doctypes as $doc)
                                        @if ($doc->app_type_name == 'Mosaic')
                                        <div class="form-check mx-2">
                                            <input type="checkbox" name="document_type_id_3[]" value="{{ $doc->id }}" @if (in_array($doc->id , $modules))
                                            checked 
                                            @endif>
                                            <label class="ml-2">{{ $doc->type_name }}</label>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>



                                @if ($errors->has('app_type_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('app_type_name') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div> --}}

                       

                        <!-- <div class="form-group row">
				                <label for="previous_password" class="col-md-4 col-form-label text-md-right">{{ __('Previous Password') }}</label>

				                <div class="col-md-6">
				                    <input id="previous_password" type="password" class="form-control{{ $errors->has('previous_password') ? ' is-invalid' : '' }}" name="previous_password">

				                    @if ($errors->has('previous_password'))
				                        <span class="invalid-feedback" role="alert">
				                            <strong>{{ $errors->first('previous_password') }}</strong>
				                        </span>
				                    @endif
				                </div>
				            </div>

				            <div class="form-group row">
				                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

				                <div class="col-md-6">
				                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

				                    @if ($errors->has('password'))
				                        <span class="invalid-feedback" role="alert">
				                            <strong>{{ $errors->first('password') }}</strong>
				                        </span>
				                    @endif
				                </div>
				            </div>


				            <div class="form-group row">
				                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

				                <div class="col-md-6">
				                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
				                </div>
				            </div> -->
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
