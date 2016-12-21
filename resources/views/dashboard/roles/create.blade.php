@extends('inc.templates.t_dash')
@section('title','Create Roles')
@section('content')


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    
                    <div class="header">
                        <h4 class="title">Roles / Create</h4>
                        <p>Create a new role</p>
                    </div>
                    
                    <div class="content">
                        {!! Form::open(array('route' => 'roles.store')) !!}

                            <div class="form-group">
                                    {{ Form::label('name','Name:') }}
                                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                            </div>

                                <div class="form-group">
                                    {{ Form::label('description', 'Description:') }}
                                    {{ Form::textarea('description', null, array('class' => 'form-control') ) }}
                            </div>


                        {{ Form::submit('Create Role',array('class' => 'btn btn-primary btn-fill')) }}

                        {!! Form::close() !!}
                    </div>
            
                </div>
            </div>  
        </div>
    </div>
</div>

@stop

