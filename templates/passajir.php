<?php 
include 'function/whoami.php';
if (IS_ADMIN)
{
	header('Location: ?act=admin');
	exit(0);
}
require 'templates/header.php';
include_once('../connect_bd.php');
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

<div class="col-sm-6 col-sm-offset-3 ">
<!-- Контейнер, содержащий форму обратной связи -->
	<div class="box box-primary ">
		<!-- Заголовок контейнера -->
		<div class="box-header with-border">
			<h3 class="box-title">Информация о пассажире </h3>
		</div>
		<!-- Содержимое контейнера -->
		<div class="panel-body ">
						
			<form method = "POST" action = "?act=oplata_karta" role="form" id="Form">        

				<div class="form-group has-feedback">
				  <label for="inputText">Фамилия</label>
				  <input type="text" id="fname" name="fname" class="form-control" placeholder="Фамилия" required autofocus>
				  <span class="glyphicon form-control-feedback"></span>
				</div>
				
				<div class="form-group has-feedback">
				  <label for="inputText">Имя</label>
				  <input type="text" id="name" name="name" class="form-control" placeholder="Имя" required autofocus>
				  <span class="glyphicon form-control-feedback"></span>
				</div>
	
				<div class="form-group has-feedback">
				  <label for="inputText">Электронная почта</label>
				  <input type="text" id="email" name="email" class="form-control" placeholder="Электронная почта" required autofocus>
				  <span class="glyphicon form-control-feedback"></span>
				</div>
				
				<div class="form-group">
				  <label>Пол</label><br>
				  <label class="radio-inline">
					<input type="radio" name="pol" value="1" checked>М
				  </label>
				  <label class="radio-inline">
					<input type="radio" name="pol" value="1">Ж
				  </label>
				</div>
				
				<div class="form-group has-feedback">
					<label for="inputText">Дата рождения</label>
				<!-- Элемент HTML с id равным datetimepicker1 -->
				  <div class=" input-group date input-append" id="datetimepicker_rojden">
					<span class="input-group-addon">
					  <i class="fa fa-calendar"></i>
					</span>
					<input type="text" id="date_rojden" name="date_rojden" class="form-control input-md" required>
					</input>
					<span class="glyphicon form-control-feedback"></span>
				  </div>
				</div>
				<!-- Инициализация виджета "Bootstrap datetimepicker" -->
				<script type="text/javascript">
					$(function () 
					{
					// Идентификатор элемента HTML (например: #datetimepicker1), 
					// datetimepicker для которого необходимо инициализировать 
					// виджет "Bootstrap datetimepicker"
						$('#datetimepicker_rojden').datetimepicker({
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

				<div class="form-group has-feedback">
				  <label for="inputText">Номер паспорта</label>
				  <input type="text" id="passport" name="passport" class="form-control" placeholder="Паспорт" required autofocus>
				  <span class="glyphicon form-control-feedback"></span>
				</div>
				
				<div class="form-group pull-right">
				  <button id="btn_passport" class="btn btn-info " type="submit">
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Перейти к оплате картой</button>
				  <input type="hidden" name="id_reis" value=<?=$_POST['id_reis']?>>
				  <input type="hidden" name="id_stoimost" value=<?=$_POST['id_stoimost']?>>
				</div>

			</form>

		</div>
	</div>
</div>

<?php require 'templates/footer.php'; ?>
