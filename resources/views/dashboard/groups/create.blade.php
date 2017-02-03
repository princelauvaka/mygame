@extends('inc.templates.t_dash')
@section('title','Create Groups')
@section('content')


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    
                    <div class="header">
                        <h4 class="title">Groups / Create</h4>
                        <p>Create a new group</p>
                    </div>
                    
                    <div class="content">
                        {!! Form::open(array('route' => 'groups.store')) !!}

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
                                {{ Form::label('code', 'Code:') }}
                                {{ Form::text('code', null, array('class' => 'form-control') ) }}

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>


                        {{ Form::submit('Create Group',array('class' => 'btn btn-primary btn-fill')) }}

                        {!! Form::close() !!}
                    </div>
            
                </div>
            </div>  
        </div>
    </div>
</div>

@stop

