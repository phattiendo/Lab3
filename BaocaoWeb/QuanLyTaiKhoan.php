<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header('Location: SanbongdaTiTeo.php');
        exit();
    }
    $tenDN = $_SESSION['user'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sanbongdatiteo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM taikhoan WHERE TenDN = '$tenDN' ";
            $result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styleTrangChu.css">

    <style>
    .table{
        text-align: center;
    }
    th,td{
        padding: 10px;
    }
    body {
      background-color: #E8E8E8;
    }
    .image-sandau{
    background-image: url('images/sanc1.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    }

    .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    font-family: 'Kanit', sans-serif;
}

.text-shadow{
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}
    </style>

</head>

<body >

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="TrangChu.php"><i class="fas fa-home"></i> Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listsankh.php"><i class="fas fa-futbol"></i> Sân bóng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="datsanonl.php"><i class="fas fa-calendar-plus"></i> Đặt sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="QuanLyTaiKhoan.php"><i class="fa fa-user-cog"></i> Quản lý tài khoản</a>
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
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-circle"></i> Thông tin người dùng</a></li>
                        <li><a class="dropdown-item" href="resetpass.php"><i class="fas fa-key"></i> Đổi mật khẩu</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                    </ul>
                    </div>
            </div>
        </nav>
<header class="bg-success text-center py-2 image-sandau" style="padding-top: 20px;">
    <div class="container" style="padding-top: 70px;">
        <h1 class="text-white text-shadow">SÂN BÓNG ĐÁ TÍ TÈO</h1>
        <p class="lead text-white text-shadow">Chào mừng bạn đến với trang web cho thuê sân bóng đá. Hãy đặt sân ngay hôm nay.</p>
    </div>
</header>

<div class="container mt-5" style="padding-top: 20px;">
  <h2 class="mb-4 text-center">Thông tin tài khoản của bạn</h2>
  <table class="table">
    <thead>
      <tr>

        <th scope="col">Họ và tên</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Tên đăng nhập</th>
        <th scope="col">Mật khẩu</th>
        <th scope="col">Câu hỏi</th>
        <th scope="col">Câu trả lời</th>
      </tr>
    </thead>
    <tbody>
      <?php if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>

            <td><?php echo $row['Hovaten']; ?></td>
            <td><?php echo $row['SDT']; ?></td>
            <td><?php echo $row['TenDN']; ?></td>
            <td><?php echo $row['MatKhau']; ?></td>
            <td><?php echo $row['Cauhoi']; ?></td>
            <td><?php echo $row['Traloi']; ?></td>            
          </tr>
        
    <?php 
    } 
    }else {
        echo "Không tìm thấy thông tin tài khoản";
    }
    $conn->close();
      ?>
    </tbody>
  </table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-mBdHhWT4C7RbB0BJznVIT1H4lSBmgFs+rb8FShYzBewM3Kio2slrtK5DOA/3U4ix" crossorigin="anonymous"></script>
</body>

</html>