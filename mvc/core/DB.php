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
		protected $db;
		public $userCollection;
		public $messageCollection;
		public $khachthueCollection;
		public $phieuthutienCollection;
		public $phieuthuephongCollection;
		public $phieutraphongCollection;
		public $phongtroCollection;
		public $thietbiCollection;
		public $lastIdCollection;

		public static function __construct()
		{
			$this->query = new MongoDB\Driver\Query($this->filter, $this->options);
			$this->mongoConnection = new MongoDB\Driver\Manager($this->servername);

			$this->connection = new MongoDB\Client(
				'mongodb+srv://hainguyenvan6799:Thu123456789@phongtro.ezstc.mongodb.net/phongtrodb?retryWrites=true&w=majority'
			);
			$this->db = $this->connection->phongtrodb;
			
			$this->userCollection = $this->db->users;
			$this->messageCollection = $this->db->message;
			$this->khachthueCollection = $this->db->khachthue;
			$this->phieuthutienCollection = $this->db->phieuthutien;
			$this->phieuthuephongCollection = $this->db->phieuthuephong;
			$this->phieutraphongCollection = $this->db->phieutraphong;
			$this->phongtroCollection = $this->db->phongtro;
			$this->thietbiCollection = $this->db->thietbi;
			$this->lastIdCollection = $this->db->last_id_collection;
		}

	}
 ?>