@extends('inc.templates.t_dash')
@section('title','Group Single')
@section('content')


<div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="{{ URL::asset('assetz/img/faces/face-3.jpg') }}" alt="..."/>

                                      <h4 class="title">{{ $group->name }}<br />
                                         <small>Captian: {{ $group->users->name }}</small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center">Code: {{$group->code }}<br>
                                                    Competition: {{$group->comps->name }}<br>
                                                    Users: 10/
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



@stop

