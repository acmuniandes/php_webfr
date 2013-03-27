<?php
class Router{
	
	public static function route(){
		try{
			$model = new Model();
			//Fetch the request
			if(!REQ_URI){
				$controller = self::loadController($model,'home');
				$controller -> executeAction();
			} else {
				$request = explode('/',REQ_URI);
				if(isset($request[1])){
					$action = self::getAction($request[1]);
					$controller = self::loadController($model,$request[0],$action);
					$controller -> executeAction();
				} else {
					$controller = self::loadController($model,$request[0]);
					$controller -> executeAction();
				}
			}
		} catch(Exception_404 $e){
			$controller = self::loadController($model,'notfound');
			$controller -> executeAction();
		}
	}
	
	private static function loadController($model, $controller, $action = false){
		$classPath = CONTROLLERS . DS . $controller . '.controller.php';
		if(is_file($classPath)){
			require_once $classPath;
			$className = ucfirst($controller) . 'Controller';
			if(class_exists($className)){
				try{
					if($action)
						return new $className($model,$action);
					else
						return new $className($model);
				}catch (Exception_404 $e){
					throw $e;
				}
			} else {
				throw new Exception_404();
			}
		} else {
			throw new Exception_404();
		}
	}
	
	private static function getAction($actionstr){
		$parts = explode("-",$actionstr);
		$action = $parts[0];
		for($i = 1; $i < sizeof($parts); $i++){
			$action .= ucfirst($parts[$i]);
		}
		return $action;
	}
}