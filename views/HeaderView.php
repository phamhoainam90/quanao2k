    <input type="hidden" id="checkStoreId" value="39301">
        <div class="cart-fixscroll hidden">
            <a href="index.php?controller=cart">
                <img class="lazyload" data-sizes="auto" data-src="assets/frontend/images/cart.png" alt="cart icon" width="18"/>
                <?php 
                    $numberProduct = 0;
                    if(isset($_SESSION["cart"])){
                        foreach($_SESSION["cart"] as $product){
                            $numberProduct++;
                        }
                    }
                ?>
                <span class="number-count sl_giohang"><?php echo $numberProduct; ?></span>
            </a>
        </div>
        <div class="header">
            <div class="header-top tp_header clearfix hidden-xs hidden-sm">
                <div class="container">
                    <h1 class="logo">
                        <a href="#" class="brand">
                            <img class="lazyload" data-sizes="auto" data-src="assets/frontend/images/store_1548917977_950.png" alt="Home"/>
                        </a>
                    </h1>
                    <div class="user-cart hidden-xs hidden-sm">
                        <?php if(isset($_SESSION["customer_email"]) == false): ?>
                        <a href="index.php?controller=account&action=login">Đăng nhập</a>
                        <?php else: ?>
                          <a href="index.php?controller=account&action=personal"><?php echo $_SESSION["customer_name"]; ?></a>&nbsp; &nbsp;<a href="index.php?controller=account&action=logout">Đăng xuất</a>
                        <?php endif; ?>
                        <a href="index.php?controller=cart" class="cart-top">
                            Giỏ hàng<span class="cart-count sl_giohang"><?php echo $numberProduct; ?></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header-bottom clearfix hidden-xs hidden-sm">
                <div class="container">
                    <div class="menu-center">
                        <ul class="main-menu tp_menu clearfix">
                            <li class="">
                                <a class="tp_menu_item" href="index.php">Trang chủ</a>
                            </li>
                            <?php 
                              //load cap 1
                             $categories = $this->modelGetCategories();
                              ?>
                            <?php foreach($categories as $rows): ?>
                             <li class="has-child">
                                <a href="index.php?controller=products&action=categories&category_id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a>
                                 <ul class="child">
                                          <?php 
                                            //load cap 2
                                            $categoriesSub = $this->modelGetCategoriesSub($rows->id);
                                         ?>
                                         <?php foreach($categoriesSub as $rowsSub): ?>
                                        <li style="padding-left:20px;"><a href="index.php?controller=products&action=categories&category_id=<?php echo $rowsSub->id; ?>"><?php echo $rowsSub->name; ?></a></li>
                                          <?php endforeach; ?>
                                </ul>
                            </li>
                            <?php endforeach; ?>
                            <li class="">
                                <a class="tp_menu_item" href="index.php?controller=wishlist">Sản phẩm yêu thích</a>
                            </li>
                            <li class="">
                                <a class="tp_menu_item" href="index.php?controller=news">Tin tức</a>
                            </li>
                            <li class="">
                                <a class="tp_menu_item" href="index.php?controller=contact">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="search-pc pull-right">
                        <span>Tìm kiếm</span>
                        <div class="search-bar">
                            <div class="container">
                                    <div style="position: relative;">
                                        <label>Tìm kiếm:</label>
                                        <input type="text" name="searchkey" id="key" value="" placeholder="Nhập từ khóa tìm kiếm..."/>
                                        <input type="button" value="Tìm Kiếm"  onclick="location.href = 'index.php?controller=search&action=searchproduct&searchkey=' + document.getElementById('key').value;" class="search-btn"></input>
                                        <div class="smart-search">
                                          <ul>
                                          </ul>
                                        </div>
                                    </div>
                                    <style type="text/css">
                                    .smart-search img{width: 70px; margin-right: 5px;}
                                    .smart-search{position: absolute; width: 100%; z-index: 1; display: none; max-height: 350px; overflow: scroll;}
                                    .smart-search ul{padding:0px; margin:0px; list-style: none;}
                                    .smart-search ul li{background: white; border-bottom: 1px solid #dddddd;}
                                  </style>
                                  <script type="text/javascript">
                                    $(document).ready(function(){
                                      //khi go phim vao o textbox
                                      $("#key").keyup(function(){
                                        //lay gia tri vua nhap vao
                                        var strKey = $("#key").val();
                                        //ham trim() loai bo khoang trang
                                        strKey = strKey.trim();
                                        if(strKey != ""){
                                          //hien thi the html co class=smart-search
                                          $(".smart-search").attr("style","display:block");
                                          //---
                                          //ajax de lay du lieu
                                          $.ajax({
                                            url: "index.php?controller=products&action=ajax&key="+strKey,
                                            success: function( result ) {
                                              //clear tat ca cac the li
                                              $(".smart-search ul").empty();
                                              //them ket qua vua tim thay
                                              $(".smart-search ul").append(result);
                                            }
                                          });
                                          //---
                                        }else
                                          $(".smart-search").attr("style","display:none");
                                      });
                                    });
                                  </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="header-new tp_header visible-xs visible-sm">
                <div class="container clearfix ">
                    <div class="header-container clearfix">
                        <div class="clearfix">
                            <div class=" js-menu-mobile">
                                <div class="trigger-menu">
                                    <a href="#boxMenu" class="three-bars-icon"></a>
                                    <span class="text">menu</span>
                                </div>
                            </div>
                            <div class="logo">
                                <a href="#">
                                    <img alt="Home" src="images/store_1548917977_950.png">
                                </a>
                            </div>
                            <div class="login-icon">
                                <a href="#">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="menu-top clearfix">
                                <div class="search">
                                    <span class="ic-search"></span>
                                </div>
                            </div>
                            <div class="search-on-mobile">
                                <div class="inside">
                                    <form action="/search" method="get">
                                        <input value="" name="q" id="input-search-mobile" type="text" placeholder="Tìm kiếm...">
                                        <a href="#!" class="close-search-mobile">Đóng search</a>
                                    </form>
                                </div>
                            </div>
                            <div class="cart-top">
                                <a href="index.php?controller=cart">
                                    <img src="images/cart.png" width="18">
                                    <span class="number-count"><?php echo $numberProduct; ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>