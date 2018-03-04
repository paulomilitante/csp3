@extends('layouts.app')


@section('title')
	myExpenses
@endsection


@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12 m8 feed z-depth-2">
				<div class="row center feedheader z-depth-2">
					<h4><a class="modal-trigger btn-floating waves-effect waves-light teal lighten-4 left" href="#addEntry"><i class="material-icons">add</i></a><span class="white-text">{{date("D, d M")}}</span></h4>
				</div>
				<div class="row">
					<div class="col s12" id="feedCol">
						<div id="feed" data-index="2" data-page="{{$dates->lastPage()}}">
							@if($dates->count() === 0)
								<h2 class="center-align grey-text text-lighten-2"><i>You have no entries yet!</i></h2>
							@endif
							<table id="feedList">
							@foreach($dates as $date)
								<?php
									$day_entries = $entries->where('date','=',$date->date);
									$total = $day_entries->sum('expense');
								?>
								<thead class="teal-text">
									<tr>
									<th></th>
									<th>{{date("D, M d", strtotime($date->date))}}</th>
									<th>${{number_format($total,2)}}</th>
									</tr>
								</thead>
								<tbody>
									@foreach($day_entries as $entry)
											<tr>
												<td class="teal-text text-lighten-2"><i class="{{$entry->category->icon}}"></i></td>
												<td>{{$entry->title}}</td>
												<td>${{number_format($entry->expense,2)}}</td>
												<td><a class="modal-trigger waves-effect waves-light teal-text text-lighten-2 editModal" data-index="{{$entry->id}}" href="#editEntry"><i class="material-icons">edit</i></a></td>
											</tr>	
									@endforeach
								</tbody>
							@endforeach
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col hide-on-small-only m4" id="sums">
				<div id="sums1" class="row sideCont">
					<div class="card col s12 side z-depth-2">
						<div class="card-content">
							<h4 class="teal-text center">${{number_format($year,2)}}</h4>
						</div>
						<div class="card-action center">
							<i>Total Expenses (Year)</i>
						</div>
					</div>
					<div class="card col s12 side z-depth-2">
						<div class="card-content">
							<h4 class="teal-text center">${{number_format($month,2)}}</h4>
						</div>
						<div class="card-action center">
							<i>Total Expenses (Month)</i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- MODALS -->
	<div id="addEntry" class="modal modal-fixed-footer">
		<div class="modal-content row">
			<h4 class="center">Add Entry</h4>
			<form method="POST" class="col s12">
				{{ csrf_field() }}
				<div class="row">
					<div class="input-field col s12 m6 offset-m3">
						<input type="text" id="title" placeholder="Entry Description">
						<label>Title</label>
					</div>
					<div class="input-field col s12 m6 offset-m3">
						<input type="number" id="expense" placeholder="0.00">
						<label>$</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6 offset-m3">
						<input type="text" id="date" class="datepicker" value="{{date('Y-M-d')}}">
						<label>Date</label>
					</div>
					<div class="col s12 m6 offset-m3">
						<label>Category</label>
						<select class="browser-default" id="category">
							@foreach($cats as $cat)
								<option value="{{$cat->id}}">{{$cat->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
				<button type="button" id="postEntry" class="modal-close waves-effect waves-light btn teal lighten-4">Post</button>
		</div>
	</div>

	<div id="editEntry" class="modal modal-fixed-footer">
		<div class="modal-content row" id="editModalContent">
		</div>
		<div class="modal-footer">
			<button type="button" id="deleteEntry" class="modal-close waves-effect waves-light btn red lighten-2">Delete</button>
			<button type="button" id="updateEntry" class="modal-close waves-effect waves-light btn teal lighten-4">Save</button>
		</div>
	</div>
<!-- MODALS -->
@endsection