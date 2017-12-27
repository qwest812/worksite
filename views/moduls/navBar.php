<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="page"><?= $_SERVER['HTTP_HOST'] ?></a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="page"><span class="glyphicon glyphicon-tasks"></span> Главная</a></li>
            <li><a href="users"><span class="glyphicon glyphicon-user"></span> Пользователи</a></li>
            <li><a href="pc"><span class="glyphicon glyphicon-unchecked"></span> PC</a></li>
            <li><a href="imei"><span class="glyphicon glyphicon-phone"></span> Imei</a></li>
            <li><a href="office"><span class="glyphicon glyphicon-home"></span> Офисы</a></li>
            <li><a href="orders"><span class="glyphicon glyphicon-usd"></span> Заказы</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li style="color:white;"><span class="glyphicon glyphicon-user"></span> Здравствуй <?= $_SESSION['login'] ?>
                <form action="page" method="post" id="form">
                    <input type="submit" value="Выйти" name="exit">
                </form>
            </li>
            <li><span class="glyphicon glyphicon-log-in"></span>

            </li>
        </ul>
    </div>
</nav>
