<?php 
  //load LayoutTrangChu.php
$this->layoutPath = "LayoutTrangTrong.php";
?>
<div class="container">
    <div class="row">
        <br>
        <form id="frm-aer-review" method="post" action="index.php?controller=rating&action=rating&id=<?php echo $product->id; ?>" enctype="multipart/form-data">
            <input onclick="history.go(-1);" type="button" value="Back" class="btn btn-secondary">
            <h3 class="aer-title">Đánh giá, bình luận về <strong>"<?php echo $product->name; ?>"</strong></h3>
            <div class="aer-rate">
                <input name="star" id="aer-star" type="hidden" value="1">
                <input name="parent" class="parent" type="hidden" value="">
                <label>Chọn đánh giá của bạn</label><br>
                <div class="stars">
                    <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                    <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                    <label class="star star-1" for="star-1"></label>
                </div>
            </div>
            <div class="row aer-detail-review">
                <div class="col-lg-12">
                    <label for="form-control txt-comment">Nhập đánh giá về sản phẩm(*):</label>
                    <textarea style="width: 100%; height: 150px; margin-bottom: 10px;" placeholder="" name="comment"
                        class="form-control aer-input aer-content" id="txt-comment"></textarea>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div>
                        <label>Thêm hình sản phẩm nếu có :
                            <p><img id="output" width="200" /></p>
                            <input type="file" id="aer-files" class="btn btn-outline-primary" name="photo" onchange="loadFile(event)"
                                accept="image/png, image/jpeg">
                            <script>
                            var loadFile = function(event) {
                                var image = document.getElementById('output');
                                image.src = URL.createObjectURL(event.target.files[0]);
                            };
                            </script>
                        </label>
                    </div>
                    <div id="list-image-upload"></div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <button class="btn btn-danger" id="btn-send">Gửi đánh giá</button>
                </div>
            </div>
        </form>
    </div>
</div>
<style type="text/css">
.stars {
    float: left;
}

input.star {
    display: none;
}

label.star {
    float: right;
    padding: 10px;
    font-size: 36px;
    color: #444;
    transition: all .2s;
}

input.star:checked~label.star:before {
    content: '\f005';
    color: #FD4;
    transition: all .25s;
}

input.star-5:checked~label.star:before {
    color: #FE7;
    text-shadow: 0 0 5px #952;
}

input.star-1:checked~label.star:before {
    color: #F62;
}

label.star:hover {
    transform: rotate(-10deg) scale(1.3);
}

label.star:before {
    content: '\f006';
    font-family: FontAwesome;
}
</style>