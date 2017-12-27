window.onload = function () {
    var url = window.location.href;
    var active = url.split('/');
    var li = document.getElementsByTagName('li');
    for (var i = 0; i < li.length; i++) {
        var index = (li[i].innerHTML.indexOf(active[3]));
        if (index > 0) {
            li[i].classList += 'active';
        }
    }
    var els = document.getElementsByTagName('li a div');
    var f = document.querySelectorAll('a[href="' + active[3] + '"]');
    var login = document.getElementById('login');
    var pass = document.getElementById('pass');

    var enter = document.getElementById('enter');
    if (enter) {
        enter.addEventListener('click', function (e) {
            var passValue = pass.value;
            var loginValue = login.value;
            if (passValue == '' || loginValue == '') {
                e.preventDefault();
                visibleError();
                pass.value = '';
                login.value = '';
            }
        });

    }


    var addUser = document.getElementsByName('addUser');
    if (addUser[0] != undefined) {
        addUser[0].addEventListener('click', function (e) {
            var loginAdd = document.getElementsByName('loginAdd')[0];
            var idPc = document.getElementsByName('id_pc')[0];
            var data = document.getElementsByName('birthday')[0];
            var phone = document.getElementsByName('phone')[0];
            //var ava = document.getElementsByName('picture')[0];
            var ava = document.getElementById('ava_download');
            var kb = document.getElementsByName('urlKB')[0];
            var kk = document.getElementsByName('urlKK')[0];
            if (loginAdd.value == '' || idPc.value == '' || data.value == '' || ava.files.length==0 || kb.value == '' || kk.value == '') {
                e.preventDefault();
                visibleError();
            }

        });
    }
    function visibleError() {
        var eroor = document.getElementById('error');
        eroor.style.visibility = 'visible';
        eroor.style.display = 'block';
    }

};


