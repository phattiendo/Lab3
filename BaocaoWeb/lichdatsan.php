<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Đặt sân bóng đá</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="styleTrangChu.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
      background-color: #E8E8E8;
    }
  </style>
  </head>
  <script>
        const accountDropdown = document.getElementById("accountDropdown");
        const dropdownMenu = document.querySelector(".dropdown-menu");

        accountDropdown.addEventListener("click", (event) => {
        event.preventDefault();
        dropdownMenu.classList.toggle("show");
        });

    </script>
  <body?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="TrangChuAdmin.php"><i class="fas fa-home"></i> Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listsanAdmin.php"><i class="fas fa-futbol"></i> Quản lý sân bóng</a>
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
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
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

  <?php
        require_once "Connect.php";
        session_start();
      $taikhoanht = $_SESSION['user'];
// Kết nối cơ sở dữ liệu và truy vấn dữ liệu lịch sử đặt sân của khách hàng
        $sql = "SELECT * from lichdatsan";
      $query = "SELECT lichdatsan.Ngaydat, lichdatsan.Thoigianbd, lichdatsan.Thoigiankt, lichdatsan.Soluong, lichdatsan.Loaisan, lichdatsan.Tensan, lichdatsan.Ghichu from lichdatsan INNER JOIN taikhoan ON lichdatsan.SDT = taikhoan.SDT AND '$taikhoanht' = lichdatsan.TenDN ORDER BY lichdatsan.Ngaydat DESC";
      $result = mysqli_query($conn, $sql);
      
    ?>

<!-- Form hiển thị lịch sử đặt sân -->
<div class="container mt-5">
  <h2 class="mb-4">Lịch đặt sân</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Tên tài khoản</th>
        <th scope="col">Ngày đặt sân</th>
        <th scope="col">Thời gian bắt đầu</th>
        <th scope="col">Thời gian kết thúc</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Loại sân</th>
        <th scope="col">Tên sân</th>
        <th scope="col">Ghi chú</th>
      </tr>
    </thead>
    <tbody>
      <?php if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['TenDN']; ?></td>
            <td><?php echo $row['Ngaydat']; ?></td>
            <td><?php echo $row['Thoigianbd']; ?></td>
            <td><?php echo $row['Thoigiankt']; ?></td>
            <td><?php echo $row['Soluong']; ?></td>
            <td><?php echo $row['Loaisan']; ?></td>
            <td><?php echo $row['Tensan']; ?></td>
            <td><?php echo $row['Ghichu']; ?></td>
            
          </tr>
        
    <?php } 
      }
      ?>
    </tbody>
  </table>
</div>
  </body>
