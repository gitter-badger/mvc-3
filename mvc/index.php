<?php
class mvc {
	public static $request;
	public static $query;
	public static $action;
	public static $nameController;
	public static $nameAction;
	public static $controller;
	public static $view;
	public static $var;
	public static $db;
	public function __construct(){
		mvc::$view = true;
		mvc::type('html');
		mvc::$request = $_SERVER['REQUEST_URI'];
		mvc::$query = explode('?', mvc::$request);
		mvc::$action = explode('/', mvc::$query[0]);
		mvc::load();
	}
	public static function load(){
		if(!@mvc::$action[1]) mvc::$nameController = 'index';
		else mvc::$nameController = mvc::$action[1];
		if(!@mvc::$action[2]) mvc::$nameAction = 'index';
		else mvc::$nameAction = mvc::$action[2];
		mvc::controller(mvc::$nameController);
	}
	public static function model($name){
		if(file_exists("mvc/model/{$name}.php") === true){
			require_once('mvc/helper/' . DB_TYPE . '.class.php');
    		mvc::$db = new db();
			require_once("mvc/model/{$name}.php");
			$name = $name . "Model";
			return new $name;
		}
	}
	public static function controller($nameController){
		if(file_exists("mvc/controller/{$nameController}.php") === true){
			require_once("mvc/controller/{$nameController}.php");
			$nameController = $nameController . "Controller";
			mvc::$controller = new $nameController;
			$nameAction = mvc::$nameAction;
			if(method_exists(mvc::$controller, $nameAction)){
				mvc::$controller->$nameAction();
				if(mvc::$view) mvc::view();
			} else mvc::view('error', 'index');
		} else mvc::view('error', 'index');
	}
	public static function component($nameComponent){
		if(file_exists("mvc/components/{$nameComponent}.php") === true){
			require_once("mvc/components/{$nameComponent}.php");
			$nameComponent = $nameComponent . "Component";
			return new $nameComponent;
		}
	}
	public static function view($nameController = null, $nameAction = null){
		if(!$nameController) $nameController = mvc::$nameController;
		if(!$nameAction) $nameAction = mvc::$nameAction;
		require_once("mvc/view/header.tpl");
		require_once("mvc/view/menu.tpl");
		if(file_exists("mvc/view/{$nameController}/{$nameAction}.tpl") === true){
			require_once("mvc/view/{$nameController}/{$nameAction}.tpl");
		}
		require_once("mvc/view/footer.tpl");
	}
	public static function type($filetype){
		switch ($filetype) {
			case 'json': header("Content-type: application/json; charset=utf-8"); break;
			case 'html': default: header("Content-type: text/html; charset=utf-8"); break;
		}
	}
	public static function redirect($url){
		@header('Location: ' . $url);
		echo "<script language='JavaScript'> location.href='" . $url . "'; </script>";
	}
}
?>