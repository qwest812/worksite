<?php
if ((int)$_GET['id'] > 0) {
    echo "<div>Компьютер с номером: " . $_GET['id'] . " был добавлен в базу</div>";
} elseif ($_GET['id'] == 'error') {
    echo "<div>Ошибка добавления</div>";
}
?>
<div class="col-lg-4  col-md-4 col-sm-4">
    <div>Добавить PC</div>
    <div class="fifty">
        <form action="pc" method="post">
                <div>Тип ПК</div>
                <select name="typePC" >
                    <?php
                    foreach ($data as $value) {
                        echo '<option name="' . $value['type_pc'] . '">' . $value['type_pc'] . '</option>';
                    }
                    ?>

                </select>
                <div>Пароль PC</div>
                <input name=" passPc" type="text" id="passPC">

                <div>First Pass</div>
                <input name="firstPass" type="text" id="firstPassPC">

                <div>Second Pass</div>
                <input name="secondPass" type="text" id="secondPassPC">

                <div>Third Pass</div>
                <input name="thirdPass" type="text" id="thirdPassPC"><br><br>
                <input type="submit" value="добавить" name="addPc" id="addPC">
            </form>
        </div>

</div>
<div class="col-lg-2  col-md-2 col-sm-2">
        <?php
        //        var_dump($_SESSION['lastIdInTable']);
        echo isset($_SESSION['lastIdInTable']) ? 'Последний Id в таблице ПК: ' . $_SESSION['lastIdInTable'] : 'Ошибка';
        ?>
    </div>