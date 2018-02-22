<div class="container">
    <div class="row">
            <div class="list1">
                <ol>
                    <?php
                    foreach ($data['office'] as $value) {
                        echo "<a href='office?office=" . $value['office_name'] . "'><li>" . $value['office_name'] . " </li></a>";
                    }
                    ?>
                </ol>
            </div>
        <div class="list1">
                        <ol>
                            <?php
                            if($data['users']!=false){
                                foreach ($data['users'] as $value) {
                                                               echo "<li><a href='users?login=" . $value['login'] . "&search=Поиск'>" . $value['login'] . "</a> </li>";
                                                           }
                            }

                            ?>
                        </ol>
                    </div>
        </div>

</div>