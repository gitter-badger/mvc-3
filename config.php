<?php
# Configurações do PHP
	ini_set('display_errors', true);
	setlocale(LC_ALL, 'pt_BR.utf8');
	error_reporting(E_ALL);
	session_cache_expire(300);
	date_default_timezone_set('America/Sao_Paulo');
	header ('Content-type: text/html; charset=UTF-8');
	header('Access-Control-Allow-Origin: none');
# Sessão
	session_name('MVC_System');
	session_start();
# Sistema
	define('SYS_NAME', 'MVC');
	define('SYS_BASE', 'http://' . $_SERVER['SERVER_NAME']);
# Database
	define('DB_TYPE', 'mongo');
	define('DB_LOCAL', 'localhost');
	define('DB_PORT', '27017');
	define('DB_BASE', 'mvc');
	define('DB_USER', 'root');
	define('DB_PASS', '');
?>