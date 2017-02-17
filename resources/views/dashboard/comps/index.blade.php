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
									<th>Suburb</th>
									<th>Logo</th>
									<th>Edit</th>
								</tr>
							</thead>

							<tbody>
								@foreach ($comps as $comp)
								<tr>
									<td>{{ $comp->id }}</td>
									<td><strong>{{ $comp->name}}</strong></td>
									<td>{{ $comp->country }}</td>
									<td>{{ $comp->city }}</td>
									<td>{{ $comp->suburb }}</td>
									<td>
										@if ( !empty( $comp->logo ) )
										<img src="
										{{ URL::asset('assets/img/logos/'.$comp->logo) }}
										" alt="{{ $comp->name }}-logo" width="auto" height="50">
										@endif
									</td>
									<td>
										{{ Html::linkRoute('comps.edit', 'Edit', array($comp->id),array()) }}
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

