<?php require_once('header.php'); ?>
<div class="page">
    <div class="container">
        <div class="row">            
            <div class="col-md-12">
                <p>
                    <h3 style="margin-top:20px;">Đơn hàng của bạn đã được đặt thành công. Mã đơn hàng của bạn là: <?php echo $_GET['order_id']; ?></h3>
                    <h1>Bạn sẽ sớm nhận được xác nhận qua email.</h1>
                    <a href="index.php" class="btn btn-primary">Tiếp tục mua sắm</a>
                </p>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>
