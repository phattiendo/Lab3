<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: SanbongdaTiTeo.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styleTrangChu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    
    
</head>

<body>
    
    <script>
        var carousel = new bootstrap.Carousel(document.getElementById('carouselp'), {
           interval: 2000 // Đặt khoảng thời gian chuyển đổi giữa các ảnh (tính bằng mili giây)
        });

     </script>
    <script>
        const accountDropdown = document.getElementById("accountDropdown");
        const dropdownMenu = document.querySelector(".dropdown-menu");

        accountDropdown.addEventListener("click", (event) => {
        event.preventDefault();
        dropdownMenu.classList.toggle("show");
        });

    </script>
     <script>
        $(document).ready(function() {
           $('.carousel').carousel({
              interval: 3000 // Thời gian chuyển đổi tự động (3 giây)
           });
        });
     </script>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="listsankh.php"><i class="fas fa-futbol"></i> Sân bóng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="datsanonl.php"><i class="fas fa-calendar-plus"></i> Đặt sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.facebook.com/profile.php?id=100092591802235"><i class="fas fa-envelope"></i> Liên hệ</a>
                        </li>
                    </ul>
                    
                </div>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> Tài Khoản
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                        <li><a class="dropdown-item" href="QuanLyTaiKhoan.php"><i class="fas fa-user-circle"></i> Thông tin người dùng</a></li>
                        <li><a class="dropdown-item" href="resetpass.php"><i class="fas fa-key"></i> Đổi mật khẩu</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                    </ul>
                    </div>
            </div>
        </nav>

    <header class="text-center py-2 image-sandau" style="padding-top: 20px;">
        <div class="container" style="padding-top: 70px;">
            <h1 class="text-white text-shadow" style="font-size: 50px;">SÂN BÓNG ĐÁ TÍ TÈO</h1>
            <p class="lead text-white text-shadow">Chào mừng bạn đến với trang web cho thuê sân bóng đá. Hãy đặt sân ngay hôm nay.</p>

        </div>
    </header>
    <!-- <div class="container center-button">
        <a href="#" class="btn btn-primary btn-lg">Đặt sân ngay</a>
    </div> -->

    <section class=" text-center py-5 image-sandau" style="margin-top: 5px;">

            <div id="demo" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/sanbong12.jpg" alt="Sân bóng 1" class="d-block" style="width:100%; height: 90vh;" >
                        <div class="carousel-caption">
                            <h3>Sân bóng đá</h3>
                            <p>Chúng tôi có nhiều loại sân kể cả bạn có khó tính thì bạn cũng chịu</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/sanbong1.jpg" alt="Sân bóng 2" class="d-block" style="width:100%; height: 90vh;">
                        <div class="carousel-caption">
                            <h3>Giá cả hợp lý</h3>
                            <p>Giá thuê sân hợp lý, phù cho những siêu sao bóng đá. Hãy đặt sân ngay để trãi nghiệm mặt cỏ xanh mướt của chúng tôi</p>
                        </div> 
                    </div>
                    <div class="carousel-item">
                        <img src="images/sanbong3.jpg" alt="Sân bóng 3" class="d-block" style="width:100%; height: 90vh;">
                        <div class="carousel-caption">
                            <h3>Chất lượng đảm bảo</h3>
                            <p>Sân bóng đá của chúng tôi được thiết kế theo tiêu chuẩn 5 sao</p>
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
    
    <!-- </section> -->
    <section class="bg-light text-center py-5">
        <div class="container">
            <h2 class="mb-5">Các loại sân bóng đá của chúng tôi</h2>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">Sân cỏ nhân tạo 5 người</h4>
                            <p class="card-text">Sân bóng đá mini, thích hợp cho các trận đấu 5 người</p>
                            <div id="carousel1" class="carousel slide" data-bs-ride="carousel1">
                                <div class="carousel-inner">    
                                   <div class="carousel-item active">
                                      <img src="slideimage/anh1.jpg" class="d-block w-100" alt="Ảnh 1">
                                   </div>
                                   <div class="carousel-item">
                                      <img src="slideimage/anh2.jpg" class="d-block w-100" alt="Ảnh 2">
                                   </div>
                                   <div class="carousel-item">
                                      <img src="slideimage/anh3.jpg" class="d-block w-100" alt="Ảnh 3">
                                   </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
                                   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                   <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
                                   <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                   <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <br>
                            <a href="datsanonl.php" class="btn btn-primary">Đặt sân ngay</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">Sân cỏ nhân tạo 7 người</h4>
                            <p class="card-text">Được thiết kế để chơi bóng 7 người, một sự lựa chọn phổ biến.</p>
                            <div id="carousel2" class="carousel slide" data-bs-ride="carousel2">
                                <div class="carousel-inner">    
                                   <div class="carousel-item active">
                                      <img src="slideimage/anh1.jpg" class="d-block w-100" alt="Ảnh 1">
                                   </div>
                                   <div class="carousel-item">
                                      <img src="slideimage/anh2.jpg" class="d-block w-100" alt="Ảnh 2">
                                   </div>
                                   <div class="carousel-item">
                                      <img src="slideimage/anh3.jpg" class="d-block w-100" alt="Ảnh 3">
                                   </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
                                   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                   <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
                                   <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                   <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <br>
                            <a href="datsanonl.php" class="btn btn-primary ">Đặt sân ngay</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">Sân cỏ nhân tạo 11 người</h4>
                            <p class="card-text">Với chiều dài trung bình 100 mét và chiều rộng 65 mét, mặt sân được đánh giá 5 sao.</p>
                            <div id="carousel3" class="carousel slide" data-bs-ride="carousel3">
                                <div class="carousel-inner">    
                                   <div class="carousel-item active">
                                      <img src="slideimage/anh1.jpg" class="d-block w-100" alt="Ảnh 1">
                                   </div>
                                   <div class="carousel-item">
                                      <img src="slideimage/anh2.jpg" class="d-block w-100" alt="Ảnh 2">
                                   </div>
                                   <div class="carousel-item">
                                      <img src="slideimage/anh3.jpg" class="d-block w-100" alt="Ảnh 3">
                                   </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel3" data-bs-slide="prev">
                                   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                   <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel3" data-bs-slide="next">
                                   <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                   <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <br>
                            <a href="datsanonl.php" class="btn btn-primary">Đặt sân ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container short-footer">
            <p>&copy; 2023 Thuê sân bóng đá. All rights reserved.</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="TrangChu.php">Trang chủ</a></li>
                <li class="list-inline-item"><a href="listsankh.php">Sân bóng</a></li>
                <li class="list-inline-item"><a href="datsanonl.php">Đặt sân</a></li>
                <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=100092591802235">Liên hệ</a></li>
            </ul>
        </div>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-mBdHhWT4C7RbB0BJznVIT1H4lSBmgFs+rb8FShYzBewM3Kio2slrtK5DOA/3U4ix" crossorigin="anonymous"></script>
</body>

</html>