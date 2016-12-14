@extends('inc.templates.t_dash')
@section('title','Edit User')
@section('content')


<div class="pcontent">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">

				<div class="card areyousure palert">
					<div class="header">
						<h4 class="title">Delete Confirmation</h4>
					</div>
					<div class="content">
						<p>Are you sure you want to remove User: {{ $user->name }}</p>
							{!! Form::open(['route' => ['users.destroy',$user->id], 'method' => 'DELETE' ]) !!}
							{{-- {{ Html::linkRoute('posts.update', 'Save', array($post->id),array('class' => 'primary button expanded')) }} --}}
							{!! Form::submit('Permenently DELETE', ['class' => 'btn btn-danger btn-fill']) !!}
							{!! Form::close() !!}
					</div>
				</div>

				<div class="card">

					<div class="header">
						<h4 class="title">Users / Edit</h4>
					</div>

					<div class="content container-fluid">

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
							<div class="col-md-6">
							{{ Form::submit('Save Changes', ['class'=> 'btn btn-primary btn-fill btn-block']) }}
							</div>
							<div class="col-md-6">
								<a href="#" class="duser btn btn-danger btn-fill btn-block">Delete</a>
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

