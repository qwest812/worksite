

    window.onload=function() {
        var ourRequest = new XMLHttpRequest;




        var login = document.getElementById('login');
        var pass = document.getElementById('pass');
        var eroor = document.getElementById('error');
        var enter = document.getElementById('enter');
        //var value= eroor.style;
        console.log(eroor);
        enter.addEventListener('click', function (e) {
            ourRequest.open("GET", "http://education/hm/newTask/02.08.2017/JSON.json", true);
                ourRequest.onload = function () {
                    var ourData = JSON.parse(ourRequest.responseText);
                    render(ourData);
                };
                ourRequest.send();



            console.log(eroor);
            if (pass.value == '' || login.value == '') {

                e.preventDefault();
                eroor.style.visibility='visible';
                eroor.style.display='block';
                pass.value='';
                login.value='';
            }

        });
    };
