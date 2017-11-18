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
                                                               echo "<li>" . $value['login'] . " </li></a>";
                                                           }
                            }

                            ?>
                        </ol>
                    </div>
        </div>

</div>