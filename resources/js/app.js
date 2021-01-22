require('./bootstrap');

//noty
window.Noty = require('noty');
window.$ = window.jQuery = require('jquery');

// Make all functions inside 'vinylShop.js' that start with 'export' accessible inside the HTML pages
window.festival_nb34 = require('./festival_nb34');
// Run the hello() function
festival_nb34.hello();

