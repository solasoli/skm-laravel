$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).on('click', '.deleteall', function() {
	var ids = [];
	if($(this).data('itemtext')) {
		var itemtext = $(this).data('itemtext');
	} else {
		var itemtext = 'items';
	}
	var postUrl = $(this).data('url');
	$('.records').each(function() {
		if($(this).is(':checked')) {
			var id = $(this).data('id');
			ids.push(id);
		}
	});
	if(ids.length > 0) {
		$.confirm({
	    title: 'Delete Confirm',
	    theme: 'bootstrap',
	    type: 'orange',
	    confirmText: 'Yes',
	    content: 'Selected '+itemtext+' will be deleted permanently, proceed?',
	    buttons: {
	        confirm: function () {
	           $.post(postUrl, {ids: ids}, function() {
	           	 window.location = '';
	           });
	        },
	        cancel: function() {

	        }
	      }
		});
	}
});

$(document).on('click', '.delete', function() {
	var postUrl = $(this).data('url');
	var itemtext = $(this).data('itemtext');
	$.confirm({
		title: 'Delete Confirm',
		theme: 'bootstrap',
		type: 'orange',
		confirmText: 'Yes',
		content: 'The '+itemtext+' will be deleted permanently, proceed?',
		buttons: {
			confirm: function () {
				$.post(postUrl, {_method: 'DELETE'}, function() {
					window.location = '';
				});
			},
			cancel: function() {

			}
		}
	});
});