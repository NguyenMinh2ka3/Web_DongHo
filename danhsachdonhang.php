<style>
      .table{
        text-align: center;
        height:200px;
    }
    .s{
        margin: 50px;
        text-align: center;
        height: 200px;
    }
</style>

<?php require_once('header.php'); ?>
<?php
if (!isset($_SESSION['customer'])) {
    header('Location: login.php'); // Nếu chưa đăng nhập, chuyển đến trang đăng nhập
    exit;
}

// Lấy ID của người dùng từ session
$customer_id = $_SESSION['customer']['kh_id'];

// Lấy tất cả đơn hàng của người dùng
$stmt = $pdo->prepare("SELECT * FROM orders WHERE order_kh_id = ?");
$stmt->execute([$customer_id]);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    
    <div class="container">
        <h2 class="special">Danh sách đơn hàng của bạn</h2>
        <?php if (count($orders) > 0): ?>
            <table class="table table-responsive">
                <tr>
                    <th>STT</th>
                    <th>Ngày đặt hàng</th>
                    <th>Tổng tiền</th>
                    <th>Phương thức thanh toán</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>
                </tr>
                <?php foreach ($orders as $index => $order): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($order['created_at'])); ?></td>
                        <td><?php echo "$" . number_format($order['total_amount'], 2); ?></td>
                        <td><?php echo ucfirst($order['payment_method']); ?></td>
                        <td><?php echo ucfirst($order['status']); ?></td>
                        <td>
                            <a href="order_details.php?order_id=<?php echo $order['id']; ?>" class="btn btn-info">Xem chi tiết</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <h4 class="s">Hiện tại bạn chưa có đơn hàng nào.</h4>
        <?php endif; ?>
    </div>


<?php require_once('footer.php'); ?>
