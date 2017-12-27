<?php
if ((int)$_GET['id'] > 0) {
    echo "<div>Компьютеру был присвоен номер: " . $_GET['id'] . "</div>";
} elseif ($_GET['id'] == 'error') {
    echo "<div>Ошибка добавления</div>";
}
?>
<div class="fifty">
    <div>Добавить PC</div>
    <div class="fifty">
        <form action="pc" method="post">
            <div>Тип ПК</div>
            <select>
                <?php
                var_dump($typePC);
                foreach ($typePC as $value) {
                    echo '<option>' . $value['type_pc'] . '</option>';
                }
                ?>


            </select>

            <div>Пароль PC</div>
            <input name=" passPc" type="text">

            <div>First Pass</div>
            <input name="firstPass" type="text">

            <div>Second Pass</div>
            <input name="secondPass" type="text">

            <div>Pass PC</div>
            <input name="thirdPass" type="text"><br><br>
            <input type="submit" value="добавить" name="addPc">
        </form>
    </div>
    <div class="fifty">
        <?php
        //        var_dump($_SESSION['lastIdInTable']);
        echo isset($_SESSION['lastIdInTable']) ? 'Последний Id в таблице ПК: ' . $_SESSION['lastIdInTable'] : 'Ошибка';
        ?>
    </div>
</div>