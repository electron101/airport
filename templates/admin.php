<?php 
require 'templates/header_admin.php';
include 'function/whoami.php';
if (!IS_ADMIN)
	header('Location: ?act=main');
?>

<style>
	body 
	{
		padding-top: 50px;
	}    

	.left_krai {
		padding-left: -50px;
	}
	
	.interval {
		margin-bottom: -20px;
	}

	textarea {
    resize: none; /* Запрещаем изменять размер */
   } 
</style>

<div class="col-sm-5 col-sm-offset-0 left_krai">
<!-- Контейнер, содержащий форму обратной связи -->
	<div class="panel panel-info">
		<!-- Заголовок контейнера -->
		<div class="panel-heading panel-title">
			<h1 class="panel-title">Новая заявка</h1>
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
			
			<form role="form" id="TicketAddForm">        

				<!-- #формирование ниспадающего списка -->
				<div class="form-group has-feedback">
					<label for="inputText">От кого</label>
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
					<div class="interval" align="right"><small><a href="?act=client_add">Добавить клиента</a></small></div>
				</div>
				
				<!-- #формирование ниспадающего списка -->
				<div class="form-group has-feedback">
					<label for="inputText">Кому</label>
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

				<div class="form-group">
				  <label>Приоритет</label><br>

				  <label class="radio-inline">
					<input type="radio" name="prioritet" value="2">Низкий
				  </label>

				  <label class="radio-inline">
					<input type="radio" name="prioritet" value="1" checked>Средний
				  </label>

				  <label class="radio-inline">
					<input type="radio" name="prioritet" value="0">Высокий
				  </label> 

				</div>

				<div class="form-group has-feedback">
				  <label>Тема</label>
				  <input type="text" name="theme" class="form-control" placeholder="Тема" required>
				  <span class="glyphicon form-control-feedback"></span>
				</div> 
				
				<div class="form-group has-feedback">
				  <label>Сообщение</label>
				  <textarea name="msg" rows="5" class="form-control" placeholder="Суть заявки" required></textarea>
				  <span class="glyphicon form-control-feedback"></span>
				</div>

				<div class="form-group">
				  <button id="btn_add" class="btn btn-lg btn-success" type="submit">
				  	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Добавить</button>
				</div>

			</form>

		</div>
	</div>
</div>

<script src="js/ticket_add.js"></script>

<?php require 'templates/footer.php' ?>
