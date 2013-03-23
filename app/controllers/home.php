<?php
class Home_Controller extends BaseController{
	
	public function __default(){
		$this->loadDefault();
	}

	private function loadDefault(){
		AutoLoader::loadView("Home_Default", array('title' => 'Home'));
	}
	
	public static function getDefaultURI(){
		return "/home";
	}
}