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
									<th>Players</th>
									<th>Edit/View</th>
								</tr>
							</thead>

							<tbody>
								
								<tr>
									<td>1</td>
									<td>Spartans</td>
									<td>IPoiJLK</td>
									<td>16</td>
									<td><a href="#">Edit</a> / <a href="#">View</a></td>
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

