@extends('inc.templates.t_dash')
@section('title','List Users')
@section('content')


<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">

					<div class="header">
						<h4 class="title pull-left">Users</h4>
						{{-- <a class="btn btn-info btn-fill pull-right">Create</a> --}}
						{{ Html::linkRoute('create', 'Create', array(),array('class' => 'btn btn-info btn-fill pull-right')) }}
					</div>

					<div class="content table-responsive table-full-width">

						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
								</tr>
							</thead>

							<tbody>
								@foreach ($users as $user)
								<tr>
									<th>{{ $user->id }}</th>
									<td>{{ $user->name }}</td>
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

