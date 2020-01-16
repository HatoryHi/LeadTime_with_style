<? include_once 'ConnectDB.php'; ?>
<!DOCTYPE>
<html lang="">
<head>
    <title>!DOCTYPE</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

<div align="center">
    <br>
    <form action="search_double.php" method="post">
        <label>
            <input type="text" name="number" placeholder="Введи знак(<,===,>)">
        </label><br/>

        <button type="submit" class="btn btn-primary">Поиск</button>
    </form>
    <? $f = ' ';
    $f = $_POST['number'];

    ?>
</div>


</body>
<table class="table">

    <thead>
    <tr>
        <th>depart</th>
        <th>inv_num</th>
        <th>name</th>
        <th>accepted</th>
        <th>written_off</th>
        <th>cost</th>
    </tr>
    </thead>
    <tbody>
    <?
    $i = 0;

    $action = "$f";//правильно

    ?>
    <?
    foreach ($res_mas as $item) {

        switch ($action) {
            case '>':
                if (($item['accepted']) > ($item['written_off'])) {
                    ?>
                    <tr>
                        <th scope="row"><?= $item['depart'] ?></th>
                        <td><?= $item['inv_num'] ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['accepted'] ?></td>
                        <td><?= $item['written_off'] ?></td>
                        <td><?= $item['cost'] ?></td>
                    </tr>
                    <?
                    $i++;
                }
                break;

            case '<':
                if (($item['accepted']) < ($item['written_off'])) {
                    ?>
                    <tr>
                        <th scope="row"><?= $item['depart'] ?></th>
                        <td><?= $item['inv_num'] ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['accepted'] ?></td>
                        <td><?= $item['written_off'] ?></td>
                        <td><?= $item['cost'] ?></td>
                    </tr>
                    <?
                    $i++;
                }
                break;
            case '===':

                if (($item['accepted']) === ($item['written_off'])) {
                    ?>
                    <tr>
                        <th scope="row"><?= $item['depart'] ?></th>
                        <td><?= $item['inv_num'] ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['accepted'] ?></td>
                        <td><?= $item['written_off'] ?></td>
                        <td><?= $item['cost'] ?></td>
                    </tr>
                    <?
                    $i++;
                }
                break;

        } ?>
    <? } ?>
    <? if ($i === 0) {
        $t = 'Ахуенно их нету я крут';
    } else {
        $t = $i . ' , не понял блять';
    } ?>
    <?= 'Принято' . ' ' . "$f" . ' списано =' . ' ' . $t . ' , работаем с таблицей: ' . $table . '' ?>
    </tbody>
</table>

</html>