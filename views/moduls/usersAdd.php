  <div class=" col-lg-4  col-md-4 col-sm-4">
      <?php
      if ($_GET['add'] == 'good') {
          echo "<div> Пользователь <b>".$_SESSION['loginAdd']."</b> добавлен</div>";
      } elseif ($_GET['add'] == 'error') {
          echo "<div>Пользователь с таким логином уже существует</div>";
      }
      ?>
    <div>Добавить Пользователя</div>
      <div  id="error">Заполните все поля</div>
    <div class="fifty">
        <form action="users" method="post" enctype="multipart/form-data" >
            <div>Login</div>
            <input name="loginAdd" type="text" pattern="^[A-Za-zА-Яа-яЁё]+$" title="Only Letters">
            <div>Office</div>
            <select name="office">
                            <?php
                            foreach ($data as $value) {
                                echo '<option name="' . $value['office_name'] . '">' . $value['office_name'] . '</option>';
                            }
                            ?>
                        </select>
            <div>Id PC</div>
             <input id="id" type="text" autocomplete="off" style="width: 200px" name="id_pc" pattern="^[0-9]+$" title="Only Number">
            <div>Birthday:</div>

            <p>Date: <input type="text"name="birthday" id="datepicker" title="Example  1992-02-15"pattern="(19|20)\d\d-((0[1-9]|1[012])-(0[1-9]|[12]\d)|(0[13-9]|1[012])-30|(0[13578]|1[02])-31)"></p>
            <div>Phone</div>
            <input type="text" name="phone" pattern="^[0-9]{10}" title="Example 0993628823">

            <div>Avatar Img</div>
            <input name="picture" type="file" id="ava_download"><br>
            <div>Url keepass bd</div>
                        <input type="text" name="urlKB" >
            <div>Url keepass key</div>
                        <input type="text" name="urlKK">
            <br>
            <br>
            <input type="submit" value="добавить" name="addUser">
        </form>
    </div>
</div>