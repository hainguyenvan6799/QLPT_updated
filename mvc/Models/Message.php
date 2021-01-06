<?php 
	class Message extends DB
	{
		public function __construct(){
			parent::__construct();
		}
		public function test(){
			echo "function test Message model";
		}
		public function getMessageFromMeToUser($user_id)
		{
			$my_id = $_SESSION['user_id'];
			
			$filter =['$or' => [
				[ '$and' => [ ['from'=>$my_id], ['to'=>(int)$user_id] ] ],
				 ['$and' => [ ['from'=>(int)$user_id], ['to' => $my_id] ]]
			] ];

			$message =  parent::$messageCollection->find($filter);

			parent::$messageCollection->updateMany(
				[ 'from' => (int)$user_id, 'to'=> (int)$my_id, 'is_read' => 0],
			    ['$set' => ['is_read' => 1]],
			    ['multi' => true, 'upsert' => false]
			);
			return $message;

			// $this->query = new MongoDB\Driver\Query($this->filter, $this->options);
			// $message = $this->mongoConnection->executeQuery("phongtrodb.message", $this->query);
			// foreach($message as $m)
			// {
			// 	echo $m->message;
			// }

			// $bulk = new MongoDB\Driver\BulkWrite;
			// $bulk->update(
			//     [ 'from' => (int)$user_id, 'to'=> $my_id, 'is_read' => 0],
			//     ['$set' => ['is_read' => 1]],
			//     ['multi' => true, 'upsert' => false]
			// );

			// $result = $this->mongoConnection->executeBulkWrite("phongtrodb.message", $bulk);
			
		}

		public function createMessage($from, $to, $message, $is_read){
			// $messageCollection = (new MongoDB\Client)->phongtrodb->message;

			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$document = [
				"from" => $from,
				"to" => (int)$to,
				"message" => $message,
				"is_read" => $is_read,
				"time" => date("Y-m-d H:i:s")
			];
			parent::$messageCollection->insertOne($document);

		}

		public function countMessageNoRead($from){
			$count = 0;
			$to = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : "";
			// $messageCollection = (new MongoDB\Client)->phongtrodb->message;
			$ops = [
				[
					'$lookup' => [
						"from" => "users",
						"localField" => "from",
						"foreignField" => "user_id",
						"as" => "users_doc"
					]
				],
				[
					'$match' => [
						"from" => (int)$from,
						"to" => (int)$to,
						"is_read" => 0
					]
				],
				[
					'$group' => [
						"_id" => null,
						"count" => ['$sum' => 1]
					]
				]	
			];
			$result = parent::$messageCollection->aggregate($ops);
			foreach($result as $r)
			{
				$count = $r["count"];
			}
			return $count;
		}

		public function time_elapsed_B($secs){
		    $bit = array(
		        ' years'        => $secs / 31556926 % 12,
		        ' weeks'        => $secs / 604800 % 52,
		        ' days'        => $secs / 86400 % 7,
		        ' hours'        => $secs / 3600 % 24,
		        ' minutes'    => $secs / 60 % 60,
		        ' seconds'    => $secs % 60
		        );
		       
		    foreach($bit as $k => $v){
		        if($v > 1)$ret[] = $v . $k ;
		        if($v == 1)$ret[] = $v . $k;
		        }
		    array_splice($ret, count($ret)-1, 0, 'and');
		    $ret[] = 'ago.';
		   
		    return join(' ', $ret);
		}

		public function countMessageToAdmin(){
			$count = parent::$messageCollection->countcount([
				'$and' => [
					["to"=> (int)0],
					['is_read' => (int)0]
				]
			]);

			return $count;
		}
	}
 ?>