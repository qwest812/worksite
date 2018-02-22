<div class="container  col-lg-8  col-md-8 col-sm-8">
    <form action="users" method="get">
        <h1>Данные о пользователях</h1>

        <p><label>Пользователь:</label> <br><input id="user" type="text" autocomplete="off" style="width: 200px"
                                                   name="login"></p>
        <input type="submit" value="Поиск" name="search">
    </form>

    <?php

    if (is_array($data)) {
//        var_dump($data['user']['img_url']);
        ?>
        <img id="avatar" src="
        <?php

        if ($data['user']['img_url'])
            echo $data['user']['img_url'];
        else
            echo '../webroot/tmp/not_avatar.jpg'
        ?>
        ">

        <form action="users" method="post">
            <div  id="errorUserUpdate">Пароли не совпадают</div>
            <p>Login: <input name="login" type="text" class="found" value="<?= $data['user']['login'] ?>"></p>

            <p>№PC: <input name="numberPc" type="text" class="found" id="idPC" value="<?= $data['pc']['id'] ?>"
                           autocomplete="off"></p>

            <p>Office:
                <select name="office">
                    <?php

                    foreach ($data['user']['officeList'] as $value) {
                        if ($value['office_name'] == $data['user']['office']) {
                            $select = 'selected="selected"';
                        } else {
                            $select = '';
                        }
                        echo '<option ' . $select . '

                                                name="' . $value['office_name'] . '">' . $value['office_name'] . '</option>';
                    }
                    ?>
                </select>
            </p>

            <p>Project: <input name="project" type="text" class="found" value="<?= $data['user']['project'] ?>"
                               id="project"></p>
            <?php
            if ($_SESSION['access'] == 'admin') {
                echo "
                    <p>ChangePass: <input name='pass' type='password'  class='found' ></p>
                    <p>RepeatPass: <input name='passRe' type='password'  class='found' ></p>
                    <p>Access: <input name='access' type='text'  class='found' value='{$data['user']['id_access'] }'></p>
                ";

            }
            ?>

            <p>Phone: <input   name="phone" type="text" class="found" value="<?= $data['user']['phone'] ?>"></p>

            <p>Birthday: <input name="birthday" type="text" class="found" id="birthday"
                                value="<?= $data['user']['birthday'] ?>"></p>

            <p>KeePass BD: <input name="keepassBD" type="text" class="found"
                                  value="<?= $data['user']['url_kee_pass_bd'] ?>"></p>

            <p>Keepass Key: <input name="keepassKey" type="text" class="found"
                                   value="<?= $data['user']['url_kee_pass_key'] ?>"></p>

            <div class="found">User Last edit: <span><?= $data['user']['user_last_edit'] ?></span></div>
            <div class="found">Data Last Edit: <span><?= $data['user']['data_last_edit'] ?></span></div>
            <div class="found">Data Registration: <span><?= $data['user']['dataReg'] ?></span></div>

            <input type="submit" value="Save" name="updateUser">
        </form>
        <br>
        <div>PC Information</div>
        <br>

        <div class="found">PC Id: <span><a
                    href="pc?id=<?= $data['pc']['id'] ?>&search=Поиск"><?= $data['pc']['id'] ?></a></span></div>
        <div class="found">Type PC: <span><?= $data['pc']['type_pc'] ?></span></div>
        <div class="found">First Pass: <span><?= $data['pc']['pass_first'] ?></span></div>
        <div class="found">Second Pass: <span><?= $data['pc']['pass_second'] ?></span></div>
        <div class="found">Third Pass: <span><?= $data['pc']['pass_third'] ?></span></div>
        <div class="found">User last edit: <span><?= $data['pc']['user_add'] ?></span></div>
        <div class="found">Data last edit: <span><?= $data['pc']['pc_data_last_edit'] ?></span></div>

        <?php
    }
    ?>
</div>
