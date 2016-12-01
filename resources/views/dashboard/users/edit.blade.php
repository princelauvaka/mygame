@extends('inc.templates.t_dash')
@section('title','Edit User')
@section('content')


<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">
				<div class="card">

					<div class="header">
						<h4 class="title">Users / Edit</h4>

					</div>
					<div class="content">
						{!! Form::model($user, ['route' => ['users.update',$user->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
						{{-- {!! Form::open(array('class'=> 'form-horizontal')) !!} --}}

						<div class="form-group">
							{{ Form::label('name', 'Name:',['class' => 'col-md-4 control-label']) }}
							<div class="col-md-6">
							{{ Form::text('name', null, ['class' => 'form-control']) }}
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('email', 'Email:',['class' => 'col-md-4 control-label']) }}

							<div class="col-md-6">
							{{ Form::text('email', null, ['class' => 'form-control']) }}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
							{{ Form::submit('Save Changes', ['class'=> 'btn btn-primary btn-fill']) }}
							</div>
						</div>
						
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>


@stop

