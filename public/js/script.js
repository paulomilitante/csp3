$(document).ready(function(){

	$('.modal').modal();
	$('select').material_select();
	$(".dropdown-button").dropdown();
	$(".button-collapse").sideNav();
	pushthis();
});

$('.datepicker').pickadate({
    today: 'Today',
    clear: null,
    close: null,
    closeOnSelect: true,
    format: 'yyyy-mmm-dd',
    max: new Date()
  });

$('#postEntry').click(function(){
	var title = $('#title').val();
	var date = $('#date').val();
	var expense = $('#expense').val();
	var category = $('#category').val();
	var token = $('input[name = _token]').val();

	$.post('feed',
		{'title' : title,
		'date' : date,
		'expense' : expense,
		'category' : category,
		'_token' : token},
		function(){
			$('#feedCol').load(location.href + " #feed")
			$('#sums').load(location.href + " #sums1")
		})

	$('#title').val('');
	$('#expense').val('');
})

$(document).on('click','.editModal', function(){
	var id = $(this).data('index');
	var token = $('input[name = _token]').val();

	$.post('editModal',
		{'id' : id,
		'_token' : token},
		function(data){
			$('#editModalContent').html(data);
		})
})

$('#updateEntry').click(function(){
	var id = $('#editTitle').data('index');
	var title = $('#editTitle').val();
	var date = $('#editDate').val();
	var expense = $('#editExpense').val();
	var category = $('#editCategory').val();
	var token = $('input[name = _token]').val();

	$.post('edit',
		{'id' : id,
		'title' : title,
		'date' : date,
		'expense' : expense,
		'category' : category,
		'_token' : token},
		function(){
			$('#feedCol').load(location.href + " #feed")
			$('#sums').load(location.href + " #sums1")
		})
})

$('#deleteEntry').click(function(){
	var id = $('#editTitle').data('index');
	var token = $('input[name = _token]').val();

	$.post('delete',
		{'id' : id,
		'_token' : token},
		function(){
			$('#feedCol').load(location.href + " #feed")
			$('#sums').load(location.href + " #sums1")
		})
})

$(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() == $(document).height()) {
   		var index = $('#feed').data('index');
		var page = ($('#feed').data('page')) + 1;

		if(page > index) {

   		$.get('feed/entries?page=' + index,
			function(data){
				var counter = index + 1;
				$('#feedList').append(data);
				$('#feed').data('index',counter);
				pushthis();
			})
   		}
   }
});


function pushthis() {

	var parentwidth = $("#sums1").width();      
	$("#sums1").width(parentwidth);        

    $('#sums1').pushpin({
      top: $('#sums').offset().top,
      bottom: 1000000000
    });
}

$(document).on('click','.editCat', function(){
	var id = $(this).data('index');
	var token = $('input[name = _token]').val();

	$.post('editCat',
		{'id' : id,
		'_token' : token},
		function(data){
			$('#editCatContent').html(data);
		})
})

$(document).on('change','#selectMonth, #selectYear', function(){
	var month = $('#selectMonth').val();
	var year = $('#selectYear').val();

	window.location.replace("/summary/"+month+"/"+year);

	// console.log("summary/"+month+"/"+year);
})