<?php
	session_start(); 
 ?>
<?php require_once("connection.php");?>
<?php include("permission.php");?>
<?php include ("header.php"); ?>
<?php
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$title = $_POST["title"];
		$content = $_POST["content"];
		$is_public = 0;
		if (isset($_POST["is_public"])) {
			$is_public = $_POST["is_public"];
		}
		
		$user_id = $_SESSION["user_id"];

		$sql = "INSERT INTO posts(title, content, user_id, is_public, createdate, updatedate ) VALUES ( '$title', '$content', '$user_id', '$is_public', now(), now())";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql);
		echo "Phản hồi thành công";
	}

?>

	<form action="phan-hoi.php" method="post">
		<table>
			<tr>
				<td colspan="2"><h3>Thêm bài viết mới</h3></td>
			</tr>	
			<tr>
				<td nowrap="nowrap">Tiêu đề bài viết :</td>
				<td><input type="text" id="title" name="title"></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Nội dung :</td>
				<td><textarea name="content" id="content" rows="10" cols="150"></textarea></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Public bài viết ? :</td>
				<td><input type="checkbox" id="is_public" name="is_public" value="1"> public</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Phản hồi"></td>
			</tr>
			<tr>
				<td>
					<a href="../index.php">Home</a>
				</td>
			</tr>

		</table>
		
	</form>
<?php include "footer.php" ?>