 $(document).ready(function() {
 	//$('.button-collapse').sideNav();
 	$('.site-main').masonry({
 		// options
 		itemSelector: '.article-masonry',
 	/*	columnWidth: 20,*/
 		gutter: 10,
		percentPosition: true
 	});
 })