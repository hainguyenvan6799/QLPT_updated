<?php 
	// require_once "./mvc/core/vendor/autoload.php";
	class DB
	{
		protected $servername = "mongodb://localhost:27017";
		protected $filter = [];
		protected $options = [];
		protected $query;
		public $mongoConnection;

		public $connection;
		public $db;
		public static $userCollection;
		public static $messageCollection;
		public static $khachthueCollection;
		public static $phieuthutienCollection;
		public static $phieuthuephongCollection;
		public static $phieutraphongCollection;
		public static $phongtroCollection;
		public static $thietbiCollection;
		public static $lastIdCollection;

		public function __construct()
		{
			$client = new MongoDB\Client();
			    'mongodb+srv://hainguyenvan6799:FpStNIkhVebgmica@cluster0.kyvzw.mongodb.net/phongtrodb?retryWrites=true&w=majority');

			$db = $client->phongtrodb;
			self::$userCollection = $db->users;
			self::$messageCollection = $db->message;
			self::$khachthueCollection = $db->khachthue;
			self::$phieuthutienCollection = $db->phieuthutien;
			self::$phieuthuephongCollection = $db->phieuthuephong;
			self::$phieutraphongCollection = $db->phieutraphong;
			self::$phongtroCollection = $db->phongtro;
			self::$thietbiCollection = $db->thietbi;
			self::$lastIdCollection = $db->last_id_collection;
		}

	}
 ?>