<?php
// подключаем шапку 
require __DIR__ . '/header.php'; 
// подключаем БД
require "db.php"; 

// Производим выход пользователя
unset($_SESSION['logged_user']);

//На главную страницу
header('Location: index.php');

require __DIR__ . '/footer.php'; // Подключаем подвал 
?>