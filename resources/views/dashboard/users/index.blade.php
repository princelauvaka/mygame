@extends('inc.templates.t_dash')
@section('title','List Users')
@section('content')


<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">
				<div class="card">

					<div class="header">
						<h4 class="title pull-left">Users</h4>
						{{-- <a class="btn btn-info btn-fill pull-right">Create</a> --}}
						{{ Html::linkRoute('users.create', 'Create', array(),array('class' => 'btn btn-primary btn-fill pull-right')) }}
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
								@foreach ($users as $user)
								<tr>
									<th>{{ $user->id }}</th>
									<td>{{ $user->name }}</td>

									<td>{{ $user->email }}</td>
									<td>
										{{ Html::linkRoute('users.edit', 'Edit', array($user->id),array()) }}
										{{ Html::linkRoute('users.show', 'View', array($user->id),array()) }}
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

