<?php require_once("includes/connection.php"); ?>
<?php include "includes/header.php" ?>
<?php
	$id = 0;
	if (isset($_GET["id"])) {
		$id = intval($_GET['id']);
	}
	// Lấy ra nội dung bài viết theo điều kiện id
	$sql = "select * from posts where id = $id";
	// Thực hiện truy vấn data thông qua hàm mysqli_query
	$query = mysqli_query($conn,$sql);
?>
<link rel="shortcut icon" type="text/css" href="logo/logo1.PNG">
			<div class="innertube">
			<?php 
				while ( $data = mysqli_fetch_array($query) ) {
			?>
				<h3><?php echo $data['title']; ?></h3></div></ br>
				<i> Ngày tạo : <?php echo $data['createdate']; ?></i>
				<p><?php echo $data['content']; ?></p>
			<?php } ?>
			</div>
			<a href="index.php">Home</a>
		</main>
<?php include "includes/footer.php" ?>