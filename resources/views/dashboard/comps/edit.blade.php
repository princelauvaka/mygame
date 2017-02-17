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
                        <p>Are you sure you want to remove Competition: <strong>{{ $comp->name }}</strong></p>
                            {!! Form::open(['route' => ['comps.destroy',$comp->id], 'method' => 'DELETE' ]) !!}
                            {{-- {{ Html::linkRoute('posts.update', 'Save', array($post->id),array('class' => 'primary button expanded')) }} --}}
                            {!! Form::submit('Permenently DELETE', ['class' => 'btn btn-danger btn-fill']) !!}
                            {!! Form::close() !!}
                    </div>
                </div>

                <div class="card">
                    
                    <div class="header">
                        <h4 class="title">Competition / Edit</h4>
                        <p>Edit existing role</p>
                    </div>
                    
                    <div class="content">
                        {!! Form::model($comp, ['route' => ['comps.update',$comp->id], 'method' => 'PUT','files' => true ]) !!}

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


                        {{ Form::submit('Update Competition',array('class' => 'btn btn-primary btn-fill')) }}
                        <a href="#" class="delete-one btn btn-default btn-fill">Delete</a>
                        {!! Form::close() !!}
                    </div>
            
                </div>
            </div>  
        </div>
    </div>
</div>

@stop

