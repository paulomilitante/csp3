<h4 class="center">Edit Entry</h4>
<form method="POST" class="col s12">
	<!-- {{ csrf_field() }} -->
	<div class="row">
		<div class="input-field col s12 m6">
			<input type="text" id="editTitle" data-index="{{$entry->id}}" value="{{$entry->title}}">
			<label class="active">Title</label>
		</div>
		<div class="input-field col s12 m6">
			<input type="number" id="editExpense" value="{{$entry->expense}}">
			<label class="active">$</label>
		</div>
	</div>
	<div class="row">
		<div class="input-field col s12 m6">
			<input type="text" id="editDate" class="datepicker" value="{{date('Y-M-d',strtotime($entry->date))}}">
			<label class="active">Date</label>
		</div>
		<div class="col s12 m6">
			<label>Category</label>
			<select class="browser-default" id="editCategory">
				@foreach($cats as $cat)
					<option value="{{$cat->id}}" {{($cat->name === $entry->category->name) ? 'selected' : ''}}>{{$cat->name}}</option>
				@endforeach
			</select>
		</div>
	</div>
</form>