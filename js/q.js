/** Q Class **/
var Q = {
	showGeneralErrors: function (errors) {
		var modal = $('#modal'),
			body = modal.find('.modal-body');

		body.html("");

		$.each(errors, function (i, error) {
			var errorHtml = $('<div>');

			errorHtml.append($('<h4>').html(error.title));
			errorHtml.append($('<p>').html(error.message));

			body.append(errorHtml);
		});

		modal.modal('show');
	}
};

/** Ajax forms handling **/
$(document).on('submit', 'form.ajax-form', function (event) {
	var form = $(this),
		moduleName = form.data('ajax-module'),
		ajaxName = form.data('ajax-name'),
	data = [];

	event.preventDefault();

	form.find('input, textarea').each(function (i, element) {
		element = $(element);

		data[element.attr('id')] = element.val();
	}).promise().done(function () {
		$.post(
			'/action.php',
			data,
			function (data, textStatus, jqXHR) {
				console.log(data);
				if (data.success) {
					window.location.href = form.attr('action');
				} else if (data.generalErrors) {
					console.log(data.generalErrors);

					Q.showGeneralErrors(data.generalErrors);
				}
			},
			'json'
		);
	});
});