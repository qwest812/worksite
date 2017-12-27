<div class="col-lg-6  col-md-6 col-sm-6">
    <form action="pc" method="post">
        <h1>Данные о PC</h1>

        <p><label>№PC:</label><br>
            <input id="id" type="text" autocomplete="off" style="width: 200px" name="id">
        </p>
        <input type="submit" value="Поиск" name="search">
    </form>

    <?php
    if( $_GET['save']=='error'){
        echo"<div>Ошибка сохранения</div>";
    }elseif((int)    $_GET['save']){
        $id=(int)$_GET['save'];
        echo"<div>PC#: {$id} измен успешно</div>";
    }

    if (is_array($data)) {
        foreach ($data as $value) {
            ?>
            <form action="pc" method="post" >
                <div class="found">Type PC: <span><?= $value['type_pc'] ?></span></div>
                <div class="found"> №: <span ><?= $value['id'] ?></span></div><input style=" display: none" value="<?= $value['id'] ?>" type="text" name="id">
                <p>User Pass: </p><input type="text" class="found" value="<?= $value['pass_pc'] ?>" name="pass_pc">

                <p>First Pass:</p><input type="text" class="found" value="<?= $value['pass_first'] ?>" name="pass_first">

                <p>Second Pass:</p><input type="text" class="found" value="<?= $value['pass_second'] ?>" name="pass_second">

                <p>Third Pass</p><input type="text" class="found" value="<?= $value['pass_third'] ?>" name="pass_third">
                <p>Note</p><textarea class="found" name="pc_note"><?= $value['pc_note'] ?></textarea>

                <div class="found">Data last edit: <span><?= $value['pc_data_last_edit'] ?></span></div>
                <div class="found">User last edit: <span><?= $value['login'] ?></span></div><br>
                <input type="submit" value="save" name="save">
            </form>
            <?php
        }
    }
    ?>
</div>

