$(function(){    $('#user').autocomplete('generate_json?request=login', {            width: 200,            max: 5,            min: 2        });    $('#id').autocomplete('generate_json?request=id', {            width: 200,            max: 5,            min: 2        });});