<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Заголовок -->
    <div class="navbar-header">
      ...
    </div>
    <!-- Основная часть меню (может содержать ссылки, формы и другие элементы) -->
    <div class="collapse navbar-collapse" id="navbar-main">
      <!-- Содержимое основной части -->

      <ul class="nav navbar-nav">
      
        <!-- Ссылки -->        
        <li class="active"><a href="#">Ссылка 1</a></li>
        <li><a href="users">Пользователи</a></li>
        <li><a href="#">Ссылка 3</a></li>
        <li><a href="#">Ссылка 4</a></li>
        <li><a href="#">Ссылка 5</a></li>

        <!-- Выпадающий список -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Раздел <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Ссылка</a></li>
            <li><a href="#">Ссылка</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Ссылка</a></li>
          </ul>
        </li>
          <form action="page" method="post">
              <li>
                  <input type="submit" value="Exit" name="exit">
              </li>
          </form>

      </ul>
      
    </div>
  </div>
</nav>