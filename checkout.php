
<style>
    .checkoutrequest{
        height: 300px;
        text-align: center;
    }
</style>


<?php require_once('header.php'); ?>

<?php
if(!isset($_SESSION['giohang_id'])) {
    header('location: cart.php');
    exit;
}
?>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <?php if(!isset($_SESSION['customer'])): ?>
                    <p class="checkoutrequest">
                        <a href="login.php" class="btn btn-md btn-danger"><?php echo "Vui lòng đăng nhập!"; ?></a>
                    </p>
                <?php else: ?>

                <h3 class="special"><?php echo "Chi tiết Order"; ?></h3>
                <div class="cart">
                    <table class="table table-responsive">
                        <tr>
                            <th><?php echo "STT" ?></th>
                            <th><?php echo "Ảnh" ?></th>
                            <th><?php echo "Tên sản phẩm" ?></th>                        
                            <th><?php echo "Giá" ?></th>
                            <th><?php echo "Số lượng" ?></th>
                            <th class="text-right"><?php echo "Tổng tiền" ?></th>
                        </tr>
                         <?php
                        $table_total_price = 0;

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
                            <td><?php echo "$"; ?><?php echo $arr_cart_p_current_price[$i]; ?></td>
                            <td><?php echo $arr_cart_p_qty[$i]; ?></td>
                            <td class="text-right">
                                <?php
                                $row_total_price = $arr_cart_p_current_price[$i]*$arr_cart_p_qty[$i];
                                $table_total_price = $table_total_price + $row_total_price;
                                ?>
                                <?php echo "$"; ?><?php echo $row_total_price; ?>
                            </td>
                        </tr>
                        <?php endfor;
                        $shipping_cost=50;
                        
                        ?>           
                        <tr>
                            <th colspan="7" class="total-text"><?php echo "Tổng phụ"; ?></th>
                            <th class="total-amount"><?php echo "$"; ?><?php echo $table_total_price; ?></th>
                        </tr>
                        <tr>
                            <td colspan="7" class="total-text"><?php echo "Phí ship" ?></td>
                            <td class="total-amount"><?php echo "$"; ?><?php echo $shipping_cost; ?></td>
                        </tr>
                        <tr>
                            <th colspan="7" class="total-text"><?php echo "Tổng tiền cuối" ?></th>
                            <th class="total-amount">
                                <?php
                                $final_total = $table_total_price+$shipping_cost;
                                ?>
                                <?php echo "$" ?><?php echo $final_total; ?>
                            </th>
                        </tr>
                    </table> 
                </div>

                
                        <div class="col-md-6">
                            <h3 class="special"><?php echo "Thông tin giao hàng" ?></h3>
                            <table class="table table-responsive table-bordered bill-address">
                                <tr>
                                    <td><?php echo "Tên người nhận" ?></td>
                                    <td><?php echo $_SESSION['customer']['kh_ten']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><?php echo "Tên công ty" ?></td>
                                    <td><?php echo $_SESSION['customer']['kh_cty']; ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo "Số điện thoại" ?></td>
                                    <td><?php echo $_SESSION['customer']['kh_sodienthoai']; ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo "Quốc gia" ?></td>
                                    <td>
                                        <?php
                                        $statement = $pdo->prepare("SELECT * FROM quocgia WHERE country_id=?");
                                        $statement->execute(array($_SESSION['customer']['kh_quocgia']));
                                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($result as $row) {
                                            echo $row['country_name'];
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo "Địa chỉ"; ?></td>
                                    <td>
                                        <?php echo nl2br($_SESSION['customer']['kh_diachi']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo "Thành phố" ?></td>
                                    <td><?php echo $_SESSION['customer']['kh_thanhpho']; ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo "Quận" ?></td>
                                    <td><?php echo $_SESSION['customer']['kh_quan']; ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo "Mã Zip" ?></td>
                                    <td><?php echo $_SESSION['customer']['kh_zip']; ?></td>
                                </tr> 
                            </table>
                        </div>
                    </div>                    
                </div>
                <div class="cart-buttons">
                    <ul>
                        <li><a href="cart.php" class="btn btn-primary"><?php echo "Quay lại giỏ hàng" ?></a></li>
                    </ul>
                </div>

				<div class="clear"></div>
                <h3 class="special"><?php echo "Chọn phương thức thanh toán" ?></h3>
                <div class="row">
                    
                    	<?php
		                $checkout_access = 1;
		                if(		                    
		                    ($_SESSION['customer']['kh_ten']=='') ||
		                    ($_SESSION['customer']['kh_cty']=='') ||
		                    ($_SESSION['customer']['kh_sodienthoai']=='') ||
		                    ($_SESSION['customer']['kh_quocgia']=='') ||
		                    ($_SESSION['customer']['kh_diachi']=='') ||
		                    ($_SESSION['customer']['kh_thanhpho']=='') ||
		                    ($_SESSION['customer']['kh_quan']=='') ||
		                    ($_SESSION['customer']['kh_zip']=='')
		                ) {
		                    $checkout_access = 0;
		                }
		                ?>
		                <?php if($checkout_access == 0): ?>
		                	<div class="col-md-12">
				                <div style="color:red;font-size:22px;margin-bottom:50px;">
                                Bạn phải điền tất cả thông tin giao hàng bên trên để thanh toán đơn hàng. Vui lòng điền thông tin =>  <a href="update_profile.php" style="color:blue;text-decoration:underline;">Click vào đây</a>.
			                    </div>
	                    	</div>
	                	<?php else: ?>
		                	<div class="col-md-4">
    <div class="row">
        <!-- Chọn phương thức thanh toán -->
        <div class="col-md-12 form-group">
            <label for="payment_method">Chọn phương thức thanh toán *</label>
            <select name="payment_method" class="form-control select2" id="payment_method" onchange="togglePaymentForm()">
                <option value="">Chọn phương thức</option>
                <option value="bank">Chuyển khoản</option>
                <option value="cash">Tiền mặt</option>
            </select>
        </div>

        <!-- Form thanh toán chuyển khoản -->
        <form action="bank.php" method="post" id="bank_form" style="display: none;">
            <input type="hidden" name="amount" value="<?php echo $final_total; ?>">
            
            <!-- Thông tin chuyển khoản -->
            <div class="col-md-12 form-group">
                <label for="bank_info">Thông tin chuyển khoản</label>
                <p>Tên ngân hàng: Vietinbank</p>
                <p>Số tài khoản: 101872144684</p>
                <p>Chủ tài khoản: Nguyễn Đức Minh</p>
                <p>Quốc gia: Việt Nam</p>
            </div>
            <!-- Thông tin giao dịch -->
            <div class="col-md-12 form-group">
                <label for="transaction_info">Thông tin giao dịch <br>
                    <span style="font-size:12px;font-weight:normal;">
                        (Chi tiết thông tin giao dịch bao gồm mã giao dịch và tên người chuyển)
                    </span>
                </label>
                <textarea name="transaction_info" class="form-control" cols="30" rows="5"></textarea>
            </div>  
            <!-- Nút gửi thanh toán -->
            <div class="col-md-12 form-group">
                <input type="submit" class="btn btn-primary" value="Thanh toán" name="form3">
            </div>
        </form>

    <!-- Form thanh toán tiền mặt -->
    <form action="cash.php" method="post" id="cash_form" style="display: none;">
            <input type="hidden" name="amount" value="<?php echo $final_total; ?>">  
            <!-- Thông tin thanh toán tiền mặt -->
            <div class="col-md-12 form-group">
                <label for="cash_info">Thanh toán tiền mặt</label>
                <p>Bạn sẽ thanh toán trực tiếp bằng tiền mặt khi nhận hàng.</p>
                <p>Vui lòng đảm bảo rằng bạn đã nhập chính xác thông tin giao hàng.</p>
            </div>
            <!-- Nút xác nhận thanh toán -->
            <div class="col-md-12 form-group">
                <input type="submit" class="btn btn-primary" value="Xác nhận thanh toán" name="form4">
            </div>
        </form>
    </div>
</div>
<script>
// Script để ẩn/hiện form thanh toán dựa trên phương thức thanh toán được chọn
function togglePaymentForm() {
    var paymentMethod = document.getElementById("payment_method").value;
    var bankForm = document.getElementById("bank_form");
    var cashForm = document.getElementById("cash_form");

    // Hiển thị form phù hợp dựa trên phương thức thanh toán được chọn
    if (paymentMethod === "bank") {
        bankForm.style.display = "block";
        cashForm.style.display = "none";
    } else if (paymentMethod === "cash") {
        cashForm.style.display = "block";
        bankForm.style.display = "none";
    } else {
        bankForm.style.display = "none";
        cashForm.style.display = "none";
    }
}
</script>
          <?php endif; ?>                 
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>