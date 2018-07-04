<?php

class DatabaseManager {
	private $_connection;
	private static $_instance;	// singleton

	// constructor
	private function __construct() {
		$this->_connection = new mysqli("localhost", "root", "", "egovernment");
		
		// error handling
		if (mysqli_connect_error()) {
			trigger_error("Verbindung zur Datenbank ist fehlgeschlagen: " . mysqli_connect_error(), E_USER_ERROR);
		}
	}
	
	// get instance as singleton
	public static function getInstance() {
		if (!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	public function getConnection() {
		return $this->_connection;
	}
	
	public function __destruct() {
		$this->_connection->close();
	}
}

?>