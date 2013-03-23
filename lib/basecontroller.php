<?php
abstract class BaseController{
	abstract public function __default();
	
	abstract private function loadDefault();
	
	abstract public static function getDefaultURI();
}