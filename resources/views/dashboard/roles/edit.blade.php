@extends('inc.templates.t_dash')
@section('title','Edit Roles')
@section('content')


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">

                <div class="card areyousure palert">
                    <div class="header">
                        <h4 class="title">Delete Confirmation</h4>
                    </div>
                    <div class="content">
                        <p>Are you sure you want to remove Role: <strong>{{ $role->name }}</strong></p>
                            {!! Form::open(['route' => ['roles.destroy',$role->id], 'method' => 'DELETE' ]) !!}
                            {{-- {{ Html::linkRoute('posts.update', 'Save', array($post->id),array('class' => 'primary button expanded')) }} --}}
                            {!! Form::submit('Permenently DELETE', ['class' => 'btn btn-danger btn-fill']) !!}
                            {!! Form::close() !!}
                    </div>
                </div>

                <div class="card">
                    
                    <div class="header">
                        <h4 class="title">Roles / Edit</h4>
                        <p>Edit existing role</p>
                    </div>
                    
                    <div class="content">
                        {!! Form::model($role, ['route' => ['roles.update',$role->id], 'method' => 'PUT']) !!}

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
                                {{ Form::label('description', 'Description:') }}
                                {{ Form::textarea('description', null, array('class' => 'form-control') ) }}

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            
                                
                                    {{ Form::submit('Save Role',array('class' => 'btn btn-primary btn-fill')) }}
                              

                               
                                    <a href="#" class="delete-one btn btn-default btn-fill">Delete</a>
                             
                           
                        {!! Form::close() !!}
                    </div>
            
                </div>
            </div>  
        </div>
    </div>
</div>

@stop

