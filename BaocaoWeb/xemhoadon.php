<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Thanh toán hóa đơn.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="styleTrangChu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
      background-color: #E8E8E8;
    }
  </style>
  </head>

  <body >
  <script>
        const accountDropdown = document.getElementById("accountDropdown");
        const dropdownMenu = document.querySelector(".dropdown-menu");

        accountDropdown.addEventListener("click", (event) => {
        event.preventDefault();
        dropdownMenu.classList.toggle("show");
        });

    </script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                            <a class="nav-link" href="TrangChuAdmin.php"><i class="fas fa-home"></i> Trang chủ</a>
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
                    <a class="nav-link dropdown-toggle " href="#" role="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
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
            <h1 class="text-white text-shadow" style="font-size: 50px;">WEBSITE ADMIN</h1>

        </div>
    </header>
    <tbody>
<?php
  require_once "Connect.php";
  session_start();
       $taikhoanht = $_SESSION['hovaten'];
// Kết nối cơ sở dữ liệu và truy vấn dữ liệu lịch sử đặt sân của khách hàng
      $query = "SELECT DISTINCT * from khachhang where Hovaten = '$taikhoanht'";
      $result = mysqli_query($conn, $query);
      
    ?>

<!-- Form hiển thị lịch sử đặt sân -->
<div class="container mt-5">
  <h2 class="mb-4">Hóa đơn của khách hàng.</h2>
  <table class="table">
    <thead>
      <tr>

        <th style="text-align:center;" scope="col">Họ và tên khách hàng</th>
        <th style="text-align:center;" scope="col">Số điện thoại</th>
        <th style="text-align:center;" scope="col">Tên sân</th>
        <th style="text-align:center;" scope="col">Loại sân</th>
        <th style="text-align:center;" scope="col">Ngày đặt</th>
        <th style="text-align:center;" scope="col">Thời gian đặt</th>
        <th style="text-align:center;" scope="col">Giá tiền</th>
        <th style="text-align:center;" scope="col">Phương thức thanh toán</th>
      </tr>
    </thead>
    <tbody>
      <?php if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>

            <td style="text-align:center;"><?php echo $row['Hovaten']; ?></td>
            <td style="text-align:center;"><?php echo $row['SDT']; ?></td>
            <td style="text-align:center;"><?php echo $row['Tensan']; ?></td>
            <td style="text-align:center;"><?php echo $row['Loaisan']; ?></td>
            <td style="text-align:center;"><?php echo $row['Ngaydat']; ?></td>
            <td style="text-align:center;"><?php echo $row['Thoigian']; ?></td>
            <td style="text-align:center;"><?php echo $row['Giatien']; ?></td>
            <td style="text-align:center;"><?php echo $row['Pttt']; ?></td>
           
          </tr>
        
    <?php } 
      }
      ?>
    </tbody>
  </table>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-DUTJkclRpVGKp5TnycGd3mk+6eRoD9Kym2eX48sNr5FV9KVZP5oAM8p0m17ITs/e" crossorigin="anonymous"></script>
  </body>
</html>