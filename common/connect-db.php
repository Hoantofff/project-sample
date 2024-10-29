<?php

$host = HOST_DB;
$port = PORT_DB;
$username = NAME_DB;

try {
  $conn = new PDO("mysql:host=$host; port=$port;dbname=$username", USERNAME_DB, PASSWORD_DB);
  
  // Cài đặt chế độ báo lỗi sử lý ngoại lệ
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  // Cài đặt chế trả dữ liệu
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
