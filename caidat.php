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

<div class="page">
    <div class="container">
        <div class="row">            
            <div class="col-md-12"> 
                <?php require_once('khachhang_sidebar.php'); ?>
            </div>
            <div class="col-md-12">
                <div class="user-content">
                    <h3 class="text-center">
                        <?php echo "Thiết lập cài đặt" ?>
                    </h3>
                </div>                
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>