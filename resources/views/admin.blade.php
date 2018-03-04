@extends('layouts.app')


@section('title')
	myExpenses
@endsection


@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12 m8 offset-m2 feed">
				<div>
					<span class="white-text feedheader z-depth-2">User Count: {{$total->count()}}</span>
				</div>
				<br>
				<table class="striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>E-Mail</th>
							<th>Type</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{$user->id}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>
								<select class="browser-default" name="type" form="userType">
									<option>admin</option>
									<option {{($user->type === 'default') ? 'selected' : ""}}>default</option>
								</select>
							</td>
							<td>
								<button type="submit" form="userType" class="modal-close waves-effect waves-light btn teal lighten-4"><i class="material-icons">save</i></button>
							</td>
						</tr>
						@endforeach	
					</tbody>
				</table>
				<form id="userType" method="POST" action='{{url("admin/user/$user->id")}}'>{{ csrf_field() }}</form>
				<div class="center">{{$users->links('pagination')}}</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m8 offset-m2 feed">
				<div  class="white-text feedheader col s9 m4 z-depth-2 valign-wrapper">
					<a class="modal-trigger btn-floating btn-small waves-effect waves-light teal lighten-4 left" href="#addCategory"><i class="material-icons">add</i></a>
					<h5>Categories</h5>
				</div>
				<br>
				<table class="striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Icon</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($cats as $cat)
						<tr>
							<td>{{$cat->id}}</td>
							<td>{{$cat->name}}</td>
							<td>{{$cat->icon}}</td>
							<td>
								<a class="modal-trigger waves-effect waves-light teal-text text-lighten-2 editCat" data-index="{{$cat->id}}" href="#editCat"><i class="material-icons">edit</i></a>
							</td>
						</tr>
						@endforeach	
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div id="addCategory" class="modal modal-fixed-footer">
		<div class="modal-content row">
			<h4 class="center">Add Category</h4>
			<form method="POST" class="col s12" id="catForm">
				{{ csrf_field() }}
				<div class="row">
					<div class="input-field col s12 m6 offset-m3">
						<input type="text" name="name" placeholder="Category Name">
						<label>Name</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6 offset-m3">
						<input type="text" name="icon" placeholder="Icon Name">
						<label>Icon</label>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
				<button type="submit" form="catForm" class="modal-close waves-effect waves-light btn teal lighten-4">Add</button>
		</div>
	</div>
	<div id="editCat" class="modal">
		<div class="modal-content row" id="editCatContent">
		</div>
	</div>
@endsection