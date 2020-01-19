<?php
$host = 'localhost';
$database = 'fake'; // тут пишешь свою БД
$user = 'root';
$pass = ''; //если вдруг есть

//тут просто ничего не трогай это конект
$dsn = "mysql:host=$host;dbname=$database;";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$pdo = new PDO($dsn, $user, $pass, $options);


$table = 'departs'; // указываешь таблицу
$start_time = microtime(true);
$all_data = $pdo->query("SELECT * FROM $table");
$res_mas = $all_data->fetchAll();//возвращаем данные в виде массива
$time = microtime(true) - $start_time;

echo 'Время выполнения запроса: ' . round(microtime(true) - $start_time, 4) . ' сек,' . ' ' . 'для таблицы - ' . $table;

?>
<div class="field">
    <button name="write" class="btn btn-primary" onclick="window.location.href='search_double.php'">Проверить</button>
</div>
<!DOCTYPE>
<html lang="">
<head>
    <title>!DOCTYPE</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

<table class="table table-dark">

    <thead>
    <tr>
        <th scope="col">depart_number</th>
        <th scope="col">Name</th>
        <th scope="col">Dep_head</th>
        <th scope="col">Fin_responsible</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($res_mas

                as $item) { ?>
        <tr>
            <th scope="row"><?= $item['depart_number'] ?></th>
            <th scope="row"><?= $item['name'] ?></th>
            <th scope="row"><?= $item['dep_head'] ?></th>
            <th scope="row"><?= $item['fin_responsible'] ?></th>
        </tr>
    <? } ?>
    </tbody>
</table>
</body>
</html>
