<?php
$ini_array = parse_ini_file("config.ini");
include("rsyncsyncEnable.php");



$rsync = new rsyncsyncEnable\databaseSync($ini_array);
$dumpfilePath = $rsync->mysqlDump();
$replaced = $rsync->fqdnReplace($dumpfilePath);


var_dump($replaced);



//class databaseSync {
//	//
//}



//$dumpfilePath = $rsync->mysqlDump();

///**
// * ssh2 connect on php
// *
// *
// *
// */
//class databaseSync
//{
//	/**
//	 * Database connect propaties
//	 *
//	 * database source
//	 * destination database
//	 */
//	
//	// source
//	protected $host;
//	protected $user;
//	protected $password;
//	protected $dbname;
//	protected $port;
//	protected $char;
//	protected $collate;
//	protected $driver;
//	
//	// destination
//	protected $host_t;
//	protected $user_t;
//	protected $password_t;
//	protected $dbname_t;
//	protected $port_t;
//	protected $char_t;
//	protected $collate_t;
//	protected $driver_t;
//	
//	protected $tmpPath = "/tmp";
//	
//
//	function __construct($ini_array) {
//		
//		// If empty, fill with default value
//		if (empty($ini_array["dbc"]["port"])) {
//			$ini_array["dbc"]["port"] = "3306";
//		}
//		if (empty($ini_array["dbc"]["char"])) {
//			$ini_array["dbc"]["char"] = "utf8";
//		}
//		if (empty($ini_array["dbc"]["collate"])) {
//			$ini_array["dbc"]["collate"] = "utf8_general_ci";
//		}
//		if (empty($ini_array["dbc"]["driver"])) {
//			$ini_array["dbc"]["driver"] = "PDO_MYSQL";
//		}
//		
//		// Member set
//		$this->host = $ini_array["dbc"]["host"];
//		$this->user = $ini_array["dbc"]["user"];
//		$this->password = $ini_array["dbc"]["password"];
//		$this->dbname = $ini_array["dbc"]["dbname"];
//		$this->port = $ini_array["dbc"]["port"];
//		$this->char = $ini_array["dbc"]["char"];
//		$this->collate = $ini_array["dbc"]["collate"];
//		$this->driver  = $ini_array["dbc"]["driver"];
//	}
//	
//	/**
//	 * MySQL PDO connect
//	 *
//	 *
//	 *
//	 */
////	function connect() {
////		
////		$dsn = 'mysql:dbname='.$this->dbname.';'.$this->host;
////		$driver = array();
////		try{
////			$dbh = new PDO($dsn, $this->user, $this->password, $driver);
////		}catch (PDOException $e){
////			print('Error:'.$e->getMessage());
////			die();
////		}
//////		echo $this->host."\n";
//////		echo $this->user."\n";
//////		echo $this->password."\n";
//////		echo $this->dbname."\n";
//////		echo $this->port."\n";
//////		echo $this->char."\n";
//////		echo $this->collate."\n";
////		
////		return $dbh;
////	}
////	
//	/**
//	 * MySQL Dump
//	 *
//	 *
//	 * @returun absorute dumpfile(sql file) path.
//	 */
//	function mysqlDump() {
//		$datetime = date('Ymd_His', time());
//		$dump = "mysqldump -u ".$this->user." -p".$this->password." -h ".$this->host." ".$this->dbname." > ".__DIR__.$this->tmpPath."/".$datetime."_db.sql";
//		
//		echo "mysqldump exec!\n";
//		exec($dump, $e);
//		
//		if (filesize(__DIR__.$this->tmpPath."/".$datetime."_db.sql") > 0) {
//			echo "dump file saved ".__DIR__.$this->tmpPath."/".$datetime."_db.sql"."\n";
//			return __DIR__.$this->tmpPath."/".$datetime."_db.sql";
//		} else {
//			$rm = "rm -f ".__DIR__.$this->tmpPath."/".$datetime."_db.sql";
//			echo "mysqldump failed."."\n";
//			exec($rm, $e);
//			die();
//		}
//	}
//	
//	function fullpathReplace($dumpfilePath) {
//		
//		
//		return true;
//	}
//	
//	function domainReplace() {
//		
//		return true;
//	}
//	
//	
//}