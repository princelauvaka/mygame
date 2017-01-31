@extends('inc.templates.t_dash')
@section('title','List Roles')
@section('content')


<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">
				<div class="card">

					<div class="header">
						<h4 class="title pull-left">Roles</h4>
						{{ Html::linkRoute('roles.create', 'Create', array(),array('class' => 'btn btn-primary btn-fill pull-right')) }}
					</div>

					<div class="content table-responsive table-full-width">

						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
								</tr>
							</thead>

							<tbody>
								@foreach ($roles as $role)
								<tr>
									<th>{{ $role->id }}</th>
									<td>{{ $role->name }}</td>

									<td>{{ $role->description }}</td>
									<td>
										{{ Html::linkRoute('roles.edit', 'Edit', array($role->id),array()) }}
										{{-- {{ Html::linkRoute('users.show', 'View', array($user->id),array()) }} --}}
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>

					</div>


				</div>
			</div>
		</div>
	</div>	
</div>


@stop

