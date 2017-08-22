@extends('inc.templates.t_dash')
@section('title','List Users')
@section('content')


<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">


				<div class="card">
					<div class="header">
						<h4 class="title pull-left">Groups</h4>

						{{ Html::linkRoute('groups.create', 'Create', array(),array('class' => 'btn btn-primary btn-fill pull-right')) }}
					</div>

					<div class="content table-responsive table-full-width">

						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Code</th>
									<th>Captian</th>
									<th>Comp</th>
									<th>Edit/View</th>
								</tr>
							</thead>

							<tbody>
							@foreach ($groups as $group)
								<tr>
									<td>{{ $group->id }}</td>
									<td>{{ $group->name }}</td>
									<td>{{ $group->code }}</td>
									<td>{{ $group->users->name }}</td>
									<td>{{ $group->comps->name }}</td>
									<td>{{ Html::linkRoute('groups.edit', 'Edit', array($group->id),array()) }} / {{ Html::linkRoute('groups.show', 'View', array($group->id),array()) }}</td>

										
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

