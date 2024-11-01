
<style>
      .giohang{
        text-align: center;
        height: 300px;
    }
</style>    
<?php require_once('header.php'); ?>
<?php
$error_message = '';
if(isset($_POST['form1'])) {
 // Truy xuất dữ liệu sản phẩm từ cơ sở dữ liệu
    $statement = $pdo->prepare("SELECT * FROM sanpham");
    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Lưu dữ liệu sản phẩm từ DB vào các mảng
    $table_product_id = array_column($products, 'sp_id');
    $table_quantity = array_column($products, 'sp_tonkho');

    // Lưu dữ liệu từ form vào các mảng
    $arr1 = $_POST['sanpham_id'];
    $arr2 = $_POST['soluong'];
    $arr3 = $_POST['sanpham_ten'];

    $allow_update = 1;
    foreach ($arr1 as $index => $product_id) {
        $temp_index = array_search($product_id, $table_product_id);
        if ($table_quantity[$temp_index] < $arr2[$index]) {
            $allow_update = 0;
            $error_message .= '"Số lượng '.$arr2[$index].' chiếc" không có sẵn cho sản phẩm "'.$arr3[$index].'"\n';
        } else {
            $_SESSION['giohang_soluong'][$index + 1] = $arr2[$index];
        }
    }
   //Thông báo 
    $error_message .= '\nSố lượng mặt hàng khác đã được cập nhật thành công!';
    ?>

    <?php if($allow_update == 0): ?>
        <script>alert('<?php echo $error_message; ?>');</script>
    <?php else: ?>
        <script>alert('Cập nhật số lượng tất cả các mặt hàng thành công!');</script>
    <?php endif; ?>

<?php } ?>

<?php if ($error_message): ?>
    <script>alert('<?php echo nl2br($error_message); ?>');</script>
<?php elseif ($success_message): ?>
    <script>alert('<?php echo $success_message; ?>');</script>
<?php endif; ?>




<div class="page">
	<div class="container">
		<div class="row">
			<div class="col-md-12"> 
                <?php
                //Hiển thị giỏ hàng
                if(!isset($_SESSION['giohang_id'])): ?>
                       <h2 class="giohang"><b><?php echo 'Giỏ hàng trống'; ?></b></h2> 
                <?php else: ?>
                <form action="" method="post">
                    <?php $csrf->echoInputField();
                    
                    //Hiển thị sản phẩm trong giỏ hàng
                    ?>
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
                                <a  href="giohang_delete.php?id=<?php echo $arr_cart_p_id[$i]; ?>&name=<?php echo  $arr_cart_p_name[$i]; ?>" class="trash"><i class="fa fa-trash"></i></a>
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