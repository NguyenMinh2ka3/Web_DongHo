<style>
      .tblienhe{
        margin: 50px;
        text-align: center;
        height: 300px;
    }
</style>
<?php require_once('header.php'); ?>

<?php if(!isset($_SESSION['customer'])): ?>
                    <p class="tblienhe">
                        <a href="login.php" class="btn btn-md btn-danger"><?php echo "Vui lòng đăng nhập !"; ?></a>
                    </p>
                <?php else: ?>
<?php
if ((isset($_POST['form_lh']))&& (isset($_POST['sms_ten']))&&(isset($_POST['sms_email']))&& (isset($_POST['sms_phone']))&&(isset($_POST['sms_message']))) {
        $statement=$pdo->prepare("INSERT INTO lienhe (lh_hoten, lh_email, lh_sdt, lh_tinnhan) VALUES(?,?,?,?)");
        $statement->execute(array(
            strip_tags($_POST['sms_ten']),
            strip_tags($_POST['sms_email']),
            strip_tags($_POST['sms_phone']),
            strip_tags($_POST['sms_message']),
        ));
        $_SESSION['customer']['kh_ten'] = $_POST['sms_ten'];
        $_SESSION['customer']['kh_email'] = $_POST['sms_email'];
        $_SESSION['customer']['kh_sodienthoai'] = $_POST['sms_phone'];
        unset($_POST['sms_ten']);
        unset($_POST['sms_email']);
        unset($_POST['sms_phone']);
        unset($_POST['sms_message']);
        $success_message = "Chúc mừng bạn! Đã gửi liên hệ thành công ";
   
     
}

?>




<form action="" method="post">
           
                            <div class="row">
                                <div class="col-md-6">
                                  <?php 
                                  
                                  ?>
                                    <div class="form-group">
                                        <label for="name">Họ và tên</label>
                                        <input type="text" class="form-control" name="sms_ten" placeholder="Nhập họ và tên"  readonly value="<?php echo $_SESSION['customer']['kh_ten'];?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Địa chỉ Email</label>
                                        <input type="email" class="form-control" name="sms_email" placeholder="Nhập email" readonly value="<?php echo $_SESSION['customer']['kh_email'];?>"  >
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Số điện thoại</label>
                                        <input type="number" class="form-control" name="sms_phone" placeholder="Nhập số điện thoại"  readonly value="<?php echo $_SESSION['customer']['kh_sodienthoai'];?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Tin nhắn</label>
                                        <textarea name="sms_message" class="form-control" rows="9" cols="25" placeholder="Nhập tin nhắn ở đây !" required value="<?php echo isset($_POST['sms_message'])?$_POST['sms_message']:'';?>" ></textarea>
                                    </div>
                                </div>
                                <div class="tblienhe">
                                    <input type="submit" value="Gửi liên hệ" class="btn btn-md btn-primary" name="form_lh">
                                </div>
                            </div>
                            </form> 
                            <?php
                                    if($success_message != '') {
                                        echo "<div class='success' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>".$success_message."</div>";
                                    }
                                    ?>                    
                            <?php endif; ?>

                            <?php require_once('footer.php'); ?>