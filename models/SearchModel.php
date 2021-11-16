<?php 
	trait SearchModel{
		//lay danh sach cac ban ghi, co phan trang
		public function modelRead($recordPerPage){		
			$category_id = isset($_GET["category_id"])&&is_numeric($_GET["category_id"])?$_GET["category_id"]:0;	
			//lay bien page truyen tu url
			$page = isset($_GET["page"])&&is_numeric($_GET["page"])&&$_GET["page"]>0 ? $_GET["page"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
			$fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : "";
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : "";
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where price >= $fromPrice and price <= $toPrice and category_id in (select id from categories where id=$category_id or parent_id=$category_id) order by id desc limit $from,$recordPerPage");
			//lay tat ca ket qua tra ve
			$result = $query->fetchAll();
			//---
			return $result;
		}
		//ham tinh tong so ban ghi
		public function modelTotal(){
			$category_id = isset($_GET["category_id"])&&is_numeric($_GET["category_id"])?$_GET["category_id"]:0;
			$fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : "";
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : "";
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select id from products where price >= $fromPrice and price <= $toPrice and category_id in (select id from categories where id=$category_id or parent_id=$category_id)");
			//ham rowCount: dem so ket qua tra ve
			return $query->rowCount();
		}	
		public function modelSearchProduct($recordPerPage){
			$page = isset($_GET["page"])&&is_numeric($_GET["page"])&&$_GET["page"]>0 ? $_GET["page"]-1 : 0;
			$from = $page * $recordPerPage;
			$keysearch = isset($_GET["searchkey"]) ? $_GET["searchkey"] : "";
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where name like '%$keysearch%' order by id desc limit $from,$recordPerPage ");
			$result = $query->fetchAll();
			return $result;
		}	
		public function modelTotalSearchProduct(){
			$keysearch = isset($_GET["searchkey"]) ? $_GET["searchkey"] : "";
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select id from products where name like '%$keysearch%'");
			//ham rowCount: dem so ket qua tra ve
			return $query->rowCount();
		}	
	}
 ?>