<?php
    session_start();
    // if (!isset($_SESSION['user'])) {
    //     header('Location: SanbongdaTiTeo.php');
    //     exit();
    // }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sanbongdatiteo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM danhsachsan";
            $result = $conn->query($sql);
?>
<script>
        var carousel = new bootstrap.Carousel(document.getElementById('carouselp'), {
           interval: 2000 // Đặt khoảng thời gian chuyển đổi giữa các ảnh (tính bằng mili giây)
        });

     </script>
</script>
     <script>
        $(document).ready(function() {
           $('.carousel').carousel({
              interval: 3000 // Thời gian chuyển đổi tự động (3 giây)
           });
        });
     </script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styleTrangChu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
      background-color: #E8E8E8;
    }
  </style>
</head>

<body class="">
    
    
    <script>
        const accountDropdown = document.getElementById("accountDropdown");
        const dropdownMenu = document.querySelector(".dropdown-menu");

        accountDropdown.addEventListener("click", (event) => {
        event.preventDefault();
        dropdownMenu.classList.toggle("show");
        });

    </script>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top " >
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="listsanAdmin.php"><i class="fas fa-futbol"></i> Quản lý sân bóng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lichdatsan.php"><i class="fas fa-calendar-alt"></i> Lịch đặt sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ThanhtoanTT.php"><i class="fas fa-file-invoice"></i> Tạo hóa đơn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="QuanLyTaiKhoanAdmin.php"><i class="fas fa-user-cog"></i> Quản lý tài khoản</a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle "  href="#" role="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> Tài Khoản
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                        <li><a class="dropdown-item" href="resetpass.php"><i class="fas fa-key"></i> Đổi mật khẩu</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                    </ul>
                    </div>
            </div>
        </nav>

        <header class="text-center py-2 image-sandau" style="padding-top: 20px;">
        <div class="container" style="padding-top: 70px;">
            <h1 class="text-white text-shadow" style="font-size: 50px;">WEBSITE ADMIN</h1>

        </div>
    </header>

    <section class=" text-center py-5 image-sandau" style="margin-top: 5px;">

            <div id="demo" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/admin4.jpg" alt="" class="d-block" style="width:100%; height: 90vh;" >
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/admin5.jpg" alt="" class="d-block" style="width:100%; height: 90vh;">
                        <div class="carousel-caption">
                        </div> 
                    </div>
                    <div class="carousel-item">
                        <img src="images/admin7.jpg" alt="" class="d-block" style="width:100%; height: 90vh;">
                        <div class="carousel-caption">
                        </div>  
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                </button>
            </div>
    </section>
    <br>

    

    
    
    <!-- </section> -->

    <footer class="">
        <div class="container">
            <p>&copy; 2023 Thuê sân bóng đá. All rights reserved.</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="TrangChuAdmin.php">Trang chủ</a></li>
                <li class="list-inline-item"><a href="listsanAdmin.php">Quản lý sân bóng</a></li>
                <li class="list-inline-item"><a href="ThanhtoanTT.php">Tạo hóa đơn</a></li>
                <li class="list-inline-item"><a href="QuanLyTaiKhoanAdmin.php">Quản lý tài khoản</a></li>
            </ul>

        </div>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-mBdHhWT4C7RbB0BJznVIT1H4lSBmgFs+rb8FShYzBewM3Kio2slrtK5DOA/3U4ix" crossorigin="anonymous"></script>
</body>

</html>