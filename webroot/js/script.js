//$.noConflict();$( function() {  $( "#datepicker" ).datepicker({      dateFormat: 'yy-mm-dd' ,      changeMonth: true,            changeYear: true  });} );$(function(){    //$( "#date" ).datepicker({    //                 changeMonth: true,    //                 changeYear: true    //               });       $( "#user" ).autocomplete({         source: "http://worksite/generate_json?request=login",         minLength: 1,         select: function( event, ui ) {           //log( "Selected: " + ui.item.value + " aka " + ui.item.id );         }       });    $( "#id" ).autocomplete({             source: "http://worksite/generate_json?request=id",             minLength: 1,             select: function( event, ui ) {               //log( "Selected: " + ui.item.value + " aka " + ui.item.id );             }           });    //$('#user').autocomplete('generate_json?request=login', {    //        width: 200,    //        max: 5,    //        min: 2    //    });    //    //$('#id').autocomplete('generate_json?request=id', {    //        width: 200,    //        max: 5,    //        min: 2    //    });    });