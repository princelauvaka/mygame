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
                        {!! Form::open(array('route' => 'posts.store')) !!}

                            <div class="form-group">
                                    {{ Form::label('title','Title:') }}
                                    {{ Form::text('title', null, array('class' => 'form-control')) }}
                            </div>

                                <div class="form-group">
                                    {{ Form::label('slug', 'Slug:') }}
                                    {{ Form::text('slug', null, array('class' => 'form-control', 'minlength' => '5', 'maxlength' => '255') ) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('category_id','Category:') }}
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                {{ Form::label('tags','Tags:') }}
                                <select name="tags[]" class="form-control select2-multi" multiple="multiple">
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                {{ Form::label('body','Post body:') }}
                                {{ Form::textarea('body', null, array('class' => 'form-control')) }}
                            </div>

                                {{ Form::submit('Create Post',array('class' => 'btn btn-primary')) }}

                        {!! Form::close() !!}
                    </div>
            
                </div>
            </div>  
        </div>
    </div>
</div>

@stop

