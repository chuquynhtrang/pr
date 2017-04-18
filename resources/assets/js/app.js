
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window.$ = window.jQuery = require('jquery');
require('./bootstrap');
require('metismenu');
var dt = require('datatables');
require('ckeditor');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
$(document).ready(function() {
    $('#dataTables').DataTable();
    $('.datatables').DataTable();

    $('.add-files').click(function() {
        $('.files').append(
            '<div class="col-md-2"></div>' +
            '<div class="col-md-10">' +
                '<div class="col-md-3">' +
                    '<input type="file" name="file[]" id="file-news">' +
                '</div>' +
            '</div>'
        );
    });
});

$('.success_show').hide(2500);

$('.content-news').each(function() {
    var showChar = 500;
    var ellipsestext = "...";
    var content = $(this).html();
    if(content.length > showChar) {
        var c = content.substr(0, showChar);
        var html = c + '<span>' + ellipsestext + '&nbsp;</span>';
        $(this).html(html);
    }
});

