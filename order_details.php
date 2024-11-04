    <?php require_once('header.php'); ?>
<?php
if (!isset($_SESSION['customer'])) {
    header('Location: login.php'); // Nếu chưa đăng nhập, chuyển đến trang đăng nhập
    exit;
}

// Lấy ID đơn hàng từ query string
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Lấy thông tin đơn hàng
    $stmt_order = $pdo->prepare("SELECT * FROM orders WHERE id = ? AND order_kh_id = ?");
    $stmt_order->execute([$order_id, $_SESSION['customer']['kh_id']]);
    $order = $stmt_order->fetch(PDO::FETCH_ASSOC);

    // Nếu không tìm thấy đơn hàng
    if (!$order) {
        echo "Không tìm thấy đơn hàng.";
        exit;
    }

    // Lấy chi tiết đơn hàng
    $stmt_details = $pdo->prepare("SELECT * FROM order_detail WHERE order_id = ?");
    $stmt_details->execute([$order_id]);
    $order_details = $stmt_details->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "Không có ID đơn hàng.";
    exit;
}
?>
<div class="container">
        <h2 class="special">Chi tiết đơn hàng</h2>
        <p><strong>Mã đơn hàng:</strong> <?php echo $order['id']; ?></p>
        <p><strong>Tổng tiền:</strong> <?php echo "$" . number_format($order['total_amount'], 1); ?></p>
        <p><strong>Phương thức thanh toán:</strong> <?php echo ucfirst($order['payment_method']); ?></p>
        <p><strong>Trạng thái:</strong> <?php echo ucfirst($order['status']); ?></p>
        
        <h3>Thông tin sản phẩm trong đơn hàng</h3>
        <table class="table table-responsive">
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
            </tr>
            <?php foreach ($order_details as $detail): ?>
                <tr>
                    <td><?php echo $detail['product_name']; ?></td>
                    <td><?php echo $detail['quantity']; ?></td>
                    <td><?php echo "$" . number_format($detail['price'], 1); ?></td>
                    <td><?php echo "$" . number_format($detail['total'], 1); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php require_once('footer.php'); ?>
