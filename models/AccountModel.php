<?php 
	trait AccountModel{
		public function modelRegister(){
			$name = $_POST["name"];
			$email = $_POST["email"];
			$address = $_POST["address"];
			$phone = $_POST["phone"];
			$password = $_POST["password"];
			//kiem tra neu email khong ton tai trong table customers thi insert
			$conn = Connection::getInstance();
			$check = $conn->prepare("select id from customers where email=:var_email");
			$check->execute(array("var_email"=>$email));
			if($check->rowCount() == 0){
				$password = md5($password);
				$query = $conn->prepare("insert into customers set name=:var_name,email=:var_email,address=:var_address,phone=:var_phone,password=:var_password");
				$query->execute(array("var_name"=>$name,"var_email"=>$email,"var_address"=>$address,"var_phone"=>$phone,"var_password"=>$password));
				//di chuyen den trang login
				header("location:index.php?controller=account&action=login&notify=success");
			}else
				header("location:index.php?controller=account&action=register&notify=exists");
		}
		public function modelLogin(){
			$email = $_POST["email"];
			$password = $_POST["password"];
			$password = md5($password);
			$refPage = $_POST['refPage'];
			$conn = Connection::getInstance();
			$query = $conn->prepare("select email,id,name from customers where email=:var_email and password=:var_password");
			$query->execute(array("var_email"=>$email,"var_password"=>$password));
			if($query->rowCount() > 0){
				//---
				$record = $query->fetch();
				//---
				$_SESSION["customer_email"] = $record->email;
				$_SESSION["customer_id"] = $record->id;
				$_SESSION["customer_name"] = $record->name;
				header("location:" . $refPage);
			}else
				header("location:index.php?controller=account&action=login");
		}
		//orders
		//ham liet ke danh sach cac ban ghi, co phan trang
		public function modelRead($recordPerPage){
			//lay tong to so ban ghi
			$total = $this->modelTotal();
			//tinh so trang
			$numPage = ceil($total/$recordPerPage);
			//lay so trang hien tai truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//thuc hien truy van
			$conn = Connection::getInstance();
			$query = $conn->query("select * from orders order by id,status desc limit $from, $recordPerPage");
			//tra ve tat ca cac ban truy van duoc
			return $query->fetchAll();
		}
		//ham tinh tong so ban ghi
		public function modelTotal(){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select id from orders");
			//lay tong so ban ghi
			return $query->rowCount();
			//---
		}
		//lay mot ban ghi trong table customers		
		public function modelGetCustomers($id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from customers where id = $id");
			//tra ve mot ban ghi
			return $query->fetch();
			//---
		}
		//lay mot ban ghi trong table products		
		public function modelGetProducts($id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where id = $id");
			//tra ve mot ban ghi
			return $query->fetch();
			//---
		}
		public function modelRemoveOrders(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$conn = Connection::getInstance();
			$conn->query("update orders set status = 3 where id = $id");
		}
		//lay danh sach cac san pham trong talbe orderdetails
		public function modelListOrderDetails($id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from orderdetails where order_id = $id");
			//tra ve mot ban ghi
			return $query->fetchAll();
			//---
		}//lay mot ban ghi table orders
		public function modelGetOrders($id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from orders where id = $id");
			//tra ve mot ban ghi
			return $query->fetch();
			//---
		}
	}
 ?>