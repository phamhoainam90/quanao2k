<?php 
	//load file model
	include "models/RatingModel.php";
	class RatingController extends Controller{
		//ke thua class ProductsModel
		use RatingModel;
		//danh gia so sao
		public function index()
		{
			$ProductsOrder = $this->getProductsOrder();
			$this->loadView("Rating\ListProductRatingView.php", ["ProductsOrder"=>$ProductsOrder]);
		}
		public function ratingProduct()
		{
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$product = $this->modelProduct($id);
			$this->loadView("Rating\RatingView.php", ["product"=>$product]);
		}
		public function rating()
		{
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$data = $this->modelRating($id);
			header("location:index.php?controller=rating");
		}
	}
 ?>