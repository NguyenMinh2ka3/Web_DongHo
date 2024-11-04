<?php require_once('header.php'); ?>
<?php
// Kiểm tra xem sản phẩm có hợp lệ không
if (!isset($_REQUEST['id']) || !isset($_REQUEST['name'])) {
    header('location: cart.php');
    exit;
}
// Tạo mảng tạm từ các biến session để lưu trữ thông tin giỏ hàng hiện tại
$cartData = [
    'giohang_id' => $_SESSION['giohang_id'],
    'giohang_soluong' => $_SESSION['giohang_soluong'],
    'giohang_giamoi' => $_SESSION['giohang_giamoi'],
    'giohang_ten' => $_SESSION['giohang_ten'],
    'giohang_img' => $_SESSION['giohang_img']
];

// Xóa dữ liệu giỏ hàng trong session
unset($_SESSION['giohang_id'], $_SESSION['giohang_soluong'], $_SESSION['giohang_giamoi'], $_SESSION['giohang_ten'], $_SESSION['giohang_img']);

$k = 1; // Chỉ mục để thêm lại sản phẩm vào giỏ hàng sau khi loại bỏ sản phẩm cần xóa
foreach ($cartData['giohang_id'] as $i => $value) {
    // Kiểm tra nếu sản phẩm hiện tại có id và tên giống với sản phẩm cần xóa
    if ($cartData['giohang_id'][$i] == $_REQUEST['id'] && $cartData['giohang_ten'][$i] == $_REQUEST['name']) {
        continue; // Bỏ qua sản phẩm cần xóa
    }
    // Thêm lại các sản phẩm không cần xóa vào session
    $_SESSION['giohang_id'][$k] = $cartData['giohang_id'][$i];
    $_SESSION['giohang_soluong'][$k] = $cartData['giohang_soluong'][$i];
    $_SESSION['giohang_giamoi'][$k] = $cartData['giohang_giamoi'][$i];
    $_SESSION['giohang_ten'][$k] = $cartData['giohang_ten'][$i];
    $_SESSION['giohang_img'][$k] = $cartData['giohang_img'][$i];
    $k++;
}
// Quay lại trang giỏ hàng sau khi cập nhật
header('location: cart.php');
?>
<?php require_once('footer.php'); ?>
