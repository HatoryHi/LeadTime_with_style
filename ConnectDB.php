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

//тут уже можно творить что угодно
$table = 'mains'; // указываешь таблицу
$all_data = $pdo->query("SELECT * FROM $table");
$res_mas = $all_data->fetchAll();//возвращаем данные в виде массива
