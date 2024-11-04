<?php require_once('header.php'); ?>
<?php 
if (isset($_POST['form4']) && isset($_SESSION['customer'])) {
    $customer_id = $_SESSION['customer']['kh_id'];
    $amount = $_POST['amount'];
    $payment_method = 'Tien mat';
    $status = 'Xac nhan';

    // Lưu đơn hàng vào cơ sở dữ liệu
    $stmt = $pdo->prepare("INSERT INTO orders (order_kh_id, total_amount, payment_method, status) VALUES (?, ?, ?, ?)");
    $stmt->execute([$customer_id, $amount, $payment_method, $status]);

    $order_id = $pdo->lastInsertId();

    // Lưu chi tiết sản phẩm vào bảng order_detail
    foreach ($_SESSION['giohang_id'] as $key => $product_id) {
        $product_name = $_SESSION['giohang_ten'][$key];
        $quantity = $_SESSION['giohang_soluong'][$key];
        $price = $_SESSION['giohang_giamoi'][$key];
        $total = $price * $quantity;

        $stmt_detail = $pdo->prepare("INSERT INTO order_detail (order_id, product_id, product_name, quantity, price, total) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_detail->execute([$order_id, $product_id, $product_name, $quantity, $price, $total]);

        // Cập nhật tồn kho sản phẩm
        $stmt_stock = $pdo->prepare("UPDATE sanpham SET sp_tonkho = sp_tonkho - ? WHERE sp_id = ?");
        $stmt_stock->execute([$quantity, $product_id]);
    }

    echo "<script>alert('Thanh toán tiền mặt đã xác nhận. Cảm ơn bạn đã mua hàng!');</script>";
    echo "<script>window.location.href = 'order-success.php?order_id=" . $order_id . "';</script>";
}
    unset($_SESSION['giohang_id']);
    unset($_SESSION['giohang_soluong']);
    unset($_SESSION['giohang_giamoi']);
    unset($_SESSION['giohang_ten']);
    unset($_SESSION['giohang_img']);
?>
<?php require_once('footer.php'); ?>