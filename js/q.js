/** Q Class **/
var Q = {
	httpPath: '',
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
	},
	showValidationErrors: function (form, validationErrors) {
		form.find(':disabled').prop('disabled', false);

		$.each(validationErrors, function (i, error) {
			var field = form.find('input#' + error.field);

			field.closest('.form-group').addClass('has-error');
		});
	}
};

/** Ajax forms handling **/
$(document).on('submit', 'form.ajax-form', function (event) {
	var form = $(this),
		moduleName = form.data('ajax-module'),
		actionName = form.data('ajax-name'),
	data = [];

	event.preventDefault();

	form.find('button').prop('disabled', true);
	form.find('.form-group').removeClass('has-error');

	form.find('input, textarea').each(function (i, element) {
		element = $(element);

		data[element.attr('id')] = element.val();

		element.prop('disabled', true);
	}).promise().done(function () {
		$.post(
			Q.httpPath + 'action/' + moduleName + '/' + actionName + '/',
			data,
			function (data, textStatus, jqXHR) {
				if (data.success) {
					window.location.href = form.attr('action');

				} else if (data.validationErrors) {
					Q.showValidationErrors(form, data.validationErrors);

				} else if (data.generalErrors) {
					Q.showGeneralErrors(data.generalErrors);
				}
			},
			'json'
		);
	});
});