<?php

class session{




    public static $user = "userkey";
    public static $role = 'userrole';


    private function setKey($key){
        if(isset($_SESSION[$key])){
            return true;
        }
            return false;
    }


    public static function isLogin(){
        if(self::setKey(self::$user)){
            return true;
        }
        return false;
    }



	public static function logout($case = null) {
		if (!empty($case)) {
			$_SESSION[$case] = null;
			unset($_SESSION[$case]);
		} else {
			session_destroy();
		}
	}
    

}