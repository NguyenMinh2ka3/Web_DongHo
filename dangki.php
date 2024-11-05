<?php require_once('header.php'); ?>

<?php
if (isset($_POST['form1'])) {

    $giatri = 1;

    if(empty($_POST['cust_name'])) {
        $giatri = 0;
        $error_message .= "Tên khách hàng không được để trống."."<br>";
    }

    if(empty($_POST['cust_email'])) {
        $giatri = 0;
        $error_message .= "Email Address không được để trống"."<br>";
    } else {
        if (filter_var($_POST['cust_email'], FILTER_VALIDATE_EMAIL) === false) {
            $giatri = 0;
            $error_message .= "Địa chỉ Email phải hợp lệ"."<br>";
        } else {
            $statement = $pdo->prepare("SELECT * FROM khachhang WHERE kh_email=?");
            $statement->execute(array($_POST['cust_email']));
            $total = $statement->rowCount();                            
            if($total) {
                $giatri = 0;
                $error_message .= "Địa chỉ Email đã tồn tại"."<br>";
            }
        }
    }

    if(empty($_POST['cust_phone'])) {
        $giatri = 0;
        $error_message .= "Số điện thoại không được để trống"."<br>";
    }

    if(empty($_POST['cust_address'])) {
        $giatri = 0;
        $error_message .= "Địa chỉ không được để trống"."<br>";
    }

    if(empty($_POST['cust_country'])) {
        $giatri = 0;
        $error_message .= "Bạn phải chọn một quốc gia"."<br>";
    }

    if(empty($_POST['cust_city'])) {
        $giatri = 0;
        $error_message .= "Thành phố không được để trống"."<br>";
    }

    if(empty($_POST['cust_state'])) {
        $giatri = 0;
        $error_message .= "Quận không được để trống"."<br>";
    }

    if(empty($_POST['cust_zip'])) {
        $giatri = 0;
        $error_message .= "Mã Zip không được để trống"."<br>";
    }

    if( empty($_POST['cust_password']) || empty($_POST['cust_re_password']) ) {
        $giatri = 0;
        $error_message .= "Mật khẩu không được để trống"."<br>";
    }

    if( !empty($_POST['cust_password']) && !empty($_POST['cust_re_password']) ) {
        if($_POST['cust_password'] != $_POST['cust_re_password']) {
            $giatri = 0;
            $error_message .= "Mật khẩu không khớp"."<br>";
        }
    }

    if($giatri == 1) {
        $token = md5(time());
        $cust_datetime = date('Y-m-d h:i:s');
        $cust_timestamp = time();
        // Lưu vào cơ sở dữ liệu
        $statement = $pdo->prepare("INSERT INTO khachhang (
                                        kh_ten,
                                        kh_cty,
                                        kh_email,
                                        kh_sodienthoai,
                                        kh_quocgia,
                                        kh_diachi,
                                        kh_thanhpho,
                                        kh_quan,
                                        kh_zip,                       
                                        kh_matkhau,
                                        kh_token,
                                        kh_ngaygio,
                                        kh_mocthoigian,
                                        kh_trangthai
                                    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $statement->execute(array(
                                        strip_tags($_POST['cust_name']),
                                        strip_tags($_POST['cust_cname']),
                                        strip_tags($_POST['cust_email']),
                                        strip_tags($_POST['cust_phone']),
                                        strip_tags($_POST['cust_country']),
                                        strip_tags($_POST['cust_address']),
                                        strip_tags($_POST['cust_city']),
                                        strip_tags($_POST['cust_state']),
                                        strip_tags($_POST['cust_zip']),
                                       
                                        md5($_POST['cust_password']),
                                        $token,
                                        $cust_datetime,
                                        $cust_timestamp,
                                        1
                                    ));
        unset($_POST['cust_name']);
        unset($_POST['cust_cname']);
        unset($_POST['cust_email']);
        unset($_POST['cust_phone']);
        unset($_POST['cust_address']);
        unset($_POST['cust_city']);
        unset($_POST['cust_state']);
        unset($_POST['cust_zip']);

        $success_message = "Chúc mừng bạn! Đã đăng kí thành công ";
    }
}
?>

<div class="page-banner" style="background-color:#444;background-image: url(assets/uploads/banner_blog.jpg);">
    <div class="inner">
        <h1><?php echo "Đăng kí người dùng" ?></h1>
    </div>
</div>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="user-content">
                    <form action="" method="post">
                        
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                
                                <?php
                                if($error_message != '') {
                                    echo "<div class='error' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>".$error_message."</div>";
                                }
                                if($success_message != '') {
                                    echo "<div class='success' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>".$success_message."</div>";
                                }
                                ?>

                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo "Tên" ?> *</label>
                                    <input type="text" class="form-control" name="cust_name" value="<?php if(isset($_POST['cust_name'])){echo $_POST['cust_name'];} ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo "Tên công ty" ?></label>
                                    <input type="text" class="form-control" name="cust_cname" value="<?php if(isset($_POST['cust_cname'])){echo $_POST['cust_cname'];} ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo "Email" ?> *</label>
                                    <input type="email" class="form-control" name="cust_email" value="<?php if(isset($_POST['cust_email'])){echo $_POST['cust_email'];} ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo "Số điện thoại" ?> *</label>
                                    <input type="number" class="form-control" name="cust_phone" value="<?php if(isset($_POST['cust_phone'])){echo $_POST['cust_phone'];} ?>">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for=""><?php echo "Địa chỉ" ?> *</label>
                                    <textarea name="cust_address" class="form-control" cols="30" rows="10" style="height:70px;"><?php if(isset($_POST['cust_address'])){echo $_POST['cust_address'];} ?></textarea>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo "Quốc gia" ?> *</label>
                                    <select name="cust_country" class="form-control select2">
                                        <option value="">Chọn quốc gia</option>
                                    <?php
                                    $statement = $pdo->prepare("SELECT * FROM quocgia ORDER BY country_name ASC");
                                    $statement->execute();
                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                                    foreach ($result as $row) {
                                        ?>
                                        <option value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>
                                        <?php
                                    }
                                    ?>    
                                    </select>                                    
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo "Thành phố" ?> *</label>
                                    <input type="text" class="form-control" name="cust_city" value="<?php if(isset($_POST['cust_city'])){echo $_POST['cust_city'];} ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo "Quận" ?> *</label>
                                    <input type="text" class="form-control" name="cust_state" value="<?php if(isset($_POST['cust_state'])){echo $_POST['cust_state'];} ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo "Mã zip" ?> *</label>
                                    <input type="text" class="form-control" name="cust_zip" value="<?php if(isset($_POST['cust_zip'])){echo $_POST['cust_zip'];} ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo "Mật khẩu" ?> *</label>
                                    <input type="password" class="form-control" name="cust_password">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=""><?php echo "Nhập lại mật khẩu" ?> *</label>
                                    <input type="password" class="form-control" name="cust_re_password">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=""></label>
                                    <input type="submit" class="btn btn-primary" value="<?php echo "Đăng kí" ?>" name="form1">
                                </div>
                            </div>
                        </div>                        
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>