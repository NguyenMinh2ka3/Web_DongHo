<?php require_once('header.php'); ?>
<style>
    .tbchitiet{
        text-align: center;
        height: 300px;
    }
</style>
<?php if(!isset($_SESSION['customer'])): ?>
                    <p class="tbchitiet">
                        <a href="login.php" class="btn btn-md btn-danger"><?php echo "Vui lòng đăng nhập !"; ?></a>
                    </p>
                <?php else: ?>
<?php
if(!isset($_REQUEST['id'])) {
    header('location: index.php');
    exit;
} else {
    //Kiểm tra id có hợp lệ hay không
    $statement = $pdo->prepare("SELECT * FROM sanpham WHERE sp_id=?");
    $statement->execute(array($_REQUEST['id']));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if( $total == 0 ) {
        header('location: index.php');
        exit;
    }
}

foreach($result as $row) {
    $p_name = $row['sp_ten'];
    $p_old_price = $row['sp_giacu'];
    $p_current_price = $row['sp_giamoi'];
    $p_qty = $row['sp_tonkho'];
    $p_featured_photo = $row['sp_img'];
    $p_short_description = $row['sp_chitietsp'];
    
}



if(isset($_POST['form_add_to_cart'])) {

	// Lấy số lượng tồn kho
	$statement = $pdo->prepare("SELECT * FROM sanpham WHERE sp_id=?");
	$statement->execute(array($_REQUEST['id']));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) {
		$current_p_qty = $row['sp_tonkho'];
	}
	if($_POST['sptonkho'] > $current_p_qty):
		$thongbao= "Xin lỗi mặt hàng này chỉ còn $current_p_qty sản phẩm! Vui lòng nhập lại số lượng!";
	endif;
}
?>
<script type="text/javascript">alert('<?php echo $thongbao; ?>');</script>
<div class="page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product">
					<div class="row">
						<div class="col-md-5">
							<div class="prod-slider">
								<img src="assets/uploads/<?php echo $p_featured_photo; ?>"></img>
							</div>
							<div id="prod-pager">
								<a data-slide-index="0" href=""><div class="prod-pager-thumb" style="background-image: url(assets/uploads/<?php echo $p_featured_photo; ?>)"></div></a>
							</div>
						</div>
						<div class="col-md-7">
							<div class="p-title"><h2><?php echo $p_name; ?></h2></div>
							<div class="p-short-des">
								<p>
									<?php echo $p_short_description; ?>
								</p>
							</div>
                            <form action="" method="post">
							<div class="p-price">
                                <span style="font-size:14px;">Giá sản phẩm</span><br>
                                <span>
                                    <?php if($p_old_price!=''): ?>
                                        <del><?php echo $p_old_price; ?></del>
                                    <?php endif; ?> 
                                    <?php echo $p_current_price; ?>
                                </span>
                            </div>
                            <input type="hidden" name="p_current_price" value="<?php echo $p_current_price; ?>">
                            <input type="hidden" name="p_name" value="<?php echo $p_name; ?>">
                            <input type="hidden" name="p_featured_photo" value="<?php echo $p_featured_photo; ?>">
							<div class="p-quantity">
                                Số lượng<br>
								<input type="number" class="input-text qty" step="1" min="1" max="" name="sptonkho" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric">
							</div>
							<div class="btn-cart btn-cart1">
                                <input type="submit" value="Thêm vào giỏ hàng" name="form_add_to_cart">
							</div>
                            </form>
							<div class="share">
                                Chia sẻ sản phẩm<br>
								<div class="sharethis-inline-share-buttons"></div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php require_once('footer.php'); ?>