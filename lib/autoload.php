<?php
class AutoLoader {
	protected static $paths = array(
		MODELS,LIB	
	);
	public static function addPath($path) {
		$path = realpath($path);
		if ($path) {
			self::$paths[] = $path;
		}
	}
	public static function load($class) {
		$classPath = DS . str_replace('_', DS, strtolower($class)) . '.php';
		foreach (self::$paths as $path) {
			if (is_file($path . $classPath)) {
				require_once $path . $classPath;
				return;
			}
		}
	}
	public static function loadController($controller){
		$classPath = CONTROLLERS . DS . $controller . '.php';
		if(is_file($classPath)){
			require_once $classPath;
			$className = ucfirst($controller) . '_Controller';
			if(class_exists($className)){
				return new $className();
			} else {
				throw new Exception_404();
			} 
		} else {
			throw new Exception_404();
		}
	}
	public static function loadView($view, $data){
		$classPath = VIEWS . DS . str_replace('_', DS, strtolower($view)) . '.php';
		if(is_file($classPath)){
			extract($data);
			require $classPath;
		}
	}
}