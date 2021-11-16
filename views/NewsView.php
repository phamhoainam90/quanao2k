<?php 
  //load LayoutTrangChu.php
$this->layoutPath = "LayoutTrangTrong.php";
?>
<div class="page pb30">
    <div class="container">
        <div class="stores row">
            <div class="main-title2 text-center">
                <h1>Tin tức</h1>
            </div>
            <div class="stores-list clearfix">
                <?php foreach($data as $rows): ?>
                    <div class="stores-item">
                        <a href="index.php?controller=news&action=detail&id=<?php echo $rows->id; ?>" title="<?php echo $rows->name; ?>">
                          <img src="assets/upload/news/<?php echo $rows->photo; ?>" alt="<?php echo $rows->name; ?>" style="width:100%;" title="<?php echo $rows->name; ?>" class="lazyload">
                          <div class="stores-info">
                            <p class="title"><a href="index.php?controller=news&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="paginate text-center">
            <div id="pagination">
                <div class="paginator">
                    <span ><a rel="nofollow" class="paging-first" href="index.php?controller=news&page=1"></a>
                        <?php for($i = 1; $i <= $numPage; $i++): ?>
                           <a class="currentPage" href="index.php?controller=news&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                       <?php endfor; ?> 
                       <a rel="nofollow" class="paging-last" href="index.php?controller=news&page=<?php echo $numPage ?>"></a></span>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>