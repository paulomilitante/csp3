@foreach($dates as $date)
			<?php $total = 0; ?>
	@foreach($entries as $entry)
		@if($entry->date === $date->date)
			<?php $total = $total + $entry->expense; ?>
		@endif
	@endforeach
	<thead class="teal-text">
		<tr>
		<th>{{date("D, M d", strtotime($date->date))}}</th>
		<th>${{number_format($total,2)}}</th>
		</tr>
	</thead>
	<tbody>
		@foreach($entries as $entry)
			@if($entry->date === $date->date)
				<tr>
					<td>{{$entry->title}}</td>
					<td>${{number_format($entry->expense,2)}}</td>
					<td><a class="modal-trigger waves-effect waves-light teal-text text-lighten-2 editModal" data-index="{{$entry->id}}" href="#editEntry"><i class="material-icons">edit</i></a></td>
				</tr>	
			@endif
		@endforeach
	</tbody>
@endforeach