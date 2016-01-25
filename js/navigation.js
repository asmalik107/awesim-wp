/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */
( function() {
	var mobileMenu = $('.mobile-menu');
    var toggleButton = $('.button-toggle');
	var searchBar = $('.search-bar');
	var toggleSearch = $('.search-click');

    toggleButton.click(function(){
        mobileMenu.toggleClass('mobile-menu-open');
    });


	toggleSearch.click(function(){
		searchBar.toggleClass('search-bar-open');
	});


} )();
