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
}