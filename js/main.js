 $(document).ready(function() {


 	var el = $('.site-main');
 	imagesLoaded(el, function() {

 		el.masonry({
 			// options
 			itemSelector: '.article-masonry',
 			/*	columnWidth: 20,*/
 			gutter: 10,
 			percentPosition: true
 		});
 	});
 })