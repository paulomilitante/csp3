<h4 class="center">Edit Category</h4>
<form method="POST" class="col s12" id="catEdit" action='{{url("/category/update/$cat->id")}}'>
	{{ csrf_field() }}
	<div class="row">
		<div class="input-field col s12 m6 offset-m3">
			<input type="text" name="name" value="{{$cat->name}}">
			<label class="active">Name</label>
		</div>
		<div class="input-field col s12 m6 offset-m3">
			<input type="text" name="icon" value="{{$cat->icon}}">
			<label class="active">Icon</label>
		</div>
	</div>
	<div class="row">
		<div class="col s12 right-align">
			<a class="modal-close waves-effect waves-light btn red lighten-2" href='{{url("/category/delete/$cat->id")}}'>Delete</a>
			<button type="submit" form="catEdit" class="modal-close waves-effect waves-light btn teal lighten-4">Save</button>
		</div>
	</div>
</form>