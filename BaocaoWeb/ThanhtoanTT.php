<?php
  require 'C:\xampp\htdocs\BaocaoWeb\fpdf186\fpdf.php';
  require_once "Connect.php";
  session_start();
  // require_once "./send_mail.php";
  $error = '';
  $hovaten = '';
  $sdt = '';
  $ngaydat = '';
  $thoigiandat = '';
  $giatien = '';
  $loaisan = '';
  $tensan = '';
  $pttt = '';
  $sussess = '';


  if (isset($_POST['hovaten']) && isset($_POST['sdt']) && isset($_POST['tensan'])
    && isset($_POST['loaisan']) && isset($_POST['ngaydat']) && isset($_POST['thoigiandat']) && isset($_POST['giatien']) && isset($_POST['pttt']))
    {
        $hovaten = $_POST['hovaten'];

        $sdt = $_POST['sdt'];
        $ngaydat = $_POST['ngaydat'];
        $thoigiandat = $_POST['thoigiandat'];
        $giatien = $_POST['giatien'];
        $pttt = $_POST['pttt'];
        $loaisan = $_POST['loaisan'];
        $tensan = $_POST['tensan'];

        

        if (empty($hovaten)) {
            $error = 'Vui lòng nhập họ và tên của khách hàng';
        }
        else if (empty($sdt)) {
            $error = 'Vui lòng nhập số điện thoại';
        }
        else if (empty($tensan)) {
            $error = 'Vui lòng chọn tên sân';
        }
        else if (empty($loaisan)) {
          $error = 'Vui lòng chọn loại sân';
      }
        else if (empty($ngaydat)) {
            $error = 'Vui lòng chọn ngày đặt';
        }
        else if (empty($thoigiandat)) {
            $error = 'Vui lòng nhập thời gian đặt sân của khách hàng';
        }
        else if (empty($giatien)) {
            $error = 'Vui lòng nhập giá tiền';
        }
        else{
          $sqlselect = "SELECT * FROM khachhang where Hovaten = '$hovaten'";
          $result = mysqli_query($conn, $sqlselect);
          if (mysqli_num_rows($result) <= 0) {
            $sql = "INSERT INTO khachhang values ('$hovaten', '$sdt', '$tensan', '$loaisan', '$ngaydat', '$thoigiandat', '$giatien', '$pttt')";
            if ($conn->query($sql) === true) {
              $_SESSION['hovaten'] = $hovaten;
              $sussess = 'Thêm hóa đơn mới thành công!';
            }
            else{
              $error = 'Thêm hóa đơn mới thất bại!';
            }
          }
          else{
            $sqlupdate = "UPDATE khachhang SET Tensan = '$tensan',Loaisan = '$loaisan',Ngaydat = '$ngaydat' ,Thoigian = '$thoigiandat',Giatien = '$giatien' , Pttt = '$pttt'  where Hovaten = '$hovaten'";
            if ($conn->query($sqlupdate) === true) {
              $_SESSION['hovaten'] = $hovaten;
              $sussess = 'Cập nhật hóa đơn thành công!';
            }
            else{
              $error = 'cập nhật hóa đơn thất bại!';
            }
          }
    }
  }
  
  

?>


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
                            <a class="nav-link" href="listsanAdmin.php"><i class="fas fa-futbol"></i> Quản lý sân bóng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lichdatsan.php"><i class="fas fa-calendar-alt"></i> Lịch đặt sân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.facebook.com/profile.php?id=100092591802235"><i class="fas fa-envelope"></i> Liên hệ</a>
                        </li>
                    </ul>
                    
                </div>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle " href="#" role="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> Tài Khoản
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                        <li><a class="dropdown-item" href="QuanLyTaiKhoanAdmin.php"><i class="fas fa-user-circle"></i> Thông tin người dùng</a></li>
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
        
    <div class="container mt-4" style="padding-top: 30px">
    
      <h2 class="text-center mb-4" style="font-size: 50px; ">Tạo Hóa đơn</h2>
      
      <form form method="post" action="ThanhtoanTT.php" novalidate>
      <div class="row">
      <div class="col-md-4">
        <h4 class="mb-3">Thông tin khách hàng đặt sân</h4>
          <div class=" mb-3">
            <label for="user" class="form-label">Họ và tên của khách hàng</label>
            <input value="<?= $hovaten?>" name="hovaten" type="text" class="form-control" id="hovaten" required>
          </div>
          <div class=" mb-3">
            <label for="sdt" class="form-label">Số điện thoại:</label>
            <input value="<?= $sdt?>" name="sdt" type="tel" class="form-control" id="sdt" pattern="[0-9]{10}" required>
          </div>
      </div>
      <div class="col-md-8">
        <div class="row">
        <h4 class="mb-3">Thông tin đơn đặt hàng</h4>
        <table class="table">
          <thead>
            <tr>
              <th style="text-align:center;" scope="col">Tên sân</th>
              <th style="text-align:center;" scope="col">Loại sân</th>
              <th style="text-align:center;" scope="col">Ngày đặt</th>
              <th style="text-align:center;" scope="col">Thời gian đặt</th>
              <th style="text-align:center;" scope="col">Giá tiền</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="text-align:center;">
                  <div>
                  <select class="form-control" id="tensan" name="tensan" value="<?= $tensan?>">
                    <option >Sân A</option>
                    <option >Sân B</option>
                    <option >Sân C</option>
                    <option >Sân D</option>
                    <option >Sân E</option>
                    <option >Sân F</option>
                    <option >Sân G</option>
                    <option >Sân H</option>
                  </select>
                </div>
              </td>
              <td style="text-align:center;">
                <div>
                  <select class="form-control" id="loaisan" name="loaisan" value="<?= $loaisan?>">
                    <option >Sân 5 người</option>
                    <option >Sân 7 người</option>
                    <option >Sân 11 người</option>
                  </select>
                </div>
              </td>
              <td style="text-align:center;">
                <div>
                  <input value="<?= $ngaydat?>" name="ngaydat" type="date" class="form-control" id="ngaydat" required>
                </div>
              </td>
              <td style="text-align:center;">
                <div>
                  <input value="<?= $thoigiandat?>" name="thoigiandat" type="number" class="form-control" id="thoigiandat" min="1">
                </div>
              </td>
              <td style="text-align:center;">
                <div>
                  <input value="<?= $giatien?>" name="giatien" type="text" class="form-control" id="giatien">
                </div>
              </td>
            </tr>
          </tbody>
        </table>  
          
          
        </div>
        
        <div class="mb-3">
          <label for="pttt" class="form-label">Phương thức thanh toán:</label>
          <select class="form-control" id="pttt" name="pttt" value="<?= $pttt?>">
              <option >Thanh toán trực tiếp</option>
              <option >Thanh toán trực tuyến</option>
            </select>
        </div>
        <div class="text-center">
          <?php
            if (!empty($error)) {
               echo "<div class='alert alert-danger'>$error</div>";
            }
            else if(!empty($sussess)){
              echo "<div class='alert alert-success'>$sussess</div>"; 
            }
          ?>
          <button class="btn btn-primary" id="exportButton">Xuất hóa đơn PDF</button>
          <a href="xemhoadon.php" class="btn btn-primary">Xem hóa đơn</a>
        </div>
        
        </div>
      </form>
      
    </div>
   
    <script>
        document.getElementById("exportButton").addEventListener("click", function() {
            // Gửi yêu cầu xuất PDF đến máy chủ PHP
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "ThanhtoanTT.php", true);
            xhr.responseType = "blob"; // Để xử lý file dạng blob
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Tạo một đường dẫn URL cho file PDF và tải nó về
                    var blob = new Blob([xhr.response], { type: "application/pdf" });
                    var url = window.URL.createObjectURL(blob);
                    var a = document.createElement("a");
                    a.href = url;
                    a.download = "hoa_don.pdf"; // Tên file khi tải về
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                }
            };
            xhr.send();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-DUTJkclRpVGKp5TnycGd3mk+6eRoD9Kym2eX48sNr5FV9KVZP5oAM8p0m17ITs/e" crossorigin="anonymous"></script>
    
  </body>
</html>





<?php

$sqlselect2 = "SELECT * FROM khachhang where Hovaten = '$hovaten'";
  $result2 = mysqli_query($conn, $sqlselect2);
    
    $pdf = new FPDF();
    $pdf->AddPage();

    // Đặt font và kích thước chữ
    $pdf->SetFont('Arial', 'B', 16);

    // Tiêu đề hóa đơn
    $pdf->Cell(0, 10, 'HÓA ĐƠN', 0, 1, 'C');
    $pdf->Cell(0, 10, '---------------------------------', 0, 1, 'C');

    // Thông tin khách hàng
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(50, 10, 'Tên khách hàng:', 0);
    $pdf->Cell(0, 10, $hovaten, 0, 1);

    $pdf->Cell(50, 10, 'Số điện thoại:', 0);
    $pdf->Cell(0, 10, $sdt, 0, 1);



    $pdf->Ln(10); // Dòng trống


    // Bảng chi tiết sản phẩm
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, 'Ngày đặt', 1);
    $pdf->Cell(40, 10, 'Thời gian đặt', 1);
    $pdf->Cell(40, 10, 'Giá tiền', 1);
    $pdf->Cell(40, 10, 'Loại sân', 1);
    $pdf->Cell(40, 10, 'Tên sân', 1);
    $pdf->Cell(40, 10, 'Phương thức thanh toán', 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 12);
    $totalAmount = 0;

// Tính tổng tiền và hiển thị từng sản phẩm
if(mysqli_num_rows($result2) > 0) {
  while ($row = mysqli_fetch_assoc($result2)) {
    $totalAmount = $giatien * $thoigiandat;

    $pdf->Cell(40, 10, $ngaydat, 1);
    $pdf->Cell(30, 10, $thoigiandat, 1);
    $pdf->Cell(30, 10, $giatien, 1);
    $pdf->Cell(30, 10, $loaisan, 1);
    $pdf->Cell(30, 10, $tensan, 1);
    $pdf->Cell(30, 10, $pttt, 1);
    $pdf->Cell(40, 10, number_format($totalAmount) . " VND", 1);
    $pdf->Ln();
   }
}
    


    // Hiển thị tổng tiền
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(110, 10, 'Tổng tiền:', 1, 0, 'R');
    $pdf->Cell(40, 10, number_format($totalAmount) . " VND", 1, 1, 'R');

    // Xuất tệp PDF
    $pdf->Output('php://output', 'F');


?>