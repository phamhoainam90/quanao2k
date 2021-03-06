<?php 
  //load LayoutTrangChu.php
$this->layoutPath = "LayoutTrangTrong.php";
?>
<div class="container">
    <div class="row clearfix">
        <div class="product-left">
            <div id="surround">
                <div class="blockImage">
                    <img class="product-image-feature"
                        data-zoom-image="assets/upload/products/<?php echo $record->photo; ?>"
                        src="assets/upload/products/<?php echo $record->photo; ?>" alt="<?php echo $record->name; ?>">
                </div>
                <div class="thumb-mt20 visible-xs visible-sm">
                    <div id="sliderproduct" class="owl-carousel owl-theme">
                        <div class="item">
                            <img alt="<?php echo $record->name; ?>"
                                src="assets/upload/products/<?php echo $record->photo; ?>"
                                data-image="assets/upload/products/<?php echo $record->photo; ?>">
                        </div>
                        <div class="item">
                            <img alt="<?php echo $record->name; ?>"
                                src="assets/upload/products/<?php echo $record->photo; ?>"
                                data-image="assets/upload/products/<?php echo $record->photo; ?>">
                        </div>
                    </div>
                </div>
                <div id="sliderproduct-pc" class="hidden-xs hidden-sm" style="display:none;">
                    <ul class="slides">
                        <li class="product-thumb">
                            <a href="javascript:" data-image="assets/upload/products/<?php echo $record->photo; ?>"
                                data-zoom-image="assets/upload/products/<?php echo $record->photo; ?>">
                                <img alt="<?php echo $record->name; ?>"
                                    data-image="assets/upload/products/<?php echo $record->photo; ?>"
                                    src="assets/upload/products/<?php echo $record->photo; ?>">
                            </a>
                        </li>
                        <li class="product-thumb">
                            <a href="javascript:" data-image="assets/upload/products/<?php echo $record->photo; ?>"
                                data-zoom-image="assets/upload/products/<?php echo $record->photo; ?>">
                                <img alt="<?php echo $record->name; ?>"
                                    data-image="assets/upload/products/<?php echo $record->photo; ?>"
                                    src="assets/upload/products/<?php echo $record->photo; ?>">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product-right" style="margin-top: 0px !important;">
            <h3 class="tp_product_detail_name"><?php echo $record->name; ?></h3>
            <h6>Category:&nbsp; <span> <?php echo $this->getCategory($record->category_id); ?> </h6>
            <h6>M?? sp: 610</h6>
            <div class="product-price" id="price-preview2">
                <span class="tp_product_detail_price" style="text-decoration:line-through;">
                    <?php echo number_format($record->price); ?>??? </span>
                <p><span class="tp_product_detail_price">
                        <?php echo number_format($record->price-($record->price*$record->discount)/100); ?>??? </span></p>
            </div>
            <div id="add-item-form" class="variants clearfix">
                <div class="action_btn">
                    <form action="index.php?controller=cart&action=create&id=<?php echo $record->id; ?>" method="post">
                        <div class="select-wrapper number-wrapper">
                            <label>S??? l?????ng</label>
                                <input type="number" id="pview-qtt" value="1" min="1" max="5000" class="text-center">
                        </div>
                        
                        <a href="index.php?controller=cart&action=create&id=<?php echo $record->id; ?>" class="nutAdd"><button type="submit" id="AddToCart" class="btnBuyNow " data-psid="12074411"
                            data-selId="12074411" title="" data-ck="1"
                            onclick="alert('Th??m v??o gi??? h??ng th??nh c??ng')">Th??m v??o gi???</button></a>
                    </form>
                    <a href="index.php?controller=cart&action=pay"><button id="buyNow" class="btnBuyNow "
                            data-psid="12074411" data-selId="12074411" title="" data-ck="1">Mua ngay</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="policy clearfix">
            <div class="policy-item">
                <h4>Th??ng tin s???n ph???m</h4>
                <div class="content"></div>
            </div>
            <div class="policy-item">
                <h4>??u ????i member vip</h4>
                <div class="content">
                    Vui l??ng ????ng k?? t??i kho???n mua h??ng ????? ???????c t??ch ??i???m l??m Member Vip:<br />
                    - T??i kho???n Sliver ???????c gi???m 5% khi t??ch ????? 5tr<br />
                    - T??i kho???n Gold ???????c gi???m 10% khi t??ch ????? 10tr<br />
                    - T??i kho???n Diamond ???????c gi???m 15% khi t??ch ????? 20tr<br />
                </div>
            </div>
            <div class="policy-item">
                <h4>Ch??nh S??ch ?????i Tr??? H??ng</h4>
                <div class="content">
                    - ???????c ki???m tra h??ng tr?????c khi nh???n h??ng<br />
                    - ?????i/ Tr??? trong v??ng 7 ng??y k??? t??? khi nh???n h??ng<br />
                    - Mi???n ph?? ?????i tr??? n???u l???i sai s??t<br />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="ae-cover-review">
            <h3>KH??CH H??NG NH???N X??T</h3>
            <div id="aereview-summary" class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">

                    <div>????nh gi?? trung b??nh</div>
                    <div id="abs-rating"><?php echo $avgRating; ?> / 5</div>
                    <!-- <div id="abs-star">4.6 / 5</div>-->
                    <div id="aetotal-rating">(<?php echo $starTotal; ?> ????nh gi??)</div>

                </div>
                <div class="col-lg-5 col-md-5 col-sm-12" id="progress-star">
                    <table class="rating" style="width: 100%; border:0px; text-align:left;">
                        <tr>
                            <td style="width: 80%; padding-left: 10px;"><i class="fa fa-star" aria-hidden="true"></i>
                            </td>
                            <td><span class="label label-primary"><?php echo $this->getStar($record->id,1); ?>
                                    vote</span></td>
                        </tr>
                        <tr>
                            <td style="width: 80%; padding-left: 10px; "><i class="fa fa-star" aria-hidden="true"></i><i
                                    class="fa fa-star" aria-hidden="true"></i></td>
                            <td><span class="label label-warning"><?php echo $this->getStar($record->id,2); ?>
                                    vote</span></td>
                        </tr>
                        <tr>
                            <td style="width: 80%; padding-left: 10px; "><i class="fa fa-star" aria-hidden="true"></i><i
                                    class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star"
                                    aria-hidden="true"></i></td>
                            <td><span class="label label-danger"><?php echo $this->getStar($record->id,3); ?>
                                    vote</span></td>
                        </tr>
                        <tr>
                            <td style="width: 80%; padding-left: 10px; "><i class="fa fa-star" aria-hidden="true"></i><i
                                    class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star"
                                    aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></td>
                            <td><span class="label label-info"><?php echo $this->getStar($record->id,4); ?>
                                    vote</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 80%; padding-left: 10px; "><i class="fa fa-star" aria-hidden="true"></i><i
                                    class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star"
                                    aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i
                                    class="fa fa-star" aria-hidden="true"></i></td>
                            <td><span class="label label-success"><?php echo $this->getStar($record->id,5); ?>
                                    vote</span></td>
                        </tr>
                    </table>
                    <br>
                </div>
            </div>
            <!-- <div id="filter-review" class="">
                <label><small>Ch???n xem ????nh gi??</small></label>
                <select id="ddr-image">
                    <option value="">T???t c???</option>
                    <option value="1">C?? ???nh</option>
                    <option value="2">Kh??ng c?? ???nh</option>
                </select>
                <select id="ddr-star">
                    <option value="">T???t c??? ???</option>
                    <option value="5">C?? 5 ???</option>
                    <option value="4">C?? 4 ???</option>
                    <option value="3">C?? 3 ???</option>
                    <option value="2">C?? 2 ???</option>
                    <option value="1">C?? 1 ???</option>
                </select>
            </div> -->
            <div id="list-review">
                <!--New comment-->
                <?php foreach($comment as $cmt): ?>
                <div class="aer-block-review aer-parent" data-id="18306">
                    <?php
                        $customer = $this->modelGetCustomers($cmt->customer_id);
                    ?>
                    <div class="aer-author">
                        <abbr class="avatar">
                            <?php
                                $name = $customer->name;
                                $words = explode(" ", $name);
                                $lastWord = array_pop($words);
                                echo substr($lastWord,0,1);
                            ?>
                        </abbr>
                        <strong class="aer-name"><?php echo $customer->name; ?></strong>
                    </div>
                    <div class="aer-detail-review">
                        <span class="aer-star-rate">
                            <?php $a = $cmt->star; ?>
                            <?php for($i = 0; $i<$a; $i++): ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            <?php endfor; ?>
                        </span>
                        <p class="aer-content-review"><?php echo $cmt->comment; ?></p>
                        <p class="aer-content-review"><img style="width:100px;"
                                src="assets/upload/rating/<?php echo $cmt->photo; ?>" alt=""></p>
                    </div>
                    <div class="list-image">
                    </div>
                    <div class="aer-ulti">
                        <span class="aer-btn-reply">Tr??? l???i</span>&nbsp;???&nbsp;
                        <span><i><?php  $date = Date_create($cmt->create_at); echo Date_format($date, "d/m/Y");?></i></span>
                    </div>
                </div>
                <hr>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div id="product-related" class="tp_product_detail_suggest">
    <div class="container">
        <div class="row">
            <div class="title-like text-center">
                <h4>C?? th??? b???n th??ch</h4>
            </div>
            <div id="owl-product-related" class="owl-carousel owl-theme">
                <?php foreach($dataFavoriteProduct as $products): ?>
                <div class="product-item">
                    <div class="img">
                        <a href="index.php?controller=products&action=detail&id=<?php echo $products->id; ?>">
                            <img class="lazyload" data-sizes="auto" src="assets/frontend/images/lazyLoading.gif"
                                data-src="assets/upload/products/<?php echo $products->photo; ?>"
                                alt="<?php echo $products->name; ?>">
                        </a>
                    </div>
                    <div class="info">
                        <h3>
                            <a class="tp_product_name" href="#"><?php echo $products->name; ?></a>
                        </h3>
                        <div class="prices">
                            <strong class="tp_product_price"><?php echo number_format($products->price); ?>???</strong>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</div>
</form>
<style type="text/css">
.fa fa-star {
    color: yellow;
}
</style>
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src =
        'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

$(document).ready(function(){
        $('.nutAdd').click(function(e){
            e.preventDefault();
            var $link = $(this).attr('href');
            var $sl = $('#pview-qtt').val();
            $.ajax({
                url: $link,
                type: 'post',
                dataType: 'html',
                data: {
                    sl : $sl
                }
            })

        });
    });
</script>