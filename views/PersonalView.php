<!-- load file layout chung -->
<?php 
  //load LayoutTrangChu.php
  $this->layoutPath = "LayoutTrangTrong.php";
 ?>
<main class="main-content" role="main">
		<div id="collection">
			<section class="signup_page" style="margin-top: 20px; margin-bottom: 20px;">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div id="parent" class="row">
								<div id="a" class="col-xs-12 col-sm-12 col-lg-9">
									<div class="page-title m992"><h1 class="title-head" style="font-size: 18px; font-weight: bold; padding-bottom: 7px; text-transform: uppercase">Thông tin tài khoản</h1>
									</div>
									<?php 
										$customer = $this->modelGetCustomers($_SESSION["customer_id"] );
									?>
									<div class="form-signup m992"><p><strong>Xin chào <b style="color: #dc3333;"><?php echo $customer->name; ?></b>&nbsp;!</strong></p>
									</div>
									<div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
										<div class="my-account">
											<div class="dashboard">
												<div class="recent-orders">
													<div class="table-responsive "style="overflow-x:auto;"><table class="table table-cart" id="my-orders-table">
														<thead class="thead-default">
															<tr>
																<th>Tên tài khoản</th>
																<th>Địa chỉ</th>
																<th>Email</th>
																<th>Điện thoại</th>
															</tr>
														</thead>
														<tbody>
															<tr class="first odd">
																<td><?php echo $customer->name; ?></td>
																<td><?php echo $customer->address; ?></td>
																<td><?php echo $customer->email; ?></td>
																<td><?php echo $customer->phone; ?></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="b" class="col-xs-12 col-sm-12 col-lg-3">
								<div class="page-title mx991">
									<h1 class="title-head">Tài khoản</h1>
								</div>
								<div class="block-account" style="padding-top: 10px;">
									<div class="block-content form-signup">
										<p><a href="javascript:" class="text-primary" style="cursor: not-allowed;">Thông tin tài khoản</a></p>
										<p><a href="index.php?controller=account&action=orders" style="color: #000;">Quản lý đơn hàng</a></p>
										<p><a href="index.php?controller=rating" style="color: #000;">Đánh giá sản phẩm</a></p>
										<p><a href="index.php?controller=account&action=logout" style="color: #000;">Đăng xuất</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</main>