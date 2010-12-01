jQuery(document).ready(function () {
	var pageTitle = encodeURIComponent(window.document.title);
	jQuery('.share-list a').each(function (index) {
		var node = jQuery(this);
		var url = node.attr('href').replace(/&title=.*/, '&title='+pageTitle);
		node.attr('href', url);
	});
});