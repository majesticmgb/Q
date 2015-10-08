/** Ajax forms **/
jQuery(document).on('submit', 'form.ajax-form', function (event) {
	var form = jQuery(this);

	event.preventDefault();

	data = [];

	form.find('input, textarea').each(function (i, element) {
		element = jQuery(element);

		data[element.attr('id')] = element.val();
	}).promise().done(function () {
		jQuery.post(
			'/ajax.php',
			data,
			function (data, textStatus, jqXHR) {
				if (data.success) {
					window.location.href = form.attr('action');
				}
			},
			'json'
		);
	});
});