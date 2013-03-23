<?php
class Notfound_Controller extends BaseController{
	
	public function __default(){
		header("HTTP/1.1 404 Not Found");
		echo "Oops, 404 not found";
	}
	
	private function loadDefault(){
		return null;
	}
	
	public static function getDefaultURI(){
		return null;
	}
	
}