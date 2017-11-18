<head>
    <meta charset="utf-8"/>
    <title></title>

    <link href="../../webroot/css/jquery.autocomplete.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="../../webroot/js/jquery-1.5.2.min.js"></script>
    <script type="text/javascript" src="../../webroot/js/jquery.autocomplete.pack.js"></script>
    <script type="text/javascript" src="../../webroot/js/script.js"></script>
</head>
<body>
<div class="container">
    <form action="users" method="post">
        <h1>Данные о пользователях</h1>
        <p><label>Пользователь:</label> <br><input id="user" type="text" autocomplete="off" style="width: 200px" name="login"></p>
        <input type="submit" value="Поиск" name="search">
    </form>
</div>
</body>