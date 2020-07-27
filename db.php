<?php
// Подключаем RedBeanPHP
require "test/rb-mysql.php";

// Подключаемся к БД
R::setup( 'mysql:host=localhost;dbname=users','root', '' );

// Проверка подключения к БД
if(!R::testConnection()) die('No DB connection!');

// Старт сессии 
session_start(); 
?>