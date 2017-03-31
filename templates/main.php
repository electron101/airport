<?php 
include 'function/whoami.php';
if (IS_ADMIN)
{
	header('Location: ?act=admin');
	exit(0);
}
require 'templates/header.php';
?>

<style>
	body {
	  padding-top: 75px;
	}    

	.left_krai {
		padding-left: 0px;
	}
	
	.left_ {
		padding-left: 20px;
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
			<h1 class="panel-title">Укажите маршрут, чтобы найти авиабилеты </h1>
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
			
			<form class="form-inline " role="form" id="SearchTicketForm">        
			<div class="row ">		

			<div class="col-md-3">
				<!-- #формирование ниспадающего списка -->
				<div class="form-group has-feedback">
					<!-- <label for="inputText">От куда</label> -->
					<select id="gorod_vilet" name = "gorod_vilet" class="form-control selectpicker show-tick" data-live-search="true" required>
						<option value="" disabled selected>Город отправления</option>
				<?php
					#подготовка запроса
					$result = $mysqli->query("SELECT id, name FROM gorod ");
					if ($result)
				  	{
						#заполнение списка содержимым
						while ($row = $result->fetch_array())
							print "<OPTION value=".$row['id'].">".$row['name']."</OPTION>\n";
					}
				?>
					</select>
				</div>
			</div>
				
			<div class="col-md-3">
				<!-- #формирование ниспадающего списка -->
				<div class="form-group has-feedback">
					<!-- <label for="inputText">Куда</label> -->
					<select id="gorod_posadka" name = "gorod_posadka" class="form-control selectpicker show-tick" data-live-search="true" required>
						<option value="" disabled selected>Город прибытия</option>
				<?php
					#подготовка запроса
					$result = $mysqli->query("SELECT id, name FROM gorod ");
					if ($result)
				  	{
						#заполнение списка содержимым
						while ($row = $result->fetch_array())
							print "<OPTION value=".$row['id'].">".$row['name']."</OPTION>\n";
					}
				?>
					</select>
				</div>
			</div>
	
			<div class="col-md-4">
				<div class="form-group has-feedback">
					<!-- <label for="inputText">Дата</label> -->
				<!-- Элемент HTML с id равным datetimepicker1 -->
				  <div class=" input-group date input-append" id="datetimepicker_vilet">
					<span class="input-group-addon">
					  <i class="fa fa-calendar"></i>
					</span>
					<input type="text" id="date_vilet" name="date_vilet" class="form-control input-md" required>
					</input>
					<span class="glyphicon form-control-feedback"></span>
				  </div>
				</div>
			</div>
				<!-- Инициализация виджета "Bootstrap datetimepicker" -->
				<script type="text/javascript">
					$(function () 
					{
					// Идентификатор элемента HTML (например: #datetimepicker1), 
					// datetimepicker для которого необходимо инициализировать 
					// виджет "Bootstrap datetimepicker"
						$('#datetimepicker_vilet').datetimepicker({
							startDate: new Date(),
							minView: 2,
							// minuteStep: 15,
							// todayBtn : true,
							autoclose: true, 
							format: 'dd-mm-yyyy'
							// format: 'yyyy-mm-dd hh:ii:00'
							// format: 'yyyy-mm-dd'
						});
					});
				</script>

				<div class="col-md-2 ">
					<div class="form-group pull-right">
					  <button id="btn_search" class="btn btn-info " type="submit">
						<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Найти билеты</button>
					</div>
				</div>

				</div>
			</form>
		</div>
	</div>
</div>

<script src="js/search_ticket.js"></script>

<?php require 'templates/footer.php' ?>
