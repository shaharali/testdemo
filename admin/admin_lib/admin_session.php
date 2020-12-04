<?php

class AdminSession {
	
	public static function init(){
		session_start(); 
	}

	public static function set($key, $val){
		$_SESSION[$key] = $val;
	}
	

	public static function get($key){
		if(isset($_SESSION[$key])){
			return $_SESSION[$key];
		}else{
			return false;
		}
		
	}


	public static function checkSession(){
		self::init();
		if(self::get("login") == false){
			self::destroy();
			//header("Location:http://holyhome.eu.pn/admin/login.php");
         echo "<script>window.location = 'login.php';</script>";
		}
	}



	public static function checkLogin(){
		self::init();
		if(self::get("login") == true){			
			//header("Location:http://holyhome.eu.pn/admin/index.php");
        echo "<script>window.location = 'index.php';</script>";
        
		}
	}


	public static function destroy(){
		session_destroy();
		//header("Location:http://holyhome.eu.pn/admin/login.php");
        echo "<script>window.location = 'login.php';</script>";
	}
	








}
?>