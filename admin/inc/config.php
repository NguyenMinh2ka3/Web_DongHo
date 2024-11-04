<?php
// Tên Host
$dbhost = 'localhost';

// Tên database
$dbname = 'shop_dongho';

// Tên user
$dbuser = 'root';

// tên password
$dbpass = '';

// Đường dẫn mặc định 
define("BASE_URL", "http://localhost/web_dongho/");
try {
	$pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $exception ) {
	echo "Kết nối thất bại :" . $exception->getMessage();
}