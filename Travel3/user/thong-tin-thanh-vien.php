<?php include ("../admin/includes/header.php"); ?>
<?php
	require "connection.php";
	$username = $_GET["username"];

	$result = $conn->query("select * from users where username = '$username'");

	while ($row = $result->fetch_assoc())
	{
		$fullname = $row["fullname"];
		$pass = $row["password"];
		$email = $row["email"];
		echo "<form method = 'post' action=''>";
		echo "Ho ten: <input type = 'text' name = 'name' value = '$fullname'>";
		echo "<br>Mat khau: <input type = 'text' name = 'pass' value = '$pass'>";
		echo "<br>Email: <input type = 'text' name = 'email' value = '$email'>";
		echo "<br><input type='submit' name='capnhat' value = 'Cap nhat'>";
		echo "</form>";
	}
	if (isset($_POST["capnhat"])) {
		$name = $_POST["name"];
		$pass = $_POST["pass"];
		$email = $_POST["email"];
		$sql = "UPDATE users SET fullname = '$name', password = '$pass' , email = '$email' WHERE username = '$username'";
		if($conn->query($sql)==TRUE){
			echo "<br>Table User updated successfully";
		}
		else{
			echo "Error creating table: ".$conn->error;
		}
		$conn->close();
	}
?>
<form>
	<a href = '../index.php'>Home</a><br>
	<a href = 'phan-hoi.php'>Phản hồi</a><br>
	<a href="tim-kiem-chuyen-di-user.php">Tìm kiếm chuyến đi</a>
</form>
<?php include "footer.php" ?>