// Import necessary dependencies
import 'datatables.net-dt'; 
import 'bootstrap';
import 'dropify/dist/css/dropify.min.css';
import 'dropify';

// Initialize jQuery globally
window.$ = window.jQuery = $;

// Import custom scripts (like DataTables if you have custom code)
require('./datatable');

// Initialize Dropify
$(document).ready(function() {
    $('.dropify').dropify();
});
