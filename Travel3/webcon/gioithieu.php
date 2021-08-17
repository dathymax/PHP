<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Giới thiệu</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../logo/logo1.PNG">
    <style type="text/css">
    	#col_left {
    		background-color: white;
    		width: 50%;
    		height: 737.5px;
    		padding-left: 100px;
    		padding-top: 80px;
    	}
    	#col_right{
        	background-color: black ;
        	width: 50%;
    		height: 737.5px;
        }
    	ul{
            display: inline;
            list-style-type: none;
            padding: 20px;
            overflow: hidden;
        }
    	li a{
            display: block;
            list-style-type: none;
            padding: 20px;

        } 
        li{
            float: left ;
            margin-left: 115px;
        }
        body{
        	background-color: black;
        }
        
        #wel{
        	padding-left: 140px;
        	padding-top: 120px;
        }
        #wel1{
        	padding-left: 140px;
        	padding-top: 30px;
        }
        .element {
            position: relative;
        }
    </style>
</head>
<body>
	<div>
        <div class="row">
            <div  id="col_left">
                <div>
                    <img src="../logo/logo1.PNG" alt="DTD">
                </div>
            </div>
            
            <div id="col_right">
                <div class="note" style="background-color: black; font-family: Arial; font-size: 20px;">
                	<ul>
						<li><a class='active' href='../index.php' style='color: white;'>Home</a></li>
						<li><a class='active' href='#' style='color: white;'>Liên hệ</a></li>
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
                        <!-- <li><a class="active" href="#" style="color: white;">Phản hồi</a></li><br> -->
					</ul>
                </div>
                 <div id="wel" style="color: white; font-family: Arial; font-size: 50px;">
               		<p>Welcome</p>
				</div>
				<div id="wel1" style="color: white; font-family: Arial; font-size: 20px;">
               		<p>Góc Review</p> 
                    Đến với chúng tôi, bạn sẽ được tư vấn về các địa điểm du lịch nổi tiếng của Việt Nam.
				</div>
                <p>&nbsp</p>
                <p>&nbsp</p>
                <p>&nbsp</p>
                <p>&nbsp</p>
                <div style="color: white; font-family: Arial;padding-left: 140px">
                    <p>info@mysite.com</p>
                </div>
                <div class="home__social" style="color: white; font-family: Arial; font-size: 20px; padding-left: 140px;">
                    <a href="https://www.facebook.com/" target="blank"><ion-icon name="logo-facebook" class="home__social-icon"></ion-icon></a>
                    <a href="https://www.instagram.com/accounts/login/" target="blank"><ion-icon name="logo-instagram" class="home__social-icon"></ion-icon></a>
                    <a href="https://twitter.com/" target="blank"><ion-icon name="logo-twitter" class="home__social-icon"></ion-icon></a>
                </div>
            </div>
        	
        </div>
    </div>
    <!-- ICONS -->
    <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>