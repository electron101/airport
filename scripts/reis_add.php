<?php
/*
 *	[ ДОБАВЛЕНИЕ САМОЛЁТА ]
 */
include_once('../connect_bd.php');

if (!empty($_POST)) 
{
	try 
	{	
								/****************************
								 *	ПРОВЕРКА ВХОДНЫХ ДАННЫХ	*
								 ****************************/

		$gorod_vilet = strip_tags($_POST['gorod_vilet']);
		$gorod_vilet = htmlspecialchars($gorod_vilet);
		$gorod_vilet = $mysqli->real_escape_string($gorod_vilet);
		
		$gorod_posadka = strip_tags($_POST['gorod_posadka']);
		$gorod_posadka = htmlspecialchars($gorod_posadka);
		$gorod_posadka = $mysqli->real_escape_string($gorod_posadka);
		
		// $date_vilet = strip_tags($_POST['date_vilet']);
		// $date_vilet = htmlspecialchars_decode($date_vilet);
		// $date_vilet = '2009-04-30 10:09:00'; 
		// $date_vilet = htmlspecialchars($date_vilet);
		// $date_vilet = $mysqli->real_escape_string($date_vilet);
		
		// $date_posadka = strip_tags($_POST['date_posadka']);
		// $date_posadka = $_POST['date_posadka'];
		// $date_posadka = htmlspecialchars_decode($date_posadka);
		// $date_posadka = '2009-04-30 10:09:00';
		// $date_posadka = htmlspecialchars($date_posadka);
		// $date_posadka = $mysqli->real_escape_string($date_posadka);
		
		$bort_num = strip_tags($_POST['bort_num']);
		$bort_num = htmlspecialchars($bort_num);
		$bort_num = $mysqli->real_escape_string($bort_num);

		$colvo_mest = 11;


		$date_vilet = $_POST['date_vilet2'];
		// $date_vilet = strip_tags($_POST['date_vilet2']);
		// $date_vilet = htmlspecialchars($date_vilet);
		// $date_vilet = $mysqli->real_escape_string($date_vilet);
		
		$date_posadka = $_POST['date_posadka2'];
		// $date_posadka = strip_tags($_POST['date_posadka2']);
		// $date_posadka = htmlspecialchars($date_posadka);
		// $date_posadka = $mysqli->real_escape_string($date_posadka);


								/****************************
								 *	ПОДГОТОВКА ЗАПРОСА		*
								 ****************************/

		if (!($stmt = $mysqli->prepare("INSERT INTO reis (date_time_vilet, date_time_posadka, id_gorod_vilet, id_gorod_posadka, id_samolet, colvo_mest) VALUES (?, ?, ?, ?, ?, ?)")))
		{
			echo "invalid";
			exit();
		}

		/*******************************************************************************************/

								/****************************
								 *	ПРИВЯЗКА ДАННЫХ			*
								 ****************************/

		if (!$stmt->bind_param('ssiiii', $date_vilet, $date_posadka, $gorod_vilet, $gorod_posadka, $bort_num, $colvo_mest))
		{
			echo "invalid";
			exit();
		}

								/****************************
								 *	ВЫПОЛНЕНИЕ ЗАПРОСА		*
								 ****************************/

		if (!$stmt->execute())
		{
			echo "invalid";
			exit();
		}

		/*******************************************************************************************/

		/* закрываем запрос */
		$stmt->close();
		/* закрываем открытое соединение */
		$mysqli->close(); 

		/* если всё успешно посылаем серверу success */
	    echo "success";

    } 
    catch (Exception $e) 
    {
		echo "invalid";
		exit();
	}
}
else 
{
	echo "invalid";
}
?>
