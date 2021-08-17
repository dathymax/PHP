<title>Tìm kiếm chuyến đi</title>
<form method="post" action="tim-kiem-chuyen-di-user.php">
	<caption><b style="font-size: 30px;">Tìm kiếm thông tin chuyến đi</b></caption><br>
	<?php 
        require'connection.php';
		//Lựa chọn CSDL ở trên máy chủ
		$db = mysqli_select_db($conn, 'travel');
		if ($db == null)
			echo "<br>Không chọn được Database";
		$sql = "SELECT * FROM bookve";
		$result = $conn->query($sql);
		if($result->num_rows < 0){ 
			
			while ($row = $result->fetch_assoc()) { //đọc dữ liệu từng dòng
				echo "0 result!";
			}
		}
		else{
			echo "Chiều đi: ";
			echo "<select name= chieudi>";
			while($row = $result->fetch_assoc()){
				$id=$row["id"]; 
				$chieudi=$row["chieudi"];
				echo "<option value = '$chieudi' >".$chieudi."</option>";
			}
			echo "</select>";echo "<br>";
		}
    ?>
	<input type="submit" name="timkiem" value="Tìm kiếm">
</form>
<form method="post" action="">
<?php 
	if (isset($_POST['timkiem'])) {
	require 'connection.php';
	//Lựa chọn CSDL ở trên máy chủ
	$db = mysqli_select_db($conn, 'travel');
	if($db == null)
		echo "<br>Không chọn được Database";
	//sql to select Data

	$chieudi = $_POST['chieudi'];
	
	$sql = "SELECT * FROM bookve WHERE chieudi = '$chieudi' ";
	$result = $conn->query($sql);
	if($result->num_rows > 0){ //Nếu có dữ liệu trong bảng
		//output data of each row
		echo "<table border = '1'>
			<caption><b> Danh sách chuyến đi </b></caption>
					<tr>
						<th>ID</th>
						<th>Loại phương tiện</th>
						<th>Ngày đặt vé</th>
						<th>Ngày khởi hành</th>
						<th>Chiều đi</th>
						<th>Chiều về</th>
					</tr>";
		while ($row = $result->fetch_assoc()) { //đọc dữ liệu từng dòng
			$id=$row["id"];
			echo "
					<tr>
						<td>".$row["id"]."</td>
			 			<td>".$row["loaixe"]."</td>
			 			<td>".$row["ngaydatve"]."</td>
			 			<td>".$row["ngaykhoihanh"]."</td>
			 			<td>".$row["chieudi"]."</td>
			 			<td>".$row["chieuve"]."</td>
			 		</tr>";
		}
		echo "</table>";
	}else{
		echo "0 result! <br>";
	}
}
	$conn->close();
 ?>
<a href="tim-kiem-chuyen-di-user.php"><input type="button" name="" value="Trở về"></a>
<a href="../index.php">Home</a>
<p>Nếu bạn muốn hủy, vui lòng liên hệ admin!</p>
</form>