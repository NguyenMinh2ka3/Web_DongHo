<?php require_once('header.php'); ?>


<?php
if(isset($_POST['form1'])) {
        
    if(empty($_POST['cust_email']) || empty($_POST['cust_password'])) {
        $error_message = "Vui lòng không để trống Email hoặc Mật khẩu".'<br>';
    } else {
        
        $cust_email = strip_tags($_POST['cust_email']);
        $cust_password = strip_tags($_POST['cust_password']);
        
        $statement = $pdo->prepare("SELECT * FROM khachhang WHERE kh_email=?");
        $statement->execute(array($cust_email));
        $total = $statement->rowCount();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row) {
            $cust_status = $row['kh_trangthai'];
            $row_password = $row['kh_matkhau'];
        }

        if($total==0) {
            $error_message .= "Địa chỉ Email không khớp.".'<br>';
        } else {
            //using MD5 form
            if( $row_password != $cust_password) {
                $error_message .= "Mật khẩu không chính xác".'<br>';
            } else {
                if($cust_password == 0) {
                    $error_message .= "Vui lòng nhập lại mật khẩu".'<br>';
                } else {
                    $_SESSION['customer'] = $row;
                    header("location: ".BASE_URL."index.php");
                }
            }
            
        }
    }
}
?>

<div class="page-banner" style="background-color:#444;background-image: url(assets/uploads/banner_login.jpg);">
    <div class="inner">
        <h1><?php echo "Đăng nhập người dùng" ?></h1>
    </div>
</div>
<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="user-content">    
                    <form action="" method="post">
                        <?php $csrf->echoInputField(); ?>                  
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <?php

                                if($error_message != '') {
                                    echo "<div class='error' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>".$error_message."</div>";
                                }
                                if($success_message != '') {
                                    echo "<div class='success' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>".$success_message."</div>";
                                }
                                ?>
                                <div class="form-group">
                                    <label for=""><?php echo "Nhập Email" ?> *</label>
                                    <input type="email" class="form-control" name="cust_email">
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo "Nhập mật khẩu" ?> *</label>
                                    <input type="password" class="form-control" name="cust_password">
                                </div>
                                <div class="form-group">
                                    <label for=""></label>
                                    <input type="submit" class="btn btn-primary" value="<?php echo "Đăng nhập" ?>" name="form1">
                                </div>
                                <a href="forget-password.php" style="color:#e4144d;"><?php echo "Lấy lại mật khẩu?" ?></a>
                            </div>
                        </div>                        
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>