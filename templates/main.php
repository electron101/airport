<?php require 'templates/header.php' ?>
<style>
	body {
	  padding-top: 95px;
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
			
			<form class="form-inline " role="form" id="SearchTicket">        
			<div class="row">		

				<!-- #формирование ниспадающего списка -->
				<div class="col-md-3 ">
				<div class="form-group has-feedback">
					<select id="client" name = "client" class="form-control selectpicker show-tick" data-live-search="true" onChange="info_client(this.value)" required>
						<option value="" disabled selected>Клиент</option>
				<?php
					#подготовка запроса
					$result = $mysqli->query("SELECT id, fio FROM clients");
					if ($result)
				  	{
						#заполнение списка содержимым
						while ($row = $result->fetch_array())
							print "<OPTION value=".$row['id'].">".$row['fio']."</OPTION>\n";
					}
				?>
					</select>
				</div>
				</div>
				
				<!-- #формирование ниспадающего списка -->
				<div class="col-md-3 ">
				<div class="form-group has-feedback">
					<select id="user" name = "user" class="form-control selectpicker show-tick" required>
						<option value="" disabled selected>Исполнитель</option>
				<?php
					#подготовка запроса
					$result = $mysqli->query("SELECT id, fio, login FROM users WHERE priv = 2");
					if ($result)
				  	{
						#заполнение списка содержимым
						while ($row = $result->fetch_array())
							print "<OPTION value=".$row['id'].">".$row['fio'].' ('.$row['login'].')'."</OPTION>\n";
					}
				?>
					</select>
				</div>
				</div>
	
				<div class="col-md-3 ">
				<div class="form-group has-feedback">
				<!-- Элемент HTML с id равным datetimepicker1 -->
				  <div class=" input-group date input-append" id="datetimepicker_start">
					<span class="input-group-addon">
					  <i class="fa fa-calendar"></i>
					</span>
					<input type="text"  name="date_start" class="form-control input-sm" required>
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
						$('#datetimepicker_start').datetimepicker({
							minView : 2,
							// defaultDate: new Date(),
							// defaultDate: "11/1/2013",
							autoclose: true,
							format: 'dd-mm-yyyy'
						});
					});
				</script>

				<div class="col-md-3 ">
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
