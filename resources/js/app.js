require('./bootstrap');

var $ = require('jquery');

require('../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js');

// abilito Boostrap tooltip
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

// abilito Boostrap Popover
$(function() {
    $('[data-toggle="popover"]').popover();
});