window.onload = function () {
    var url = window.location.href;
    var active = url.split('/');
    var li = document.getElementsByTagName('li');
    for (var i = 0; i < li.length; i++) {
        var index = (li[i].innerHTML.indexOf(active[3]));
        if (index > 0) {
            console.log(i);
            li[i].classList += 'active';
        }
    }
    var els = document.getElementsByTagName('li a div');
    var f = document.querySelectorAll('a[href="' + active[3] + '"]');
    var login = document.getElementById('login');
    var pass = document.getElementById('pass');
    var eroor = document.getElementById('error');
    var enter = document.getElementById('enter');
    enter.addEventListener('click', function (e) {
        var passValue = pass.value;
        var loginValue = login.value;
        if (passValue == '' || loginValue == '') {
            e.preventDefault();
            var ff=document.getElementById('errLogin');
            errLogin.style.display='none';
            eroor.style.visibility = 'visible';
            eroor.style.display = 'block';
            pass.value = '';
            login.value = '';
        }

    });


};
var ourRequest = new XMLHttpRequest;
var btn = document.getElementById('btn');
var animalContainer = document.getElementById("animal-info");
var click = 0;
btn.addEventListener("click", function () {
    ourRequest.open("GET", "http://education/hm/newTask/02.08.2017/JSON.json", true);
    ourRequest.onload = function () {
        var ourData = JSON.parse(ourRequest.responseText);
        render(ourData);
    };
    ourRequest.send();

});

/**
 * Created by PC-1 on 08.08.2017.
 */

