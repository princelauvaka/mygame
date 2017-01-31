@extends('inc.templates.t_dash')
@section('title','Edit User')
@section('stylesheets')
{!! Html::style('assetz/css/select2.min.css') !!}
@stop
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

					<div class="content">

						{!! Form::model($user, ['route' => ['users.update',$user->id], 'method' => 'PUT']) !!}

						<div class="form-group">
							{{ Form::label('name', 'Name:') }}
							{{ Form::text('name', null, ['class' => 'form-control']) }}
						</div>

						<div class="form-group">
							{{ Form::label('email', 'Email:') }}
							{{ Form::text('email', null, ['class' => 'form-control']) }}
						</div>

						<div class="form-group">
							{{ Form::label('roles', 'Roles', ['class' => 'form-spacing-top']) }}
							{{ Form::select('roles[]', $rolez, null, ['class' => 'form-control select2-multi' ,'multiple' => 'multiple']) }}
						</div>

						<div class="form-group">
							{{ Form::submit('Save Changes', ['class'=> 'btn btn-primary btn-fill ']) }}
							<a href="#" class="delete-one btn btn-default btn-fill ">Delete</a>
						</div>
						
						{!! Form::close() !!}
						
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>


@stop
@section('scripts')

    {!! Html::script('assetz/js/select2.min.js') !!}
    <script>
        $('.select2-multi').select2();
		$('.select2-multi').select2().val({!! json_encode($user->roles()->getRelatedIds()) !!}).trigger('change');
    </script>
@stop

