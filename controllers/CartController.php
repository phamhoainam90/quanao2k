<?php 
	include "models/CartModel.php";
	require "phpmailer/Exception.php";
	require "phpmailer/PHPMailer.php";
	require "phpmailer/SMTP.php";

	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\PHPMailer;
	class CartController extends Controller{
		//ke thua class CartModel
		use CartModel;
		//ham tao
		public function __construct(){
			//neu gio hang chua ton tai thi khoi tao no
			if(isset($_SESSION["cart"]) == false)
				$_SESSION["cart"] = array();
		}
		//them san pham vao gio hang
		public function create(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//$url = $_POST['url'];
			//goi ham cartAdd de them san pham vao gio hang
			$this->cartAdd($id);
			//header("location:" . $url);
		}
		//hien thi gio hang
		public function index(){
			$this->loadView("CartView.php");
		}
		//xoa san pham khoi gio hang
		public function delete(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham cartDelete de them san pham vao gio hang
			$this->cartDelete($id);
			//quay tro lai trang gio hang
			header("location:index.php?controller=cart");
		}
		//xoa toan bo gio hang
		public function destroy(){
			//goi ham cartDestroy de xoa gio hang
			$this->cartDestroy();
			//quay tro lai trang gio hang
			header("location:index.php?controller=cart");
		}
		//cap nhat nhieu san pham
		public function update(){
			//duyet cac phan tu trong session array
			foreach($_SESSION["cart"] as $product){
				$id = $product["id"];
				$quantity = $_POST["product_$id"];
				//goi ham cartUpdate de update lai so luong
				$this->cartUpdate($id,$quantity);
			}
			//quay tro lai trang gio hang
			// header("location:index.php?controller=cart");
		}
		//thanh toan gio hang
		public function checkout(){
			//kiem tra neu user chua dang nhap thi di chuyen den trang dang nhap
			if(isset($_SESSION["customer_email"]) == false)
				header("location:index.php?controller=account&action=login");
				//goi ham cartCheckOut de thanh toan gio hang
			else{
				header("location:index.php?controller=cart&action=pay");}
		}
		public function pay(){
			$this->loadView("PayView.php");
		}
		public function checkpay(){
			$sp = '';
			foreach($_SESSION['cart'] as $key=>$value){
				$sp = $sp .'<tr><td align="left" style="padding:8px 10px" valign="top">
				<p style="margin-bottom:0.5rem">'.$value["name"].'</p>
				</td>
				<td align="center" style="padding:8px 10px" valign="top"><span>'.number_format($value['price']).'₫</span></td>
				<td align="center" style="padding:8px 10px" valign="top">'.$value["number"].'</td>
				<td align="center" style="padding:8px 10px" valign="top">'.number_format($value['price'])*$value["number"].'</td></tr>';
			}
			//php mailer
			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->CharSet = "utf-8";
			$mail->Host     = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'adquanao2k@gmail.com';
			$mail->Password = 'lpqcepxdaositfhg';
			$mail->SMTPSecure = 'ssl';
			$mail->Port     = 465;
			$mail->setFrom('hoainam@fedu.vn', 'Shop QuanAo2k');
			$mail->addAddress($_SESSION['customer_email']);
			$mail->Subject = "ĐẶT HÀNG THÀNH CÔNG";
			$mail->isHTML(true);
			$mailContent = '<div style="background-color:#f2f2f2;width:100%!important">
			<div class="adM"></div>
			<div style="width:600px;margin:15px auto;padding:15px">
				<div class="adM">
					<div style="overflow:hidden;background:#fff;padding:10px">
						<h1 style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:15px 0 0">Cảm ơn quý
							khách đã đặt hàng tại Shop QuanAo2k!</h1>
						<p
							style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:1rem;color:#444;line-height:1.5rem;font-weight:normal">
							Đơn hàng đã được tiếp nhận và đang trong quá trình xử lý.</p>
						<table style="border:0;margin-top:20px;width:100%">
							<thead>
								<tr>
									<th align="left"
										style="padding:10px 10px 0 0;font-family:Arial,Helvetica,sans-serif;font-size:1rem;color:#444;font-weight:bold"
										width="50%">Thông tin thanh toán</th>
									<th align="left"
										style="padding:10px 10px 0;font-family:Arial,Helvetica,sans-serif;font-size:1rem;color:#444;font-weight:bold"
										width="50%"> Địa chỉ giao hàng </th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="padding:5px 10px 10px 0;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:1rem;color:#444;line-height:1.5rem;font-weight:normal"
										valign="top"><span style="text-transform:capitalize">
											Họ tên: '. $_POST['customerName']. '</span><br>
										SĐT giao hàng : '.$_POST['customerMobile'].'
									</td>
									<td style="padding:5px 10px 10px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:1rem;color:#444;line-height:1.5rem;font-weight:normal"
										valign="top">'.$_POST['customerAddress'].'</td>
								</tr>
								<tr>
									<td colspan="2"
										style="border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:1rem;color:#444"
										valign="top">
										<p
											style="font-family:Arial,Helvetica,sans-serif;font-size:1rem;color:#444;line-height:1.5rem;font-weight:normal">
											<strong>Phương thức thanh toán: </strong>'.$_POST['pay']. '<br>
										</p>
									</td>
								</tr>
							</tbody>
						</table>
						<table style="border:0;background:#f5f5f5;width:100%">
							<thead>
								<tr>
									<th align="left" bgcolor="#02acea"
										style="padding:10px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:1rem;line-height:14px;background-color:#02acea">
										Sản phẩm</th>
									<th align="left" bgcolor="#02acea"
										style="padding:10px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:1rem;line-height:14px;text-align:center;background-color:#02acea">
										Đơn giá</th>
									<th align="left" bgcolor="#02acea"
										style="padding:10px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:1rem;line-height:14px;text-align:center;background-color:#02acea">
										SL</th>
									<th align="left" bgcolor="#02acea"
										style="padding:10px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:1rem;line-height:14px;text-align:right;background-color:#02acea">
										Thành tiền</th>
								</tr>
							</thead>
							<tbody
								style="background-color:#eee;font-family:Arial,Helvetica,sans-serif;font-size:1rem;color:#444;line-height:1.5rem">
								'.$sp.'
							</tbody>
							<tfoot style="font-family:Arial,Helvetica,sans-serif;font-size:1rem;color:#444;line-height:1.5rem">
								<tr bgcolor="#eee">
									<td align="right" colspan="3" style="padding:8px 10px"><strong style="font-size:15px">Tổng
											giá trị đơn hàng</strong></td>
									<td align="right" style="padding:8px 10px"><strong
											style="font-size:16px">'.number_format($this->cartTotal()).'₫</strong></td>
								</tr>
							</tfoot>
						</table>
						<a style="font-size:14px;"
							href="http://localhost/PHP/QuanAo2k/index.php?controller=account&action=orders">Quý khách click vào
							đường link này để theo dõi đơn hàng</a>
						<br>
						<h3 style="text-align:center;">Quý khách hàng cũng có thể theo dõi đơn hàng bằng cách đăng nhập và theo
							dõi
							đơn hàng trên website của chúng tôi.</h3>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>';
			$mail->Body = $mailContent;
			$mail->send();
			//end php mailer
			$this->cartCheckOut();
			header("location:index.php?controller=account&action=success");
		}
	}
 ?>