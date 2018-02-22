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
            if (loginAdd.value == '' || idPc.value == '' || data.value == '' || ava.files.length == 0 || kb.value == '' || kk.value == '') {
                e.preventDefault();
                visibleError();
            }

        });
    }
    function visibleError(element) {
        if (element) {
            var eroor = document.getElementById(element);
        } else {
            var eroor = document.getElementById('error');
        }

        eroor.style.visibility = 'visible';
        eroor.style.display = 'block';
    }


    var updateUser = document.getElementsByName('updateUser')[0];
    if (updateUser != undefined) {
        updateUser.addEventListener('click', function (e) {
            var pass = document.getElementsByName('pass')[0];
            var passRe = document.getElementsByName('passRe')[0];
            if (pass.value != passRe.value) {
                pass.value = '';
                passRe.value = '';
                e.preventDefault();
                visibleError('errorUserUpdate');
            }

        });
    }


    var serchPc = document.getElementsByName('search')[0];
    if (serchPc != undefined) {
        serchPc.addEventListener('click', function (e) {
            e.preventDefault();
            var idPc = document.getElementsByName('id')[0].value;
            var number = parseInt(idPc, 10);
            var nan = isNaN(number);


            if (!nan) {
                var ourRequest = new XMLHttpRequest;

                var url = "http://worksite/generate_json?id=2&request=" + idPc;
                ourRequest.open("GET", "http://worksite/generate_json?id=" + idPc + "&request=id_pc", true);
                ourRequest.onload = function () {
                    var ourData = JSON.parse(ourRequest.responseText);
                    console.log(ourData);


                    var id = ourData.id;
                    var pass_first = ourData.pass_first;
                    var pass_pc = ourData.pass_pc;
                    var pass_second = ourData.pass_second;
                    var pass_third = ourData.pass_third;
                    var pc_data_last_edit = ourData.pc_data_last_edit;

                    var elId = document.getElementById('id_el');
                    elId.innerHTML = id;
                    var elUserPass = document.getElementById('userPass_el');
                    elUserPass.innerHTML = pass_pc;
                    var elpassFirst = document.getElementById('firstPass_el');
                    elpassFirst.innerHTML = pass_first;
                    var elpassSecond = document.getElementById('secondPass_el');
                    elpassSecond.innerHTML = pass_second;
                    var elpassThird = document.getElementById('thirdPass_el');
                    elpassThird.innerHTML = pass_third;
                    var elLastEdit = document.getElementById('lastEdit_el');
                    elLastEdit.innerHTML = pc_data_last_edit;
                    var el_vissibility= document.getElementById('hidden_el');
                    //console.log(el_vissibility);
                    el_vissibility.removeAttribute('id');



                };
                ourRequest.send();


            }


        });

    }
};


