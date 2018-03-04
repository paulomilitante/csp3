@extends('layouts.app')


@section('title')
	myExpenses
@endsection


@section('content')
	<div class="container">
		<div class="row">
			<div class="col s12 m6 offset-m3 feed">
				<table class="striped">
					<thead>
						<tr class="teal-text text-lighten-2">
							<th colspan="2" >
								<h5>
									<select class="browser-default" id="selectMonth">
										@for($i = 1; $i <= 12; $i++)
											<?php
													$monthOpt = date("F",strtotime("2001-".$i."-01"));
													$monthVal = date("m",strtotime("2001-".$monthOpt."-01"));
											?>
											<option {{($monthNow === $monthVal) ? 'selected' : ''}} value="{{$monthVal}}">{{$monthOpt}}</option>
										@endfor
									</select>
								</h5>
							</th>
							<th>
								<h5>
									<select class="browser-default" id="selectYear">
										@for($i = date('Y'); $i >= 2015; $i--)
											<option {{($i == $yearNow) ? 'selected' : ''}}>{{$i}}</option>	
										@endfor
									</select>
								</h5>
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($cats as $cat)
							<?php
								$catTotal = $entries->where('category_id','=',$cat->id)->sum('expense');
							?>
							<tr>
								<td class="teal-text text-lighten-2"><i class="{{$cat->icon}}"></i></td>
								<td><b>{{$cat->name}}</b></td>
								<td>${{$catTotal}}</td>
							</tr>
						@endforeach
						<tr class="teal-text text-lighten-2">
							<td colspan="2"><h5>Total:</h5></td>
							<td><h5>${{$total}}</h5></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection