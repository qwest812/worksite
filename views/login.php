<div id="errLogin"><?= $actions ?></div>
<div  id="error">Заполните все поля</div>
<form action="login" method="post">

  <div class="control-group">

    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" id="login" placeholder="Login..." name="login">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Пароль</label>
    <div class="controls">
      <input type="password" id="pass" placeholder="Пароль..." name="pass">
    </div>
  </div>
  <div class="control-group" >
    <div class="controls">
      <label class="checkbox" ">
        <input type="checkbox" name="save"> Запомнить меня
      </label>
      <button type="submit" class="btn" id="enter">Войти</button>
    </div>
  </div>
    </form>
