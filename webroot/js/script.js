//$.noConflict();$(function(){    $( "#project,#user" ).autocomplete({             source: "http://worksite/generate_json?request=login",             minLength: 1,             select: function( event, ui ) {               //log( "Selected: " + ui.item.value + " aka " + ui.item.id );             }           });    $( "#id,#idPC" ).autocomplete({             source: "http://worksite/generate_json?request=id",             minLength: 1,             select: function( event, ui ) {               //log( "Selected: " + ui.item.value + " aka " + ui.item.id );             }           });    $( "#datepicker,#birthday" ).datepicker({        dateFormat: 'yy-mm-dd' ,        changeMonth: true,              changeYear: true    });    });$( function() {    var dateFormat = "mm/dd/yy",      from = $( "#from" )        .datepicker({          defaultDate: "+1w",          changeMonth: true,          numberOfMonths: 1        })        .on( "change", function() {          to.datepicker( "option", "minDate", getDate( this ) );        }),      to = $( "#to" ).datepicker({        defaultDate: "+1w",        changeMonth: true,        numberOfMonths: 1      })      .on( "change", function() {        from.datepicker( "option", "maxDate", getDate( this ) );      });    function getDate( element ) {      var date;      try {        date = $.datepicker.parseDate( dateFormat, element.value );      } catch( error ) {        date = null;      }      return date;    }  } );