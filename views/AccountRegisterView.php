<?php 
  //load LayoutTrangTrong.php
$this->layoutPath = "LayoutTrangTrong.php";
?>
<div class="template-customer">
    <div id="layout-page" class="bgfafafa">
        <div class="container">
        <div id="customer-login">
            <div style="text-align: center;">
                <h1>Tạo tài khoản</h1>
                <?php if(isset($_GET["notify"])&&$_GET["notify"]=="exists"): ?>
                  <p style="color:red;">Email đã tồn tại!</p>
              <?php else: ?>
                  <p> Nếu bạn chưa có tài khoản, hãy đăng ký ngay để nhận thông tin ưu đãi cùng những ưu đãi từ cửa hàng.</p>
              <?php endif; ?>
          </div>
          <div class="large_form">
            <form method='post' action="index.php?controller=account&action=registerPost" class="f" autocomplete="off">
                <ul>
                    <li>
                        <input name="name" type="text" class="tb&#x20;validate&#x5B;required&#x5D;" id="fullName" placeholder="H&#x1ECD;&#x20;v&#xE0;&#x20;t&#xEA;n" value="">
                    </li>
                    <li>
                        <input name="email" type="text" class="tb&#x20;validate&#x5B;required,custom&#x5B;email&#x5D;&#x5D;" id="email" placeholder="Email" value="">
                    </li>
                    <li>
                        <input name="address" type="text" class="tb&#x20;validate&#x5B;required,custom&#x5B;email&#x5D;&#x5D;" id="address" placeholder="Địa chỉ" value="">
                    </li>
                    <li>
                        <input name="phone" type="text" class="tb&#x20;validate&#x5B;required,custom&#x5B;phone&#x5D;&#x5D;" id="mobile" placeholder="&#x0110;i&#x1EC7;n&#x20;tho&#x1EA1;i" value="">
                    </li>
                    <li>
                        <input name="password" type="password" class="tb&#x20;validate&#x5B;required,minSize&#x5B;6&#x5D;&#x5D;" id="password" placeholder="M&#x1EAD;t&#x20;kh&#x1EA9;u" value="">
                    </li>
                    <li class="btns">
                        <input name="submit" type="submit" id="btnSubmit" class="htmlBtn&#x20;first" value="&#x0110;&#x0103;ng&#x20;k&#xFD;">
                    </li>
                    <input type="hidden" name="csrf" value="097a69d8251415f05e08198efa1bc4b3-3be77a01870f86d9a2013c5e23a369e6">
                </ul>
            </form>
        </div>
    </div>
        </div>
    </div>
</div>