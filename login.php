<?php 
// Формы
$title="Форма авторизации";
// подключаем шапку
require __DIR__ . '/header.php'; 
// подключаем соединения с БД
require "db.php"; 
//Установка Cookie
if (SetCookie("Test","Value"));

// Создаем переменную для сбора данных от пользователя по методу POST
$data = $_POST;

//Нажимает кнопку "Авторизоваться"- код выполняться
if(isset($data['do_login'])) { 

 // Создаем массив для сбора ошибок
 $errors = array();

 // Проводим поиск пользователей в таблице users
 $user = R::findOne('users', 'login = ?', array($data['login']));

 if($user) {

 	// Если имееться в БД, тогда проверяем пароль
 	if(password_verify($data['password'], $user->password)) {

 		// Все совпало в БД - пускаем пользователя
 		$_SESSION['logged_user'] = $user;
 		
 		// На главную страницу
                header('Location: index.php');

 	} else {
    
    $errors[] = 'Пароль неверно введен!';

 	}

 } else {
 	$errors[] = 'Пользователь с таким логином не найден!';
 }

if(!empty($errors)) {

		echo '<div style="color: red; ">' . array_shift($errors). '</div><hr>';

	}

}
?>

<div class="container mt-4">
		<div class="row">
			<div class="col">
		<!-- Форма авторизации -->
		<h2>Форма авторизации</h2>
		<form action="login.php" method="post">
			<input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" required><br>
			<input type="password" class="form-control" name="password" id="pass" placeholder="Введите пароль" required><br>
			<button class="btn btn-primary" name="do_login" type="submit">Авторизоваться</button>
		</form>
		<br>
			</div>
		</div>
	</div>
<!-- Подключаем подвал -->
<?php require __DIR__ . '/footer.php'; ?> 