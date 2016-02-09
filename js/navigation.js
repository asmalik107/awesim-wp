/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */
(function () {
    var mobileMenu = $('.mobile-menu');
    var toggleButton = $('.nav-icon');
    var searchBar = $('.search-bar');
    var toggleSearch = $('.search-click');
    var searchField = $('.search-field');

    toggleButton.click(function () {
        mobileMenu.toggleClass('mobile-menu-open');
        toggleButton.toggleClass('open');
    });


    toggleSearch.click(function () {
        searchBar.toggleClass('search-bar-open');

        if (searchBar.hasClass('search-bar-open')) {
            searchField.focus();
        } else {
            searchField.blur();
        }
    });


})();
