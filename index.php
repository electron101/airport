<?php 

/*----------------------*/
/*	АЭРОПОРТ	*/
/*----------------------*/
session_start();

/* Отправка HTTP заголовка */ 
header('content-type text/html charset=utf-8');

/* Подключаем файл настроек базы данных */
include_once('connect_bd.php');

$act = isset($_GET['act']) ? $_GET['act'] : 'login';

switch ($act) 
{
	case 'login':
		require 'templates/login.php';
		break;
	
	case 'registry':
		require 'templates/registry.php';
		break;
	
	default:
		break;
}
?>
