@extends('inc.templates.t_dash')
@section('title','List Comps')
@section('content')


<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">
				<div class="card">

					<div class="header">
						<h4 class="title pull-left">Comps</h4>
						{{ Html::linkRoute('comps.create', 'Create', array(),array('class' => 'btn btn-primary btn-fill pull-right')) }}
					</div>

					<div class="content table-responsive table-full-width">

						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Country</th>
									<th>City</th>
									<th>Logo</th>
									<th>Edit</th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td>1</td>
									<td>FOX Memorial</td>
									<td>New Zealand</td>

									<td>Auckland</td>
									<td>JPG</td>
									<td>
										<a href="#">Edit</a>
									</td>
								</tr>
							</tbody>
						</table>

					</div>


				</div>
			</div>
		</div>
	</div>	
</div>


@stop

