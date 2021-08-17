<!--Background của header-->
    <div class="Bg-header">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
            </ol>
                <div class="carousel-inner">
              <div class="carousel-item active">
                    <img src="img/TQ.jpg" class="d-block w-100" alt="Tuyen Quang" height="500">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
              </div>
              <div class="carousel-item">
                    <img src="img/NB.jpg" class="d-block w-100" alt="Ninh Binh" height="500">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
              </div>
               <div class="carousel-item">
                    <img src="img/HD.jpg" class="d-block w-100" alt="Hai Duong" height="500">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
              </div>
               <div class="carousel-item">
                    <img src="img/HN.jpg" class="d-block w-100" alt="Ha Noi" height="500">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
              </div>
               <div class="carousel-item">
                    <img src="img/ND.jpg" class="d-block w-100" alt="Nam Dinh" height="500">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
              </div>
               <div class="carousel-item">
                    <img src="img/HY.jpg" class="d-block w-100" alt="Hung Yen" height="500">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
              </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
       </a>
  </div>
    <div class="menu">
        <div class="row" style=" position: relative ; top: -450px;" >
            <div class="col-sm-6">
                <ul style="margin-left: 70px; top: -150px;">
                    <li><a href="index.php" >Trang chủ</a></li>
                    <li style="color: white">/</li>
                    <li><a href="gopy1.php" target="_blank" >Góp ý</a></li>
                    <li style="color: white">/</li>
                    <li><a href="webcon/gioithieu.php" >Giới thiệu</a></li>
                </ul>
            </div>
            <div class="col-sm-6">
                <ul style="margin-left: 150px;">
                    <li><a href="webcon/bookve.php" >Book vé</a></li>
                    <li style="color: white">/</li>
                    <?php 
                        if ($_SESSION['username']=='') {
                            echo "<li><a href='dang_nhap.php'>Đăng nhập</a></li>";
                            echo "<li style='color: white'>/</li>";
                            echo "<li><a href='dang_ky.php'>Đăng ký</a></li>";                            
                        }
                        elseif ($_SESSION['username']=='admin') {
                            echo " <li><a href = 'admin/quan-ly-thanh-vien.php'> Xin chào ".$_SESSION['username']." <a href='dang_xuat.php'>&emsp;Đăng xuất</a></li>";
                        }
                        else{
                            echo "<li><a href = 'user/thong-tin-thanh-vien.php?username=".$_SESSION['username']."'> Xin chào ".$_SESSION['username']." <a href='dang_xuat.php'>&emsp;Đăng xuất</a></li>";
                        }
                     ?>
                    
                </ul>
            </div>
        </div>
    </div>
</div>