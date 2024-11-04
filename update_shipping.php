<?php require_once('header.php'); ?>

<?php
// Kiểm tra xem khách hàng đã đăng nhập hay chưa
if(!isset($_SESSION['customer'])) {
    header('location: '.BASE_URL.'logout.php');
    exit;
} else {
   //Nếu khách hàng đăng nhập mà trạng thái 0 thì buộc đăng xuất
    $statement = $pdo->prepare("SELECT * FROM khachhang WHERE kh_id=? AND kh_trangthai=?");
    $statement->execute(array($_SESSION['customer']['kh_id'],0));
    $total = $statement->rowCount();
    if($total) {
        header('location: '.BASE_URL.'logout.php');
        exit;
    }
}
?>

<?php
if (isset($_POST['form1'])) {
    // Cập nhật vào database
    $statement = $pdo->prepare("UPDATE khachhang SET                       
                            kh_s_ten=?, 
                            kh_s_cty=?, 
                            kh_s_sodienthoai=?, 
                            kh_s_quocgia=?, 
                            kh_s_diachi=?, 
                            kh_s_thanhpho=?, 
                            kh_s_quan=?, 
                            kh_s_zip=? 

                            WHERE kh_id=?");
    $statement->execute(array(                      
                            strip_tags($_POST['customer_kh_s_ten']),
                            strip_tags($_POST['customer_kh_s_cty']),
                            strip_tags($_POST['customer_kh_s_sodienthoai']),
                            strip_tags($_POST['customer_kh_s_quocgia']),
                            strip_tags($_POST['customer_kh_s_diachi']),
                            strip_tags($_POST['customer_kh_s_thanhpho']),
                            strip_tags($_POST['customer_kh_s_quan']),
                            strip_tags($_POST['customer_kh_s_zip']),
                            $_SESSION['customer']['kh_id']
                        ));  
   
    $success_message = "Cập nhật thông tin nhận hàng thành công!";

    $_SESSION['customer']['kh_s_ten'] = strip_tags($_POST['customer_kh_s_ten']);
    $_SESSION['customer']['kh_s_cty'] = strip_tags($_POST['customer_kh_s_cty']);
    $_SESSION['customer']['kh_s_sodienthoai'] = strip_tags($_POST['customer_kh_s_sodienthoai']);
    $_SESSION['customer']['kh_s_quocgia'] = strip_tags($_POST['customer_kh_s_quocgia']);
    $_SESSION['customer']['kh_s_diachi'] = strip_tags($_POST['customer_kh_s_diachi']);
    $_SESSION['customer']['kh_s_thanhpho'] = strip_tags($_POST['customer_kh_s_thanhpho']);
    $_SESSION['customer']['kh_s_quan'] = strip_tags($_POST['customer_kh_s_quan']);
    $_SESSION['customer']['kh_s_zip'] = strip_tags($_POST['customer_kh_s_zip']);

}
?>
<div class="page">
    <div class="container">
        <div class="row">            
            <div class="col-md-12"> 
                <?php require_once('khachhang_sidebar.php'); ?>
            </div>
            <div class="col-md-12">
                <div class="user-content">
                    <?php
                    if($error_message != '') {
                        echo "<div class='error' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>".$error_message."</div>";
                    }
                    if($success_message != '') {
                        echo "<div class='success' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>".$success_message."</div>";
                    }
                    ?>
                    <form action="" method="post">
                        
                        <div class="row">                        
                            <div class="col-md-6">
                                <h3><?php echo "Cập nhật thông tin nhận hàng" ?></h3>
                                <div class="form-group">
                                    <label for=""><?php echo "Tên người nhận" ?></label>
                                    <input type="text" class="form-control" name="customer_kh_s_ten" value="<?php echo $_SESSION['customer']['kh_s_ten']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo "Tên công ty"?></label>
                                    <input type="text" class="form-control" name="customer_kh_s_cty" value="<?php echo $_SESSION['customer']['kh_s_cty']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo "Số điện thoại" ?></label>
                                    <input type="number" class="form-control" name="customer_kh_s_sodienthoai" value="<?php echo $_SESSION['customer']['kh_s_sodienthoai']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo "Quốc gia" ?></label>
                                    <select name="customer_kh_s_quocgia" class="form-control">
                                    <option value="">Chọn quốc gia</option>
                                        <?php
                                        $statement = $pdo->prepare("SELECT * FROM quocgia ORDER BY country_name ASC");
                                        $statement->execute();
                                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($result as $row) {
                                            ?>
                                            <option value="<?php echo $row['country_id']; ?>" <?php if($row['country_id'] == $_SESSION['customer']['kh_s_quocgia']) {echo 'selected';} ?>><?php echo $row['country_name']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo "Địa chỉ" ?></label>
                                    <textarea name="customer_kh_s_diachi" class="form-control" cols="30" rows="10" style="height:100px;"><?php echo $_SESSION['customer']['kh_s_diachi']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo "Thành phố" ?></label>
                                    <input type="text" class="form-control" name="customer_kh_s_thanhpho" value="<?php echo $_SESSION['customer']['kh_s_thanhpho']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo "Quận" ?></label>
                                    <input type="text" class="form-control" name="customer_kh_s_quan" value="<?php echo $_SESSION['customer']['kh_s_quan']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo "Mã Zip" ?></label>
                                    <input type="text" class="form-control" name="customer_kh_s_zip" value="<?php echo $_SESSION['customer']['kh_s_zip']; ?>">
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="<?php echo "Cập nhật" ?>" name="form1">
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>