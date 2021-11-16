<?php 
	trait RatingModel{
		public function getProductsOrder() {
			$customer_id = $_SESSION['customer_id'];
            $conn = Connection::getInstance();
			$query = $conn->prepare("SELECT * from products WHERE id in ( SELECT product_id FROM orders O INNER JOIN orderdetails OD 
			ON O.id = OD.order_id WHERE STATUS = 1 AND customer_id = :id)");
			$query->execute(array("id"=>$customer_id));
			//ham rowCount: dem so ket qua tra ve
			return $query->fetchAll();
		}
		public function modelProduct($id){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where id = $id");
			//tra ve mot ban ghi
			return $query->fetch();
		}
		public function modelRating($id){
			$customer_id = $_SESSION['customer_id'];
			$comment = $_POST['comment'];
			$star = $_POST['star'];
			$photo ="";
			if($_FILES["photo"]["name"] != ""){				
				$photo = time()."_".$_FILES["photo"]["name"];
				move_uploaded_file($_FILES["photo"]["tmp_name"],"./assets/upload/rating/$photo");
			}
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into rating set product_id=:_product_id,star=:_star,photo=:_photo,comment=:_comment,customer_id=:_customer_id");
			$query->execute([":_product_id"=>$id,":_customer_id"=>$customer_id,":_comment"=>$comment,":_star"=>$star,":_photo"=>$photo]);
		}
	}
 ?>