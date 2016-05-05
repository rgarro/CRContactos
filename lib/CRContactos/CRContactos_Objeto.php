<?php
/**
 * Objeto Generico CRContactos
 * 
 * @author Rolando <rgarro@gmail.com>
 */
require_once 'netgeo.php';
 
App::uses('BaseLog', 'Log/Engine');
App::uses('Security', 'Utility'); 
 
class CRContactos_Objeto
{
	public static function verify_csfr_key($value,$key){
		if($value == CRContactos_Objeto::get_csfr_key($key)){
			return true;
		}else{
			return false;
		}
	}
	
	public static function get_csfr_key($key){
		try{
			if(isset($_SESSION['csfr_keys'][$key])){
				return $_SESSION['csfr_keys'][$key];
			}else{
				throw new Exception("csfr key not found: ".$key);
			}
		}catch(Exception $e){
			CRContactos_Objeto::log_exception(__CLASS__." ".__METHOD__." ".$e->getMessage());
			return false;
		}
	}
	
	public static function set_csfr_key($key){
		try{
			if(strlen($key) >0){
				$csfr_key="";
				$crypt_phrases = Configure::read("Website.csfr_seeds");
				shuffle($crypt_phrases);
				$key = rand(0,count($crypt_phrases)-1);
				$key_b = rand(0,count($crypt_phrases)-1);
				$separator = rand(100, 999);
				$csfr_key .= Security::hash(strrev(str_replace("_", $separator, $crypt_phrases[$key_b])), 'sha1', true);
				$csfr_key .= Security::hash(strrev(str_replace("_", $separator, $crypt_phrases[$key])), 'sha1', true);
				$_SESSION['csfr_keys'][$key] = $csfr_key;
				return $csfr_key;
			}else{
				throw new Exception("cant create csfr with empty key");
			}
		}catch(Exception $e){
			CRContactos_Objeto::log_exception(__CLASS__." ".__METHOD__." ".$e->getMessage());
			return false;
		}
	}
	
	public static function log_exception($msg){
		if(strlen($msg) >= Configure::read("Website.min_exception_length")){
			$ip = "0.0.0.0";
			$lat = 0;
			$lon = 0;
			if(isset($_SERVER['REMOTE_ADDR'])){
				$ip = $_SERVER['REMOTE_ADDR'];
				netGeo::getNetGeo($ip);
				$lat = netGeo::$Latitude->__toString();
				$lon = netGeo::$Longitude->__toString();
			}
			$log_str = $msg." ".date("F j, Y, g:i a")." ".$ip." lat: ".$lat." lon: ".$lon;
			//$logly_post_cmd = 'curl -H "content-type:text/plain" -d "'.$log_str.'" http://logs-01.loggly.com/inputs/a7c0915a-00d2-46ef-8811-a2ef4a9d3365/tag/http/';
			//$r = shell_exec($logly_post_cmd);	
			CakeLog::write('exception', $log_str);
		}else{
			throw new Exception("trying to log exception with below lenght");
		}		
	}
}
