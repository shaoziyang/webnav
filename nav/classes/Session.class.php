<?php
/**
 * Session class
 *
 * @package WikiDocs
 * @repository https://github.com/Zavy86/wikidocs
 */

final class Session{

	private static Session $singleton;

	private function __construct(){
		$this->start();
	}

	static function getInstance():Session{
		if(!isset(self::$singleton)){
			self::$singleton=new Session();
		}
		return self::$singleton;
	}

	function start(){
		// start php session
		session_start();
		// check for application session array
		if(!isset($_SESSION['sxyh']) || !is_array($_SESSION['sxyh'])){$_SESSION['sxyh']=array();}
		// check for application debug
		if(!isset($_SESSION['sxyh']['debug'])){$this->setDebug(false);}
		// check for application session alerts array
		if(!isset($_SESSION['sxyh']['alerts']) || !is_array($_SESSION['sxyh']['alerts'])){$_SESSION['sxyh']['alerts']=array();}
	}

	public function destroy(){
		session_destroy();
	}

	public function restart(){
		$this->destroy();
		$this->start();
	}

	public function autenticationLevel():int{
		return intval($_SESSION['sxyh']['authenticated'] ?? '');
	}

	public function isAuthenticated():bool{
		return ($this->autenticationLevel()>0);
	}

	public function setDebug(bool $value){
		$_SESSION['sxyh']['debug']=$value;
	}

	public function isDebug():bool{
		return boolval($_SESSION['sxyh']['debug']);
	}

	public function privacyAgreement(bool $value){
		setcookie('privacy',$value,time()+(60*60*24*30),'/');
		header('Location:'.PATH.DOC);
	}

	public function privacyAgreeded():bool{
		if(!strlen(PRIVACY ?? '')){return true;}
		return boolval($_COOKIE['privacy'] ?? false);
	}

}
