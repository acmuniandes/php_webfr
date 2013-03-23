<?php
class Router_Controller extends BaseController{
	
	public function __default(){
		try{
			//Fetch the request
			if(!REQ_URI){
				$controller = AutoLoader::loadController('home');
				$controller -> __default();
			} else {
				$request = explode('/',REQ_URI);
				$controller = Autoloader::loadController($request[0]);
				
				if(isset($request[1])){
					$action = $this -> getAction($request[1]);
					$controller -> $action();
				} else {
					$controller -> __default();
				}
			}
		} catch(Exception_404 $e){
			$controller = Autoloader::loadController('notfound');
			$controller -> __default();
		}
	}
	
	private function loadDefault(){
		return null;
	}
	
	public static function getDefaultURI(){
		return null;
	}
	
	private function getAction($actionstr){
		$parts = explode("-",$actionstr);
		$action = $parts[0];
		for($i = 1; $i < sizeof($parts); $i++){
			$action .= ucfirst($parts[$i]);
		}
		return $action;
	}
}

