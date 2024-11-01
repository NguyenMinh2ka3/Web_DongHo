<?php require_once('header.php'); ?>
<?php

// Check if the product is valid or not
if( !isset($_REQUEST['id'])) {
    header('location: cart.php');
    exit;
}

$i=0;
foreach($_SESSION['giohang_id'] as $key => $value) {
    $i++;
    $arr_cart_p_id[$i] = $value;
}

$i=0;
foreach($_SESSION['giohang_soluong'] as $key => $value) {
    $i++;
    $arr_cart_p_qty[$i] = $value;
}

$i=0;
foreach($_SESSION['giohang_giamoi'] as $key => $value) {
    $i++;
    $arr_cart_p_current_price[$i] = $value;
}

$i=0;
foreach($_SESSION['giohang_ten'] as $key => $value) {
    $i++;
    $arr_cart_p_name[$i] = $value;
}

$i=0;
foreach($_SESSION['giohang_img'] as $key => $value) {
    $i++;
    $arr_cart_p_featured_photo[$i] = $value;
}

unset($_SESSION['giohang_id']);
unset($_SESSION['giohang_soluong']);
unset($_SESSION['giohang_giamoi']);
unset($_SESSION['giohang_ten']);
unset($_SESSION['giohang_img']);

$k=1;
for($i=1;$i<=count($arr_cart_p_id);$i++) {
    if( $arr_cart_p_id[$i] == $_REQUEST['id']) {
        continue;
    } else {
        $_SESSION['giohang_id'][$k] = $arr_cart_p_id[$i];
        $_SESSION['giohang_soluong'][$k] = $arr_cart_p_qty[$i];
        $_SESSION['giohang_giamoi'][$k] = $arr_cart_p_current_price[$i];
        $_SESSION['giohang_ten'][$k] = $arr_cart_p_name[$i];
        $_SESSION['giohang_img'][$k] = $arr_cart_p_featured_photo[$i];
        $k++;
    }
}
header('location: cart.php');
?>
<?php require_once('footer.php'); ?>