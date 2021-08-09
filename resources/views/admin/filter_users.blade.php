@extends('layouts.template')
@section('title', 'Admin Кандидаствания')
@section('content')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
	<div class="section col-md-12">
		<div class="col-md-12 d-flex flex-row flex-wrap options-wrap">
			<table class="table" id="forms">
				<thead>
				<tr>
					<th scope="col">Поредност</th>
					<th scope="col">#ID</th>
					<th scope="col">Име</th>
					<th scope="col">Фамилия</th>
					<th scope="col">Е-Поща</th>
					<th scope="col">Локация</th>
					<th scope="col">Възраст</th>
					<th scope="col">Занимание</th>
				</tr>
				</thead>
				<tbody>
				@foreach($users as $num => $user)
					<tr>
						<th>{{$num}}</th>
						<th scope="row">{{$user->id}}</th>
						<td>{{$user->name}}</td>
						<td>{{$user->last_name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->location}}</td>
						<td>{{$user->dob?(Carbon\Carbon::now()->format('Y') - $user->dob->format('Y')):''}}</td>
						<td>{{$user->Occupation?$user->Occupation->occupation:''}}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		
		<div class="col-md-12 download-stats" style="bottom:1%;font-size:200%;position:fixed;left:-1%"><i class="fas fa-download"></i></div>
		<!-- end of modal -->
		<script type="text/javascript">
            $(document).ready(function() {
                $('#forms').DataTable({
                    responsive: true,
                    order: [[0, "desc"]],
                });
            } );
		</script>
@endsection
