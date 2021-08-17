<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Book vé</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/stl.css">
    <link rel="stylesheet" href="../css/style3.css">
    <link rel="stylesheet" type="text/css" href="../css/styles2.css">
	<script src="../js/js6.js"></script>
	<link rel="shortcut icon" href="../logo/logo1.PNG">
</head>
<style type="text/css">
	form{
		background-color: lightblue;
        border: 3px solid red;
        margin: 30px 450px 30px 450px;
        padding: 30px;
	}
</style>
<body>
	<nav>
		<input type="checkbox" id="check">
		<label for="check" class="checkbtn">
			<i class="fas fa-bars"></i>
		</label>
		<label class="logo"><a href="../index.php"><img src="../logo/logo1.png" width="300" height="200"></a></label>
		<ul>
			<li><a class="active" href="../index.php">Home</a></li>
			<?php 
                        if ($_SESSION['username']=='') {
                            echo "<li><a class='active' href='../dang_nhap.php' style='color: white;'>Phản hồi</a></li>";                        
                        }
                        elseif ($_SESSION['username']=='admin') {
                            echo " <li><a class='active' href='../admin/ds-phan-hoi.php' style='color: white;'>Phản hồi</a></li>";
                        }
                        else{
                            echo "<li><a class='active' href='../user/phan-hoi.php' style='color: white;'>Phản hồi</a></li>";
                        }
                         ?>
			<!-- <li><a class="active "href="../user/phan-hoi.php">Phản hồi</a></li> -->
		</ul>
	</nav>
<form method="post" action="">
	<label style="font-size: 30px;">Chọn loại phương tiện:</label> 
	<select style="font-size: 30px" name="loaixe">
		<option value="Máy Bay">Máy bay</option>
		<option value="Tàu Hỏa">Tàu hỏa</option>
		<option value="Ô Tô">Ô tô</option>
	</select><br>
	<label style="font-size: 30px;">Chọn ngày khởi hành:</label>
	<input type="date" name="nkh" style="font-size: 20px;"><br>
	<label style="font-size: 30px;">Chiều đi:</label><br>
	<input type="text" name="chieudi" style="font-size: 20px;"><br>
	<label style="font-size: 30px;">Chiều về:</label><br>
	<input type="text" name="chieuve" style="font-size: 20px;"><br><br>
	<input type="submit" name="xacnhan" value="Xác nhận" style="font-size: 20px; margin-left: 120px"><br><br>
<?php 
if (isset($_POST['xacnhan'])) {
	require '../connection.php';
	$db = mysqli_select_db($conn, 'travel');
	if ($db == null)
		echo "<br>Không chọn được Database";
	$loaixe = $_POST['loaixe']; 	
	$nkh = $_POST['nkh'];
	$chieudi = $_POST['chieudi'];
	$chieuve = $_POST['chieuve'];
	$sql = "INSERT INTO bookve (loaixe,ngaykhoihanh,chieudi,chieuve) VALUES ('$loaixe','$nkh','$chieudi','$chieuve')
		";
	if($conn->query($sql)==TRUE){
		echo "Đặt vé thành công!";
	}
	else{
		echo "Error creating table: ".$conn->error;
	}
	$conn->close();
	}
?>
</form>
</body>
</html>