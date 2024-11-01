<?php require_once('header.php'); ?>
<?php
$error_message = '';
$success_message = '';

if (isset($_POST['form1'])) {
    $product_ids = implode(',', array_map('intval', $_POST['sanpham_id']));
    $statement = $pdo->prepare("SELECT * FROM sanpham WHERE sp_id IN ($product_ids)");
    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);

    $product_data = [];
    foreach ($products as $product) {
        $product_data[$product['sp_id']] = $product['sp_tonkho'];
    }

    $allow_update = true;
    foreach ($_POST['sanpham_id'] as $index => $sanpham_id) {
        $sanpham_ten = $_POST['sanpham_ten'][$index];
        $soluong = $_POST['soluong'][$index];

        if (!isset($product_data[$sanpham_id]) || $product_data[$sanpham_id] < $soluong) {
            $allow_update = false;
            $error_message .= 'Số lượng "' . $soluong . '" không đủ cho sản phẩm "' . $sanpham_ten . '".' . PHP_EOL;
        } else {
            $_SESSION['giohang_soluong'][$index + 1] = $soluong;
        }
    }

    if ($allow_update) {
        $success_message = 'Cập nhật giỏ hàng thành công!';
    }
}
?>

<?php if ($error_message): ?>
    <script>alert('<?php echo nl2br($error_message); ?>');</script>
<?php elseif ($success_message): ?>
    <script>alert('<?php echo $success_message; ?>');</script>
<?php endif; ?>




<div class="page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

                <?php if(!isset($_SESSION['giohang_id'])): ?>
                    <?php echo 'Giỏ hàng trống'; ?>
                <?php else: ?>
                <form action="" method="post">
                    <?php $csrf->echoInputField(); ?>
				<div class="cart">
                    <table class="table table-responsive">
                        <tr>
                            <th><?php echo "STT" ?></th>
                            <th><?php echo "Ảnh" ?></th>
                            <th><?php echo "Tên sản phẩm" ?></th>
                            <th><?php echo "Giá" ?></th>
                            <th><?php echo "Số lượng" ?></th>
                            <th class="text-right"><?php echo "Tổng tiền" ?></th>
                            <th class="text-center" style="width: 100px;"><?php echo "Xóa"; ?></th>
                        </tr>
                        <?php
                     $table_total_price = 0; // Khởi tạo tổng tiền của giỏ hàng
                        $i=0;
                        foreach($_SESSION['giohang_id'] as $key => $value) 
                        {
                            $i++;
                            $arr_cart_p_id[$i] = $value;
                        }
                        $i=0;
                        foreach($_SESSION['giohang_soluong'] as $key => $value) 
                        {
                            $i++;
                            $arr_cart_p_qty[$i] = $value;
                        }

                        $i=0;
                        foreach($_SESSION['giohang_giamoi'] as $key => $value) 
                        {
                            $i++;
                            $arr_cart_p_current_price[$i] = $value;
                        }

                        $i=0;
                        foreach($_SESSION['giohang_ten'] as $key => $value) 
                        {
                            $i++;
                            $arr_cart_p_name[$i] = $value;
                        }

                        $i=0;
                        foreach($_SESSION['giohang_img'] as $key => $value) 
                        {
                            $i++;
                            $arr_cart_p_featured_photo[$i] = $value;
                        }
                        ?>
                        <?php for($i=1;$i<=count($arr_cart_p_id);$i++): ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>
                                <img src="assets/uploads/<?php echo $arr_cart_p_featured_photo[$i]; ?>" alt="">
                            </td>
                            <td><?php echo $arr_cart_p_name[$i]; ?></td>
                            <td> <?php echo "$"; ?><?php echo $arr_cart_p_current_price[$i]; ?></td>
                            <td>
                                <input type="hidden" name="sanpham_id[]" value="<?php echo $arr_cart_p_id[$i]; ?>">
                                <input type="hidden" name="sanpham_ten[]" value="<?php echo $arr_cart_p_name[$i]; ?>">
                                <input type="number" class="input-text qty text" step="1" min="1" max="" name="soluong[]" value="<?php echo $arr_cart_p_qty[$i]; ?>" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric">
                            </td>
                            <td class="text-right">
                                <?php
                                 
                                $row_total_price = $arr_cart_p_current_price[$i]*$arr_cart_p_qty[$i];
                                $table_total_price = $table_total_price + $row_total_price;
                                ?>
                              <?php echo "$"; ?><?php echo $row_total_price; ?>
                            </td>
                            <td class="text-center">
                                <a onclick="return confirmDelete();" href="giohang_delete.php?id=<?php echo $arr_cart_p_id[$i]; ?>" class="trash"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endfor; ?>
                        <tr>
                            <th colspan="7" class="total-text">Total</th>
                            <th class="total-amount"><?php echo "$"; ?><?php echo $table_total_price; ?></th>
                            <th></th>
                        </tr>
                    </table> 
                </div>

                <div class="cart-buttons">
                    <ul>
                        <li><input type="submit" value="<?php echo "Cập nhật lại giỏ hàng"; ?>" class="btn btn-primary" name="form1"></li>
                        <li><a href="index.php" class="btn btn-primary"><?php echo "Tiếp tục mua"; ?></a></li>
                        <li><a href="thanhtoan.php" class="btn btn-primary"><?php echo "Thanh toán"; ?></a></li>
                    </ul>
                </div>
                </form>
                <?php endif; ?>

                

			</div>
		</div>
	</div>
</div>

<?php require_once('footer.php'); ?>