@extends('inc.templates.t_dash')
@section('title','Groups - Edit')
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
						<p>Are you sure you want to remove group: {{ $group->name }}</p>
							{!! Form::open(['route' => ['groups.destroy',$group->id], 'method' => 'DELETE' ]) !!}
							{{-- {{ Html::linkRoute('posts.update', 'Save', array($post->id),array('class' => 'primary button expanded')) }} --}}
							{!! Form::submit('Permenently DELETE', ['class' => 'btn btn-danger btn-fill']) !!}
							{!! Form::close() !!}
					</div>
				</div>
  
				<div class="card">

					<div class="header">
						<h4 class="title">groups / Edit</h4>
					</div>

					<div class="content">

						{!! Form::model($group, ['route' => ['groups.update',$group->id], 'method' => 'PUT']) !!}

						<div class="form-group">
							{{ Form::label('name', 'Name:') }}
							{{ Form::text('name', null, ['class' => 'form-control']) }}
						</div>

						<div class="form-group">
							{{ Form::label('code', 'Code:') }}
							{{ Form::text('code', null, ['class' => 'form-control']) }}
						</div>

						<div class="form-group">
							{{ Form::label('captain', 'Captain', ['class' => 'form-spacing-top']) }}
							{{ Form::select('captain[]', $userz, null, ['class' => 'form-control select2-multi' ,'multiple' => 'multiple']) }}
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
		$('.select2-multi').select2().val({!! json_encode($group->users()) !!}).trigger('change');
    </script>
@stop

