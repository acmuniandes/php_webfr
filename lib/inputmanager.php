<?php
class InputManager{
	
	private static $get;
	private static $post;
	
	public static function getPOST(){
		if($this->isPOST()){
			if(!self::$post){
				self::$post = self::cleanInput($_POST);
			}
			return self::$post;
		}
		else
			throw new Exception_InvalidHTTPMethod("Invalid method type");
	}
	
	public static function getGET(){
		if($this->isGET()){
			if(!self::$get){
				self::$get = self::cleanInput($_GET);
			}
			return self::$get;
		}
		else
			throw new Exception_InvalidHTTPMethod("Invalid method type");
	}
	
	public static function isPOST(){
		if($_SERVER['REQUEST_METHOD'] == 'POST')
			return true;
		else
			return false;
	}
	
	public static function isGET(){
		if($_SERVER['REQUEST_METHOD'] == 'GET')
			return true;
		else
			return false;
	}
	
	public static function getParameter($param){
		return self::isGET() ? self::getGET()[$param]: self::getPOST()[$param];
	}
	
	private static function cleanInput($array){
		$array = array_map('strip_tags', $array);
		$array = array_map('htmlentities', $array, array_fill(0, size($array), ENT_QUOTES), array_fill(0, size($array), "UTF-8"));
		$array = array_map('stripslashes', $array);
		$array = array_map('utf8_decode'', $array);
		return $array;
	}
}