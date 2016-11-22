@extends('inc.templates.t_dash')
@section('title','List Users')
@section('content')


<div class="container">
	<div class="row">
	    <div class="col-lg-12">
	    	<h1>Users</h1>
			<table class="table">
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


@stop

