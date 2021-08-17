<?php 
session_start();
 ?>
<?php 
    if (!isset($_SESSION["username"]))
    {
        $_SESSION["username"] = "";
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Góp ý</title>
	<link rel="shortcut icon" href="logo/logo1.PNG">
</head>
<body>
	<?php 
        if ($_SESSION['username']=='') {
            echo "<a href='dang_nhap.php'>Đăng nhập</a>";                          
        }
        elseif ($_SESSION['username']=='admin') {
            echo "<a href = 'admin/quan-ly-thanh-vien.php'> Xin chào ".$_SESSION['username']." <a href='ds-gop-y-admin.php'>Xem danh sách góp ý</a>";
        }
        else{
            echo "<form method = 'post' action = ''>
            		Tên người dùng: <input type='text' name='name'><br>
					Nội dung góp ý: <input type='text' name='gopy'><br>
					<input type='submit' name='gopy1' value='Góp ý'>";
			echo "</form>";

        }
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
								<td>".$id."</td>
								<td>".$user."</td>
					 			<td>".$gopy."</td>
					 		</tr>";
				}
				echo "</table>";
			}
    ?>
<a href="index.php">Home</a>
</body>
</html>
