@extends('inc.templates.t_dash')
@section('title','Create Comps')
@section('content')


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    
                    <div class="header">
                        <h4 class="title">Competition / Create</h4>
                        <p>Create a new Competiion</p>
                    </div>
                    
                    <div class="content">
                        {!! Form::open(array('route' => 'comps.store','files' => true)) !!}

                            <div class="form-group">
                                {{ Form::label('name','Name:') }}
                                {{ Form::text('name', null, array('class' => 'form-control')) }}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                {{ Form::label('country', 'Country:') }}
                                {{ Form::text('country', null, array('class' => 'form-control') ) }}

                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                {{ Form::label('city', 'City:') }}
                                {{ Form::text('city', null, array('class' => 'form-control') ) }}

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                {{ Form::label('suburb', 'Suburb:') }}
                                {{ Form::text('suburb', null, array('class' => 'form-control') ) }}

                                @if ($errors->has('suburb'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('suburb') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                {{ Form::label('logo', 'Logo:') }}
                                {{ Form::file('logo', null, array('class' => 'form-control') ) }}

                                @if ($errors->has('logo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                @endif
                            </div>


                        {{ Form::submit('Create Competition',array('class' => 'btn btn-primary btn-fill')) }}

                        {!! Form::close() !!}
                    </div>
            
                </div>
            </div>  
        </div>
    </div>
</div>

@stop

