<?php
$server_username = "root"; // thông tin đăng nhập host
$server_password = ""; // mật khẩu, trong trường hợp này là trống
$server_host = "localhost"; // host là localhost
$database = 'travel'; // database là website

// Tạo kết nối đến database dùng mysqli_connect()
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
// Thiết lập kết nối ủa chúng ta khi truy vấn là dạng UTF8 trong trường hợp dữ liệu là tiếng việt có dâu
mysqli_query($conn,"SET NAMES 'UTF8'");