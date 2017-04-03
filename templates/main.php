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
			
<?php
if (isset($_POST['gorod_vilet']))
	echo $_POST['gorod_vilet'];
else
	echo "NO SOSACING";
?>


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
			
			<form method = "POST" action = "" class="form-inline " role="form" id="SearchTicketForm">        
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

<?php

		$date_vilet    = $_POST["date_vilet"];
		$gorod_vilet   = $_POST["gorod_vilet"];
		$gorod_posadka = $_POST["gorod_posadka"];
		
		$date_vilet_start = $date_vilet." 00:00:00";
		$date_vilet_end   = $date_vilet." 23:59:59";

		$result = $mysqli->query("SELECT * FROM reis WHERE id_gorod_vilet = '$gorod_vilet' AND id_gorod_posadka = '$gorod_posadka' AND colvo_mest > 0 AND date_time_vilet BETWEEN STR_TO_DATE('$date_vilet_start', '%d-%m-%Y %H:%i:%s') AND STR_TO_DATE('$date_vilet_end', '%d-%m-%Y %H:%i:%s')");
		
		if ($result):?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover " style=" font-size: 14px;" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Дата вылета</th>
                            <th>Дата посадки</th>
                            <th>Откуда</th>
                            <th>Куда</th>
                            <th>Бортовой номер</th>
                            <th>Количество мест</th>
                            <th class="text-right">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form role="form" id="Form">
	<?php while ($row = $result->fetch_assoc()):?>
	 					<tr>
                            <td style=" vertical-align: middle; "><small class=""><?=$row["id_reis"]?></small>
                            </td>

                            <td style=" vertical-align: middle; "><small class=""><?=$row["date_time_vilet"]?></small>
                            </td>

                            <td style=" vertical-align: middle; "><small class=""><?=$row["date_time_posadka"]?></small>
                            </td>

                            <td style=" vertical-align: middle; "><small class=""><?=$row["gorod_vilet"]?></small>
                            </td>

                            <td style=" vertical-align: middle; "><small class=""><?=$row["gorod_posadka"]?></small>
                            </td>

                            <td style=" vertical-align: middle; "><small class=""><?=$row["bort_num"]?></small>
                            </td>
                            <td style=" vertical-align: middle; "><small class=""><?=$row["colvo_mest"]?></small>
							</td>

                            <td class="text-right">
                                <div class="btn-group btn-group-xs ">

                                    <button data-original-title="Редактировать" id="sort_list" value="main" type="button" class="btn btn-primary " data-toggle="tooltip" data-placement="bottom" title="" onclick="return edit('<?=$row["id_reis"]?>')"><i class="fa fa-edit"></i> </button>

                                    <button data-original-title="Удалить" id="sort_list" value="free" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="" onclick="return del('<?=$row["id_reis"]?>')"><i class="fa fa-trash"></i> </button>

                                </div>
                            </td>
                            
                        </tr>
    <?php endwhile;?>
                        </form>
    				</tbody>
                </table>
            </div>

	<?php endif;

    $result->free();
	$mysqli->close();
?>

		</div>
	</div>
</div>

<!-- <script src="js/search_ticket.js"></script> -->

<script>
$(function() 
{
  //при отправке нажатии на кнопку отправления данных
  $('#btn_search').click(function(event) 
  {
	//отменить стандартное действие браузера
	event.preventDefault();
	//завести переменную, которая будет говорить о том валидная форма или нет
	var formValid = true;
	//перебирает все элементы управления формы (input и textarea) 
	$('#SearchTicketForm input,textarea').each(function() 
	{
	  //найти предков, имеющих класс .form-group (для установления success/error)
	  var formGroup = $(this).parents('.form-group');
	  //найти glyphicon (иконка успеха или ошибки)
	  var glyphicon = formGroup.find('.form-control-feedback');
	  //валидация данных с помощью HTML5 функции checkValidity
	  if (this.checkValidity()) 
	  {
		//добавить к formGroup класс .has-success и удалить .has-error
		formGroup.addClass('has-success').removeClass('has-error');
		//добавить к glyphicon класс .glyphicon-ok и удалить .glyphicon-remove
		glyphicon.addClass('glyphicon-ok').removeClass('glyphicon-remove');
	  } 
	  else 
	  {
		//добавить к formGroup класс .has-error и удалить .has-success
		formGroup.addClass('has-error').removeClass('has-success');
		//добавить к glyphicon класс glyphicon-remove и удалить glyphicon-ok
		glyphicon.addClass('glyphicon-remove').removeClass('glyphicon-ok');
		//если элемент не прошёл проверку, то отметить форму как не валидную 
		formValid = false;  
	  }	  
	  
	  var gorod_vilet   = $("#gorod_vilet").val();
	  var gorod_posadka = $("#gorod_posadka").val();

		if (gorod_vilet == null) 
		{		
			// получаем элемент, содержащий пароль
			inputclient = $("#gorod_vilet");
			//найти предка, имеющего класс .form-group (для установления success/error)
			formGroupclient = inputclient.parents('.form-group');
			//добавить к formGroup класс .has-error и удалить .has-success
			formGroupclient.addClass('has-error').removeClass('has-success');
			
			formValid = false;
		}  
		
		if (gorod_posadka == null) 
		{		
			// получаем элемент, содержащий пароль
			inputclient = $("#gorod_posadka");
			//найти предка, имеющего класс .form-group (для установления success/error)
			formGroupclient = inputclient.parents('.form-group');
			//добавить к formGroup класс .has-error и удалить .has-success
			formGroupclient.addClass('has-error').removeClass('has-success');
			
			formValid = false;
		}  
	});

	//если форма валидна, то
	if (formValid) 
	{	
		var str = $('#SearchTicketForm').serialize();

		$.ajax(
		{
			url: "scripts/ticket_show.php",
			type: "POST",
			dataType:"json",
			data: str,

			success:function(msg)
			{
				// echo JSON::encode($data);
				// <?php echo $msg ?>
			},
			error:function(x,s,d)
			{
				alert(d);
			}
		});
	}
  });
});
</script>


<?php require 'templates/footer.php'; ?>
