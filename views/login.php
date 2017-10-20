<!--<form action="--><?//=SERVER.DS ?><!--check--><?//=DS ?><!--" method="post">-->
<div id="error">dsfds</div>
    <p>Введите логин</p>
    <input type="text" alt="login" name="login" id="login">
    <p>Введите Пароль</p>
        <input type="text" alt="pass" name="pass" id="pass">
    <br>
<!--    <input type="submit" onclick="enter()" id="enter">-->
    <button id="enter" style="height: 20px; width: 100px"></button>
<!--</form>-->
<script>

    window.onload=function() {

        var login = document.getElementById('login');
        var pass = document.getElementById('pass');
        var enter = document.getElementById('enter');
        enter.addEventListener('click', function (e) {
            if (pass.value == '' || login.value == '') {

            }

        });
    };
</script>