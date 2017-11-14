

    window.onload=function() {

        var login = document.getElementById('login');

        var pass = document.getElementById('pass');

        var eroor = document.getElementById('error');
        var enter = document.getElementById('enter');
        enter.addEventListener('click', function (e) {
            var passValue=pass.value;
            var loginValue=login.value;
            console.log(loginValue);
            console.log(login);
            console.log(pass);

            if (passValue == '' || loginValue == '') {
                console.log('fuck'+loginValue+"fdsfd");
                console.log();
                e.preventDefault();
                eroor.style.visibility='visible';
                eroor.style.display='block';
                pass.value='';
                login.value='';
            }

        });
    };
