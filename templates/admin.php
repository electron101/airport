<?php 
require 'templates/header_admin.php';
// include 'function/whoami.php';
// if (!IS_ADMIN)
// 	header('Location: ?act=main');
?>

<style>
	body {
	  padding-top: 75px;
	}    

	.left_krai {
		padding-left: 0px;
	}
	
	.interval {
		margin-bottom: -20px;
	}

	textarea {
    resize: none; /* Запрещаем изменять размер */
   } 
</style>

<div class="col-sm-12 col-sm-offset-0 left_krai">
<!-- Контейнер, содержащий форму обратной связи -->
	<div class="panel panel-info">
		<!-- Заголовок контейнера -->
		<div class="panel-heading panel-title">
			<h1 class="panel-title">Укажите маршрут, чтобы найти выгодные авиабилеты </h1>
		</div>
		<!-- Содержимое контейнера -->
		<div class="panel-body">
						
			<div class="alert alert-success hidden" id="success-alert">
				<strong>Успешно!</strong> Запись добавлена
			</div>
			<div class="alert alert-danger hidden" id="danger-alert">
				<strong>Неудача!</strong> Что то пошло не так
			</div>
			<div class="alert alert-danger hidden" id="client-not-select-alert">
				Клиент не выбран!
			</div>
			<div class="hidden" id="success-alert-btn">
				<a class="btn btn-sm btn-info" href="?act=ticket_add" role="button">
					<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Назад</a>
			</div>
			
		<div class="row">		
			<div class="col-md-3">
					<label for="inputText">От куда</label>
			</div>
			<div class="col-md-3">
					<label for="inputText">Куда</label>
			</div>
			<div class="col-md-3">
					<label for="inputText">Дата</label>
			</div>
		</div>
			
		</div>
	</div>
</div>

<script src="js/search_ticket.js"></script>

<?php require 'templates/footer.php' ?>
