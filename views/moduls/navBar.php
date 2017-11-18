<style>
  input[name="exit"] {
    position: relative;
	    background: none;
    color: white;
	    border: 0 none;
	    cursor: pointer;
	    outline: none;
	    vertical-align: top;
	    padding: 5px;
	}
  input[type="submit"] span {
	    position: relative;
	    top: 0;
	    left: 0;
	    border: 0;
	}
</style>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="page"><?= $_SERVER['HTTP_HOST']?></a>
    </div>
    <ul class="nav navbar-nav">
            <li><a href="page">Главная</a></li>
              <li><a href="users">Пользователи</a></li>
              <li><a href="pc">PC</a></li>
              <li><a href="office">Офисы</a></li>
              <li><a href="orders">Заказы</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li style="color:white;"><span class="glyphicon glyphicon-user"></span> Здравствуй <?= $_SESSION['login']?>
        <form action="page" method="post" id="form">
                                          <input type="submit" value="Выйти" name="exit">
                                  </form></li>
      <li><span class="glyphicon glyphicon-log-in"></span>

        </li>
    </ul>
  </div>
</nav>
