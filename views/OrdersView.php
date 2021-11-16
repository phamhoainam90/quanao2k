<!-- load file layout chung -->
<?php 
  //load LayoutTrangChu.php
  $this->layoutPath = "LayoutTrangTrong.php";
 ?>
<div class="col-md-12"> 
<input onclick="history.go(-1);" type="button" value="Back" class="btn btn-secondary" style="margin-top:10px;">
    <h1 class="title-head" style="font-size: 18px; font-weight: bold; text-transform: uppercase;">Đơn Hàng</h1>   
    <div class="panel panel-warning">
        <div class="panel-heading">List Orders</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Date</th>                  
                    <th style="width:150px; text-align: center;">Status</th>
                    <th style="width:150px;">Delivery</th>
                </tr>
                <?php foreach($listRecord as $rows): ?>
                <?php   
                    //lay ban ghi customer
                    $customer = $this->modelGetCustomers($rows->customer_id);
                 ?>
                 <?php if($customer->id == $_SESSION["customer_id"]): ?>
                 <tr>
                     <td><?php echo $customer->name; ?></td>
                     <td><?php echo $customer->phone; ?></td>
                     <td>
                        <?php 
                        $date = Date_create($rows->create_at);
                        echo Date_format($date, "d/m/Y");
                        ?>                            
                        </td>
                     <td style="text-align: center;">
                         <?php if($rows->status == 1): ?>
                            <span class="label label-primary">Đã giao hàng</span>
                          <?php elseif($rows->status == 3): ?>
                            <span class="label label-danger">Đã hủy</span>
                         <?php else: ?>
                            <span class="label label-warning">Chưa giao hàng</span>
                          <?php endif; ?>
                     </td>
                     <td style="text-align: center;">
                        <a href="index.php?controller=account&action=detail&id=<?php echo $rows->id; ?>" class="label label-success">Chi tiết</a>
                        <?php if($rows->status != 1&&$rows->status != 3): ?>
                        <a href="index.php?controller=account&action=removeOrders&id=<?php echo $rows->id; ?>" class="label label-success">Hủy đơn hàng</a>
                      <?php endif; ?>
                     </td>
                 </tr>
             <?php endif; ?>
                <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
        </div>
    </div>
</div>