<?php require_once('header.php'); ?>

<?php
    //Kiểm tra id có hợp lệ hay không
    $statement = $pdo->prepare("SELECT * FROM sanpham WHERE sp_id=?");
    $statement->execute(array($_REQUEST['id']));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if( $total == 0 ) {
        header('location: index.php');
        exit;
    }


foreach($result as $row) {
    $p_name = $row['sp_ten'];
    $p_old_price = $row['sp_giacu'];
    $p_current_price = $row['sp_giamoi'];
    $p_qty = $row['sp_tonkho'];
    $p_featured_photo = $row['sp_img'];
    $p_short_description = $row['sp_chitietsp'];
    
}



if(isset($_POST['form_them_giohang'])) {

	// Lấy số lượng tồn kho
	$statement = $pdo->prepare("SELECT * FROM sanpham WHERE sp_id=?");
	$statement->execute(array($_REQUEST['id']));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) {
		$current_p_qty = $row['sp_tonkho'];
	}
	if($_POST['soluong'] > $current_p_qty):
		 $thongbao= "Xin lỗi mặt hàng này chỉ còn $current_p_qty sản phẩm! Vui lòng nhập lại số lượng!";
    else:
        if (isset($_SESSION['giohang_id'])) {
            $arr_cart_p_id = array();
            $arr_cart_p_qty = array();
            $arr_cart_p_current_price = array();   
            $i=0;
            foreach($_SESSION['giohang_id'] as $key => $value) 
            {
                $i++;
                $arr_cart_p_id[$i] = $value;
            }
    
            $added = 0;
            for($i=1;$i<=count($arr_cart_p_id);$i++) {
                if( ($arr_cart_p_id[$i]==$_REQUEST['id'])) {
                    $added = 1;
                    break;
                }
            }
            if($added == 1) {
               $error_message1 = 'Sản phẩm này đã được thêm vào giỏ hàng.';
            } else {
    
                $i=0;
                foreach($_SESSION['giohang_id'] as $key => $res) 
                {
                    $i++;
                }
                $new_key = $i+1;

                $_SESSION['giohang_id'][$new_key] = $_POST['id'];
                $_SESSION['giohang_soluong'][$new_key] = $_POST['soluong'];
                $_SESSION['giohang_giamoi'][$new_key] = $_POST['giamoi'];
                $_SESSION['giohang_ten'][$new_key] = $_POST['tensp'];
                $_SESSION['giohang_img'][$new_key] = $_POST['anhsp'];
    
                $success_message1 = 'Thêm vào giỏ hàng thành công!';
            }
            
        } 
        
        else
    {       
        $_SESSION['giohang_id'][1] = $_POST['id'];
        $_SESSION['giohang_soluong'][1] = $_POST['soluong'];
        $_SESSION['giohang_giamoi'][1] = $_POST['giamoi'];
        $_SESSION['giohang_ten'][1] = $_POST['tensp'];
        $_SESSION['giohang_img'][1] = $_POST['anhsp'];

        $success_message1 = 'Thêm vào giỏ hàng thành công!';
    }       
    endif;
    }
?>
<?php
if($error_message1 != '') {
    echo "<script>alert('".$error_message1."')</script>";
}
if($success_message1 != '') {
    echo "<script>alert('".$success_message1."')</script>";
    header('location: product.php?id='.$_REQUEST['id']);
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
                                        <del><?php echo "$";?><?php echo $p_old_price; ?></del>
                                    <?php endif; ?> 
                                    <?php echo "$";?><?php echo $p_current_price; ?>
                                </span>
                            </div>
                            <input type="hidden" name="giamoi" value="<?php echo $p_current_price; ?>">
                            <input type="hidden" name="tensp" value="<?php echo $p_name; ?>">
                            <input type="hidden" name="anhsp" value="<?php echo $p_featured_photo; ?>">
							<div class="p-quantity">
                                Số lượng<br>
								<input type="number" class="input-text qty" step="1" min="1" max="" name="soluong" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric">
							</div>
							<div class="btn-cart btn-cart1">
                                <input type="submit" value="Thêm vào giỏ hàng" name="form_them_giohang">
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

<?php require_once('footer.php'); ?>