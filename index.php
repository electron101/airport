<?php 

/*------------------*/
/*     АЭРОПОРТ     */
/*------------------*/
session_start();

/* Отправка HTTP заголовка */ 
header('content-type text/html charset=utf-8');

/* Подключаем файл настроек базы данных */
include_once('connect_bd.php');

$act = isset($_GET['act']) ? $_GET['act'] : 'main';

switch ($act) 
{
	case 'login':
		require 'templates/login.php';
		break;
	
	case 'registry':
		require 'templates/registry.php';
		break;
	
	case 'main':
		require 'templates/main.php';
		break;
	
	case 'admin':
		require 'templates/admin.php';
		break;
	
	case 'logout':		
		unset($_SESSION['id_user']);
		unset($_SESSION['login']);
		unset($_SESSION['priv']);
		session_destroy();
		header('Location: .');
		break;
	
	default:
		require 'templates/main.php';
		break;
}
?>
