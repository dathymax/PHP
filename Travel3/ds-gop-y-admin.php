<form action='' method='post'>
<?php
if (isset($_POST["gopy1"])) {
	require'connection.php';
	//Lựa chọn CSDL ở trên máy chủ
	$db = mysqli_select_db($conn, 'travel');
	if ($db == null)
		echo "<br>Không chọn được Database";
	$user = $_POST["name"];
	$gopy = $_POST["gopy"];
	$sql = "INSERT INTO gopy (username,gopy) VALUES ('$user','$gopy')
	";
	if($conn->query($sql)==TRUE){
		echo "<br>Phản hồi của khách hàng";
	}
	else{
		echo "Error : ".$conn->error;
	}
}
	require'connection.php';
	//Lựa chọn CSDL ở trên máy chủ
	$db = mysqli_select_db($conn, 'travel');
	if ($db == null)
		echo "<br>Không chọn được Database";
	$sql = "SELECT * FROM gopy";
	$result = $conn->query($sql);

	if($result->num_rows > 0){ //Nếu có dữ liệu trong bảng
		//output data of each row
		echo "<table border = '1'>".
					"<tr>
						<th>Check</th>
						<th>Id</th>
						<th>User</th>
						<th>Nội dung phản hồi</th>
					</tr>";
		while ($row = $result->fetch_assoc()) { //đọc dữ liệu từng dòng
			$id = $row["id"];
			$user = $row["username"];
			$gopy = $row["gopy"];
			echo "
					<tr>
						<td> <input type = 'checkbox' name = 'checkbox[]' value = '$id'></td>
						<td>".$id."</td>
						<td>".$user."</td>
			 			<td>".$gopy."</td>
			 		</tr>";
		}
		echo "</table>";
	}
	if (isset($_POST['delete'])) {		//Kiểm tra user đã bấm submit chưa
		if (isset($_POST['checkbox'])) {
			$chkarr = $_POST['checkbox'];
			foreach ($chkarr as $id) {
				$sql = "DELETE FROM gopy WHERE id = '$id'
				";
				if($conn->query($sql)==TRUE){
					echo "Bạn đã xóa góp ý của: $user <br>";
				}
				else{
					echo "Error creating table: ".$conn->error;
				}
			}
		}
	}
	if (isset($_POST["chinhsua"])) {
		if (isset($_POST['checkbox'])) {
			$chkarr = $_POST['checkbox'];
			foreach ($chkarr as $id) {
				$sql = "SELECT * FROM gopy WHERE id = '$id'";
				$result = $conn->query($sql);
				if($result->num_rows > 0){
					while ($row = $result->fetch_assoc()) {
						$id = $row["id"];
						$user = $row["username"];
						$gopy = $row["gopy"];
						echo "
							<form method='post' action=''>
							<input type='text' name='id' value='$id'><br>
							<input type='text' name='user' value='$user'><br>
							<input type='text' name='gopy' value='$gopy'><br>
							<input type='submit' name='capnhatid' value='Sửa'>
							</form>
							";
					}
				}
			}
		}
	}
	if (isset($_POST["capnhatid"])) {
		$id = $_POST["id"];
		$user = $_POST["user"];
		$gopy = $_POST["gopy"];
		$sql = "UPDATE gopy SET username = '$user', gopy = '$gopy' WHERE id = '$id'";
		if($conn->query($sql)==TRUE){
			echo "<br>Table gopy updated successfully";
		}
		else{
			echo "Error creating table: ".$conn->error;
		}
		$conn->close();
	}
		//while ($row = $result->fetch_assoc()) { //đọc dữ liệu từng dòng
			//$id = $row["userId"];
			// echo "<input type='text' name='user' value='$id'>";
			// echo "<input type='submit' name='capnhatid' value='Sửa'>";
		//}
	else{
		echo "0 result!";
	}
?>
 <input type="submit" id="submit" value="Xóa góp ý" name="delete" id="delete">
 <a href="ds-gop-y-admin.php"><input type="button" name="" value="Cập nhật"></a>
 <input type="submit" name="chinhsua" value="Chỉnh sửa"><br>
<a href="index.php">Home</a>
</form>
