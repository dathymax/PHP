<form method="post" action="tim-kiem-chuyen-di-admin.php">
	<caption><b style="font-size: 30px;">Tìm kiếm thông tin chuyến đi</b></caption><br>
	<?php 
        require'includes/connection.php';
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
	require 'includes/connection.php';
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
						<th>Check</th>
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
						<td> <input type = 'checkbox' name = 'checkbox[]' value = '$id'></td>
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
	if (isset($_POST['delete'])) {		//Kiểm tra user đã bấm submit chưa
		if (isset($_POST['checkbox'])) {
			require 'includes/connection.php';
			//Lựa chọn CSDL ở trên máy chủ
			$db = mysqli_select_db($conn, 'travel');
			if($db == null)
				echo "<br>Không chọn được Database";
			$chkarr = $_POST['checkbox'];
			foreach ($chkarr as $id) {
				$sql = "DELETE FROM bookve WHERE id = '$id'";
				if($conn->query($sql)==TRUE){
					echo "Bạn đã chuyến đi: $id <br>";
				}
				else{
					echo "Error: ".$conn->error;
				}
			}
		}
	}
	if (isset($_POST["chinhsua"])) {
		if (isset($_POST['checkbox'])) {
			require 'includes/connection.php';
			//Lựa chọn CSDL ở trên máy chủ
			$db = mysqli_select_db($conn, 'travel');
			if($db == null)
				echo "<br>Không chọn được Database";
			$chkarr = $_POST['checkbox'];
			foreach ($chkarr as $id) {
				$sql = "SELECT * FROM bookve WHERE id = '$id'";
				$result = $conn->query($sql);
				if($result->num_rows > 0){
					while ($row = $result->fetch_assoc()) {
						$id = $row['id'];
						$loaixe = $row["loaixe"];
						$ngaydatve = $row['ngaydatve'];
						$ngaykhoihanh = $row['ngaykhoihanh'];
						$chieudi = $row['chieudi'];
						$chieuve = $row['chieuve'];
						echo "
							<form method='post' action='tim-kiem-chuyen-di-admin.php'>
							<input type='text' name='id' value='$id'><br>
							<input type='text' name='loaixe' value='$loaixe'><br>
							<input type='text' name='ngaydatve' value='$ngaydatve'><br>
							<input type='text' name='ngaykhoihanh' value='$ngaykhoihanh'><br>
							<input type='text' name='chieudi' value='$chieudi'><br>
							<input type='text' name='chieuve' value='$chieuve'><br>
							<input type='submit' name='capnhatid' value='Sửa'>
							</form>
							";
					}
				}
			}
		}
	}
	if (isset($_POST["capnhatid"])) {
		require 'includes/connection.php';
		//Lựa chọn CSDL ở trên máy chủ
		$db = mysqli_select_db($conn, 'travel');
		if($db == null)
			echo "<br>Không chọn được Database";
		$id = $_POST['id'];
		$loaixe = $_POST["loaixe"];
		$ngaydatve = $_POST['ngaydatve'];
		$ngaykhoihanh = $_POST['ngaykhoihanh'];
		$chieudi = $_POST['chieudi'];
		$chieuve = $_POST['chieuve'];
		$sql = "UPDATE bookve SET id = '$id', loaixe = '$loaixe', ngaydatve = '$ngaydatve', ngaykhoihanh = '$ngaykhoihanh', chieudi = '$chieudi', chieuve = '$chieuve' WHERE id='$id' ";
		if ($conn->query($sql)==TRUE) {
			echo "Update successfull!";
		}
		else{
			echo "Update failed!".$conn->error;
		}
	}

// else{
// 		echo "0 result! <br>";
// 	}

	$conn->close();
 ?>
<input type="submit" id="submit" value="Xóa chuyến đi" name="delete" id="delete">
<input type="submit" name="chinhsua" value="Chỉnh sửa">
<a href="tim-kiem-chuyen-di-admin.php"><input type="button" name="" value="Trở về"></a>
<a href="../index.php">Home</a>
</form>