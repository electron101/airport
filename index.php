<?php 

/*----------------------*/
/*	АЭРОПОРТ	*/
/*----------------------*/
session_start();

/* Отправка HTTP заголовка */ 
header('content-type text/html charset=utf-8');

/* Подключаем файл настроек базы данных */
include_once('connect_bd.php');

/* Подключаем Smarty */
include_once('libs/Smarty.class.php');

/* Новый экземпляр класса Smarty */
$smarty = new Smarty();

$act = isset($_GET['act']) ? $_GET['act'] : 'login';

switch ($act) 
{
	case 'login':
		$smarty->display('login.tpl');
		break;
	
	default:
		break;
}
?>
