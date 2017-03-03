<?php 
require 'templates/header.php'; 
?>
<style>
	body {
	  padding-top: 45px;
	}     

	.left_krai {
		padding-left: 0px;
	}
</style>

<div class="col-sm-5 col-sm-offset-0 left_krai">
<!-- Контейнер, содержащий форму обратной связи -->
	<div class="panel panel-info">
		<!-- Заголовок контейнера -->
		<div class="panel-heading panel-title">
			<h1 class="panel-title">Новый пользователь</h1>
		</div>
		<!-- Содержимое контейнера -->
		<div class="panel-body">
						
			<div class="alert alert-success hidden" id="success-alert">
				<strong>Успешно!</strong> Запись добавлена
			</div>
			<div class="alert alert-danger hidden" id="danger-alert">
				<strong>Неудача!</strong> Что то пошло не так
			</div>
			<div class="alert alert-danger hidden" id="login-alert">
				<p>Этот логин уже занят</p>
			</div>
			<div class="hidden" id="success-alert-btn">
				<a class="btn btn-sm btn-info" href="?act=user_add" role="button">
					<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Назад</a>
			</div>
			
			<form role="form" id="UserAddForm">        

				<div class="form-group has-feedback">
				  <label for="inputText">ФИО</label>
				  <input type="text" id="fio" name="fio" class="form-control" placeholder="ФИО" required autofocus>
				  <!-- <p class="help-block">Пример строки с подсказкой</p> -->
				  <span class="glyphicon form-control-feedback"></span>
				</div>

				<div class="form-group has-feedback">
				  <label for="inputText">Логин</label>
				  <input type="text" name="login" class="form-control" placeholder="Логин" required>
				  <span class="glyphicon form-control-feedback"></span>
				</div>
				  
				<div class="form-group has-feedback">
				  <label for="inputPassword">Пароль</label>
				  <input type="password" id="password" name="password" class="form-control" placeholder="Пароль" required>
				  <span class="glyphicon form-control-feedback"></span>
				</div>      

				<div class="form-group has-feedback">
				  <label for="inputPassword">Пароль ещё раз</label>
				  <input type="password" id="password2" name="password2" class="form-control" placeholder="Пароль ещё раз" required>
				  <span class="glyphicon form-control-feedback"></span>
				</div> 
				
				<div class="form-group has-feedback">
				  <label for="inputEmail">Email</label>
				  <input type="email" name="email" class="form-control" placeholder="Email" required>
				  <span class="glyphicon form-control-feedback"></span>
				</div>

				<div class="form-group has-feedback">
				  <label for="inputTel">Телефон</label>
				  <input type="tel" name="tel" class="form-control" placeholder="Телефон" required>
				  <span class="glyphicon form-control-feedback"></span>
				</div>
						
				<div class="form-group">
				  <label>Роль в системе</label><br>
				  <label class="radio-inline">
					<input type="radio" name="priv" value="0">Администратор
				  </label>

				  <label class="radio-inline">
					<input type="radio" name="priv" value="1">Координатор
				  </label>

				  <label class="radio-inline">
					<input type="radio" name="priv" value="2" checked>Исполнитель
				  </label>          
				</div>
				
				<div class="form-group">
				  <div class="checkbox">
					  <label>
						  <input type="checkbox" name="status" value="1" checked> Включить пользователя
					  </label>
				  </div>          
				</div>

				<div class="form-group">
				  <button id="btn_add" class="btn btn-lg btn-success" type="submit">
				  	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Добавить</button>
				</div>

			</form>

		</div>
	</div>
</div>
  
<script src="js/user_add.js"></script>

<?php require 'template/footer.php' ?>






























<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- The above 3 meta tags *must* come first in the head; any other 
	head content must come *after* these tags -->

	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">

	<title>Аэропорт</title>

	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="css/signin.css" rel="stylesheet">

	<style>
	body {
		padding-top: 90px;
	}    

	.skleit {
		margin-top: -16px;
	}

	.skleit_alert {
		margin-bottom: 5px;
		height: 10px;
	}

	p {
		margin-top: -10px;
	}

	h5 {
		padding-bottom: 50px;
	}

	.text-center {
		text-align: center;
	}

	.sk2 {
		margin-bottom: 15px;
	}

	.glyph {
		margin-top: 5px;
	}

	</style>

	<script src="jquery/jquery-3.1.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

  </head>

  <body>
	<div class="container">

	<form class="form-signin" role="form" id="LoginForm">
		<h1 class="text-center form-signin-heading">Аэропорт</h1>
		<h5 class="text-center form-signin-heading">
			ПАНЕЛЬ УПРАВЛЕНИЯ
		</h5>

		<div class="alert alert-danger skleit_alert hidden" 
			id="login-alert">
			<p>Неверный логин или пароль</p>
		</div>
		<div class="alert alert-danger skleit_alert hidden" 
			id="danger-alert">
			<p>Что то пошло не так</p>
		</div>
		<div class="alert alert-success skleit_alert hidden" 
			id="success-alert">
			<p>Вход выполнен</p>
		</div>
		<div class="alert alert-danger skleit_alert hidden" 
			id="status_off-alert">
			<p>Пользователь отключён</p>
		</div>

		<div class="form-group sk2 has-feedback">
			<input type="text" name="login" 
				class="form-control" placeholder="Логин"
				required autofocus>
			<span class="glyphicon glyph form-control-feedback" 
				aria-hidden="true">
			</span>
		</div>

		<div class="form-group skleit has-feedback">
			<input type="password" name="password" 
				class="form-control" 
				placeholder="Пароль" required>
			<span class="glyphicon glyph form-control-feedback">
			</span>
		</div>

		<div class="form-group">
			<a href="index.php?act=recover_login">Восстановить пароль</a>
		</div>			

		<button id="btn_login" class="btn btn-lg btn-primary btn-block" 
			type="submit">Войти
		</button>
	</form>

	</div>
	
	<script src="js/login.js"></script>
  </body>
</html>

