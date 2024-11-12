<?php require_once('header.php'); ?>

<?php 
//Kiểm tra xem khách hàng đã đăng nhập hay chưa
if(!isset($_SESSION['customer'])) {
    header('location: '.BASE_URL.'logout.php');
    exit;
}
else {
    // Nếu khách hàng đã đăng nhập mà trạng thái tài khoản bằng 0 thì buộc người dùng đăng xuất
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
//Kiểm tra và cập nhật lại thông tin khách hàng
if (isset($_POST['form1'])) {
    $giatri = 1;
    if(empty($_POST['cust_name'])) {
        $giatri = 0;
        $error_message .= "Tên không được để trống!"."<br>";
    }

    if(empty($_POST['cust_phone'])) {
        $giatri = 0;
        $error_message .= "Số điện thoại không được để trống!"."<br>";
    }

    if(empty($_POST['cust_address'])) {
        $giatri = 0;
        $error_message .= "Địa chỉ không được để trống!"."<br>";
    }

    if(empty($_POST['cust_country'])) {
        $giatri = 0;
        $error_message .= "Bạn vui lòng chọn 1 quốc gia!"."<br>";
    }

    if(empty($_POST['cust_city'])) {
        $giatri = 0;
        $error_message .= "Thành phố không được để trống!"."<br>";
    }

    if(empty($_POST['cust_state'])) {
        $giatri = 0;
        $error_message .= "Quận không được để trống!"."<br>";
    }

    if(empty($_POST['cust_zip'])) {
        $giatri = 0;
        $error_message .= "Mã Zip không được để trống!"."<br>";
    }

        // Cập nhật thông tin vào database
    if ($giatri == 1) {
        $statement = $pdo->prepare("UPDATE khachhang SET kh_ten=?, kh_cty=?, kh_sodienthoai=?, kh_quocgia=?, kh_diachi=?, kh_thanhpho=?, kh_quan=?, kh_zip=? WHERE kh_id=?");
        $statement->execute(array(
                    strip_tags($_POST['cust_name']),
                    strip_tags($_POST['cust_cname']),
                    strip_tags($_POST['cust_phone']),
                    strip_tags($_POST['cust_country']),
                    strip_tags($_POST['cust_address']),
                    strip_tags($_POST['cust_city']),
                    strip_tags($_POST['cust_state']),
                    strip_tags($_POST['cust_zip']),
                    $_SESSION['customer']['kh_id']
                ));  
       
        $success_message = "Cập nhật profile thành công!!";

        $_SESSION['customer']['kh_ten'] = $_POST['cust_name'];
        $_SESSION['customer']['kh_cty'] = $_POST['cust_cname'];
        $_SESSION['customer']['kh_sodienthoai'] = $_POST['cust_phone'];
        $_SESSION['customer']['kh_quocgia'] = $_POST['cust_country'];
        $_SESSION['customer']['kh_diachi'] = $_POST['cust_address'];
        $_SESSION['customer']['kh_thanhpho'] = $_POST['cust_city'];
        $_SESSION['customer']['kh_quan'] = $_POST['cust_state'];
        $_SESSION['customer']['kh_zip'] = $_POST['cust_zip'];
    
    }

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
                    <h3>
                        <?php echo "Cập nhật thông tin cá nhân" ?>
                    </h3>
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
                            <div class="col-md-6 form-group">
                                <label for=""><?php echo "Tên" ?> *</label>
                                <input type="text" class="form-control" name="cust_name" value="<?php echo $_SESSION['customer']['kh_ten']; ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><?php echo "Tên công ty"; ?></label>
                                <input type="text" class="form-control" name="cust_cname" value="<?php echo $_SESSION['customer']['kh_cty']; ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><?php echo "Email"; ?> *</label>
                                <input type="text" class="form-control" name="" value="<?php echo $_SESSION['customer']['kh_email']; ?>" disabled>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><?php echo "Số điện thoại"; ?> *</label>
                                <input type="number" class="form-control" name="cust_phone" value="<?php echo $_SESSION['customer']['kh_sodienthoai']; ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for=""><?php echo "Địa chỉ"; ?> *</label>
                                <textarea name="cust_address" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $_SESSION['customer']['kh_diachi']; ?></textarea>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><?php echo "Quốc gia"; ?> *</label>
                                <select name="cust_country" class="form-control">
                                    <option value="">Chọn quốc gia</option>
                                        <?php
                                        $statement = $pdo->prepare("SELECT * FROM quocgia ORDER BY country_name ASC");
                                        $statement->execute();
                                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($result as $row) {
                                            ?>
                                            <option value="<?php echo $row['country_id']; ?>" <?php if($row['country_id'] == $_SESSION['customer']['kh_quocgia']) {echo 'selected';} ?>><?php echo $row['country_name']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>                                 
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <label for=""><?php echo "Thành phố"; ?> *</label>
                                <input type="text" class="form-control" name="cust_city" value="<?php echo $_SESSION['customer']['kh_thanhpho']; ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><?php echo "Quận"; ?> *</label>
                                <input type="text" class="form-control" name="cust_state" value="<?php echo $_SESSION['customer']['kh_quan']; ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><?php echo "Mã zip"; ?> *</label>
                                <input type="text" class="form-control" name="cust_zip" value="<?php echo $_SESSION['customer']['kh_zip']; ?>">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="<?php echo "Cập nhật"; ?>" name="form1">
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>
     
<?php require_once('footer.php'); ?>