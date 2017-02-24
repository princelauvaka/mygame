@extends('inc.templates.t_dash')
@section('title','Create Groups')

@section('stylesheets')
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
@stop

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

                            <div class="form-group">
                                {{ Form::label('searchcomps','Comps:') }}
                                {{ Form::text('searchcomps', null, array('class' => 'form-control','id' => 'searchcomps','autocomplete'=>'off','data-provide'=>'typehead')) }}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comps') }}</strong>
                                    </span>
                                @endif
                            </div>

                        {{ Form::submit('Create Group',array('class' => 'btn btn-primary btn-fill')) }}

                        {!! Form::close() !!}

{{--                         <form method="POST" action="http://localhost/xgithub/mygame/public/groups" accept-charset="UTF-8" _lpchecked="1" autocomplete="on">
                        {{ Form::text('searchcomps', '', ['id' =>  'searchcomps', 'placeholder' =>  'Enter name','autocomplete'=>'on'])}}
                        {{ Form::submit('Search', array('class' => 'button expand')) }}
                        {{ Form::close() }} --}}
                    </div>
            
                </div>
            </div>  
        </div>
    </div>
</div>
<h1>{!! url('groups/autocomplete') !!}</h1>
@stop

@section('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
jQuery( document ).ready( function( $ ){
    $('#searchcomps').autocomplete({
        source:'{!! url('groups/autocomplete') !!}',
        minlength:2,
        autoFocus:true,
        select: function(event,ui){
            $('#searchcomps').val(ui.item.value);
        }
    });
});
</script>
@stop