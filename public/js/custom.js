/*
 * Developer: Thomas Henson
 * Contact: tmhenson@una.edu
 * Description: common jquery scripts
 * Date: 08/22/2012
 */

//call all buttons and dates
 // $('.button').button();
 
$(document).ready(function(){

    $('.datepicker').datepicker();

    //tab function for tracker page
 $('#sort-tab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
}) //end  sort-tab click
$('#sort-tab a[href="#home"]').tab('show'); // Select tab by name
$('#sort-tab a:first').tab('show'); // Select first tab
$('#sort-tab a:last').tab('show'); // Select last tab
$('#sort-tab li:eq(2) a').tab('show'); // Select third tab (0-indexed)
    


}); //end document.ready
 
