<?php 
	class HomeController extends Controller{
		//hàm tạo - check login
		public function __construct(){
			$this->authentication();
		}
		public function index(){
			//load view
			$this->loadView("HomeView.php");
		}
	}
