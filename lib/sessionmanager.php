<?php
class SessionManager{
	
	private static $id;
		
	public static function start(){
		session_start();
        $_SESSION["isLoggedIn"] = TRUE;
		self::$id   = session_id();
	}
	
	public static function getParameter($key){
		if(self::isParameterSet($key)){
			return $_SESSION[$key];		
		}
		else {
			throw new Exception_NoSessionVar("No such session parameter stored");
		}
	}
	
	public static function setParameter($key, $val){
		$_SESSION[$key] = $val;
	}
	
	public static function isParameterSet($key){
		if(array_key_exists($key, $_SESSION)){
			return true;
		}
		else {
			throw false;
		}
	}
	
	public static function destroy(){
		self::$id = null;
		session_unset();
		session_destroy();
	}

    public static function isLoggedIn(){
        return $_SESSION["isLoggedIn"];
    }


}