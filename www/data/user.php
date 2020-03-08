<?php
class User{	

	const REMOTE = "http://oukl.mshu.edu.ru/lyamin/kart51/api.php";
	public static $name;
	public static $fam;
	public static $email;
	public static $phone;
	public static $id;
	
	//ассоциативный массив cart - номер карты, balance - баланс
	public static $carts;
	
	static private function removeBOM($json){
		$json = stripslashes(trim($json));
		if (substr($json, 0, 3) == "\xef\xbb\xbf") {
			$json = substr($json, 3);
		}
		return  $json;
	}
	
	//загружает информацию о пользователе
	//если пользователь не найден, вернет false, иначе true
	static function uploadUserData($email,$password){
		$json = file_get_contents(self::REMOTE."?email=$email&password=$password");
		$json = self::removeBOM($json);
		$res = json_decode($json,true);
		if(empty($res) or count($res)==0){
			return false;
		}
		self::$id = $res[0]["id"];
		self::$name = $res[0]["name"];
		self::$fam = $res[0]["fam"];
		self::$email = $res[0]["email"];
		self::$phone = $res[0]["phone"];
		
		return true;
	}
	
	//загружает информацию о картах, должна быть предварительно успешно загружена инфа о пользователе
	static function uploadCarts(){
		if(!empty(self::$id)){
			$json = file_get_contents(self::REMOTE."?id_user=".self::$id);
			$json = self::removeBOM($json);
			$res = json_decode($json,true);
			if(empty($res) or count($res)==0){
				return false;
			}
			self::$carts = $res;
			return true;
		}
		return false;
	}
}