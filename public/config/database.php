<?php
class Database 
{
	private static $dbName = 'bidboard' ; 
	private static $dbHost = 'localhost' ;
	private static $dbUsername = 'bidboard';
	private static $dbUserPassword = '0212202';
	
	private static $cont  = null;
	
	public function __construct() {
		exit('Init function is not allowed');
	}
	
	public static function connect() {
		// One connection through whole application
		if ( null == self::$cont ) {      
			try {
				self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);  
				self::$cont->exec("set names utf8");

			} catch(PDOException $e) {
				die($e->getMessage());  
			}
		}
		return self::$cont;
	}
	
	public static function disconnect() {
		self::$cont = null;
	}
}
?>