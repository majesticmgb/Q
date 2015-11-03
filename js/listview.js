/**
 * Created by TimoBakx on 2015-11-03.
 */

ListView = function () {
	var onRowClick = function (row, e) {};

	jQuery(document).on('click', '.list-wrapper tbody tr', function (e) {
		onRowClick(new ListViewRow(this), e);
	});

	return {
		setOnRowClick: function (callback) {
			onRowClick = callback;
		}
	};
}();

function ListViewRow(element) {
	var _element = jQuery(element);

	this.getID = function () {
		return _element.data('id');
	};
}