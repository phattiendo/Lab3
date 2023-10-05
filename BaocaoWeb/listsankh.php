<?php

require_once "Connect.php";
  session_start();
  $error = '';
  $tensan = '';
  $diachi = '';

  $loaisan = '';
  $id = '';
  $giatien = '';
  $trangthai = '';
  $sql = "SELECT * FROM danhsachsan";
  $result = mysqli_query($conn, $sql);
  if (isset($_POST['tensan']) && isset($_POST['diachi']) && isset($_POST['loaisan'])
    && isset($_POST['giatien']) && isset($_POST['trangthai']))
    {   
        $tensan = $_POST['tensan'];
        $diachi = $_POST['diachi'];
        $loaisan = $_POST['loaisan'];
        $giatien = $_POST['giatien'];
        $trangthai = $_POST['trangthai'];
        

        if (empty($tensan)) {
            $error = 'Vui lòng nhập họ và tên';
        }
        else if (empty($diachi)) {
            $error = 'Vui lòng nhập số điện thoại';
        }
        else if (empty($loaisan)) {
            $error = 'Vui lòng chọn ngày';
        }
        else if (empty($giatien)) {
          $error = 'Vui lòng chọn sân';
        }
        else if (empty($trangthai)) {
            $error = 'Vui lòng chọn thời gian bắt đầu';
        }
        else{
            $sqlselect = "SELECT * FROM danhsachsan where Tensan = '$tensan'";
            $result1 = mysqli_query($conn, $sqlselect);
            if (mysqli_num_rows($result1) > 0) {
                $error = 'Trùng tên sân!';
            }
            else{
                $sqlinsert = "INSERT INTO danhsachsan values ('$id','$tensan', '$diachi', '$loaisan', '$giatien', '$trangthai')";
                if ($conn->query($sqlinsert) === true) {
                    echo '
                        <div class="alert alert-success" role="alert">
                        Thêm sân thành công!
                        </div>
                    ';
                }
                else{
                    $error = 'Thêm thất bại!';
                }
            }
  
        }
          
    }

   
?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "sanbongdatiteo";
    $conn = new mysqli($servername, $username, $password, $db);
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $sql = "DELETE FROM danhsachsan WHERE Tensan='$id'";
        if ($conn->query($sql) === TRUE) {
            //echo "Đã xóa thành công!";
            echo '<script>xóa thành công</script>';
        } else {
            echo "Lỗi: ".$conn->error;
        }
    }
    ?>


<?php

require_once "Connect.php";
      $query = "SELECT  DISTINCT lichdatsan.TenDN, danhsachsan.Tensan, danhsachsan.Diachi, danhsachsan.Loaisan, danhsachsan.Giatien, danhsachsan.Trangthai, lichdatsan.id, lichdatsan.Ngaydat, lichdatsan.Thoigianbd, lichdatsan.Thoigiankt from danhsachsan INNER JOIN lichdatsan ON lichdatsan.Tensan = danhsachsan.Tensan ORDER BY lichdatsan.Ngaydat DESC";
      $result = mysqli_query($conn, $query);
?>
<?php
require_once "Connect.php";
      $query = "SELECT * FROM danhsachsan";
      $result1 = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sân bóng đá</title>
  <!-- Link to Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="styleTrangChu.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>

        <header class="text-center py-2 image-sandau" style="padding-top: 20px;">
        <div class="container" style="padding-top: 70px;">
            <h1 class="text-white text-shadow">SÂN BÓNG ĐÁ TÍ TÈO</h1>

        </div>
    </header>
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
                            <a class="nav-link" href="TrangChu.php"><i class="fas fa-home"></i> Trang chủ</a>
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

        <div class="container mt-5" style="padding-top: 20px;">
    <h1 class="text-center mb-4">Danh Sách Sân Bóng Tí Tèo</h1>
    <div class="row">
      <div class="col-md-12" >
        <table class="table" style="border: 1px solid black; border-collapse: collapse; width: 100%;">
          <thead>
            <tr>
              <th style="text-align:center;" scope="col">Tên sân</th>
              <th style="text-align:center;" scope="col">Địa chỉ</th>
              <th style="text-align:center;" scope="col">Loại sân</th>
              <th style="text-align:center;" scope="col">Giá tiền/1h</th>
              <th style="text-align:center;" scope="col">Trạng thái</th>

            </tr>
          </thead>
          <tbody>
            <form method= 'post' action = 'listsan.php'>
           <?php while ($row = mysqli_fetch_assoc($result1)) { ?>
            <tr>
              <td style="text-align:center;"><?php echo $row['Tensan']; ?></td>
              <td style="text-align:center;"><?php echo $row['Diachi']; ?></td>
              <td style="text-align:center;"><?php echo $row['Loaisan']; ?></td>
              <td style="text-align:center;"><?php echo $row['Giatien']; ?>VNĐ</td>
              <td style="text-align:center;"><?php echo $row['Trangthai']; ?></td>
            </tr>
             <?php } ?>
          </tbody>
           </form>
        </table>

            
            <div class=" col-md-6 mb-3">
            <label for="payment-method" class="form-label">Tìm sân theo địa chỉ</label>
            <input type="text" class="form-control" id="input-search" placeholder="Nhập địa chỉ cần tìm:">
            </div>
        </div>
        
      </div>
        <form>
            <button class="btn btn-primary" type="button" onclick="timDiachi()">Tìm kiếm</button>
        </form>
        
    </div>

  <div class="container mt-5" style="padding-top: 20px;">
    <h1 class="text-center mb-4">Danh Sách Sân Bóng Tí Tèo đã được đặt</h1>
    <div class="row">
      <div class="col-md-12" >
        <table class="table" style="border: 1px solid black; border-collapse: collapse; width: 100%;">
          <thead>
            <tr>
               <th style="text-align:center;" scope="col">Tên đăng nhập</th>
              <th style="text-align:center;" scope="col">Tên sân</th>
              <th style="text-align:center;" scope="col">Địa chỉ</th>
              <th style="text-align:center;" scope="col">Loại sân</th>
              <th style="text-align:center;" scope="col">Ngày đặt</th>
              <th style="text-align:center;" scope="col">Thời gian bắt đầu</th>
              <th style="text-align:center;" scope="col">Thời gian kết thúc</th>

            </tr>
          </thead>
          <tbody>
            <form method= 'post' action = 'listsan.php'>
           <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td style="text-align:center;"><?php echo $row['TenDN']; ?></td>
              <td style="text-align:center;"><?php echo $row['Tensan']; ?></td>
              <td style="text-align:center;"><?php echo $row['Diachi']; ?></td>
              <td style="text-align:center;"><?php echo $row['Loaisan']; ?></td>
              <td style="text-align:center;"><?php echo $row['Ngaydat']; ?></td>
              <td style="text-align:center;"><?php echo $row['Thoigianbd']; ?></td>
              <td style="text-align:center;"><?php echo $row['Thoigiankt']; ?></td>
             
            </tr>
             <?php } ?>
          </tbody>
           </form>
        </table>

            
           
        </div>
        
      </div>
        
        
    </div>
    <script>
        function timDiachi() {
            var input = document.getElementById("input-search").value.toUpperCase();
            var table = document.getElementsByTagName("table")[0];
            var tr = table.getElementsByTagName("tr");
            for (var i = 0; i < tr.length; i++) {
                var td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    var textValue = td.textContent;
                    if (textValue.toUpperCase().indexOf(input) == 0) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
<?php
    
    ?>


        
</body>
  <!-- Link to Bootstrap 5 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/">

