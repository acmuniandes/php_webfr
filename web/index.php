<?php 

//Defining base paths
define('DS', DIRECTORY_SEPARATOR);
define('SERVER_ROOT' , $_SERVER['DOCUMENT_ROOT']);
define('CONTROLLERS' , SERVER_ROOT . DS . '..' . DS . 'app' . DS . 'controllers');
define('MODELS' , SERVER_ROOT . DS . '..' . DS . 'app' . DS . 'models');
define('VIEWS' , SERVER_ROOT . DS . '..' . DS . 'app' . DS . 'views');
define('LIB' , SERVER_ROOT . DS . '..' . DS . 'lib');
define('CONFIG' , SERVER_ROOT . DS . '..' . DS . 'config');
define('TMP' , SERVER_ROOT . DS . '..' . DS . 'tmp');
define('CSS' , SERVER_ROOT . DS .'css');
define('CSS_LIB' , CSS . DS .'lib');
define('JS' , SERVER_ROOT . DS .'js');
define('JS_LIB' , JS . DS .'lib');
define('IMG' , SERVER_ROOT . DS .'img');

//Defining site root
define('SITE_ROOT' , 'http://157.253.238.87:81');

//Defining request URI
define('REQ_URI', trim($_SERVER['REQUEST_URI'],'/'));

require_once LIB . DS . 'bootstrap.php';