<?php 
	//load file model
	include "models/AccountModel.php";
	class AccountController extends Controller{
		//ke thua class model
		use AccountModel;
		public function register(){
			$this->loadView("AccountRegisterView.php");
		}
		public function registerPost(){
			//goi ham model de insert ban ghi
			$this->modelRegister();			
		}
		public function login(){
			$this->loadView("AccountLoginView.php");
		}
		
		public function loginPost(){
			//goi ham model de kiem tra dang nhap
			$this->modelLogin();
		}
		public function personal(){
			$this->loadView("PersonalView.php");
		}
		//dang xuat
		public function logout(){
			unset($_SESSION["customer_email"]);
			header("location:index.php");
		}
		public function success(){
			$this->loadView("Success.php");
		}
		//xem danh sach cac don hang da mua		
		public function orders(){
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 25;
			//tinh so trang
			$numPage = ceil($this->modelTotal()/$recordPerPage);
			//goi ham de lay du lieu
			$listRecord = $this->modelRead($recordPerPage);
			//load view
			$this->loadView("OrdersView.php",["listRecord"=>$listRecord,"numPage"=>$numPage]);
		}
		//huy don hang
		public function removeOrders(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$this->modelRemoveOrders();
			header("location:index.php?controller=account&action=orders");
		}
		//chi tiet don hang
		public function detail(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham tu model de thuc hien
			$data = $this->modelListOrderDetails($id);
			//load view
			$this->loadView("OrderDetailView.php",["data"=>$data,"id"=>$id]);
		}
	}	
 ?>