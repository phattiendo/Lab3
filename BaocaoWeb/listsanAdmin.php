<?php

require_once "Connect.php";
  session_start();
  $error = '';
  $tensan = '';
  $diachi = '';

  $loaisan = '';
  
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
                $sqlinsert = "INSERT INTO danhsachsan values ('$tensan', '$diachi', '$loaisan', '$giatien', '$trangthai')";
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
      $query = "SELECT * FROM danhsachsan";
      $result = mysqli_query($conn, $query);
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
  <style>
        body {
      background-color: #E8E8E8;
    }
  </style>
</head>
<body>
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
    <script>
        const accountDropdown = document.getElementById("accountDropdown");
        const dropdownMenu = document.querySelector(".dropdown-menu");

        accountDropdown.addEventListener("click", (event) => {
        event.preventDefault();
        dropdownMenu.classList.toggle("show");
        });

    </script>

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
              <th style="text-align:center;" scope="col">Giá tiền</th>
              <th style="text-align:center;" scope="col">Trạng thái</th>
              <th style="text-align:center;" scope="col">Edit</th>
              <th style="text-align:center;" scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <form method= 'post' action = 'listsanAdmin.php'>
           <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td style="text-align:center;"><?php echo $row['Tensan']; ?></td>
              <td style="text-align:center;"><?php echo $row['Diachi']; ?></td>
              <td style="text-align:center;"><?php echo $row['Loaisan']; ?></td>
              <td style="text-align:center;"><?php echo $row['Giatien']; ?></td>
              <td style="text-align:center;"><?php echo $row['Trangthai']; ?></td>
              <th style="text-align:center;"><a class="btn btn-sm btn-primary" href="Sua.php">Edit</a></th>
              <th style="text-align:center;"><button class="btn btn-sm btn-danger" type="submit" name="delete" value="<?php echo $row['Tensan']; ?>">Xóa</button></th>
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

<div class="container mt-4">
      <h1 class="text-center mb-4">Thêm Sân</h1>
      <form form method="post" action="listsan.php" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="tensan" class="form-label">Tên Sân</label>
            <input value="<?= $tensan?>" name="tensan" type="text" class="form-control" id="tensan" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="sdt" class="form-label">Địa chỉ</label>
            <input value="<?= $diachi?>" name="diachi" type="text" class="form-control" id="diachi" required>
          </div>
        </div>
        <div class="row">
        <div class="col-md-3 mb-3">
            <label for="loaisan" style="margin-bottom: 8px;">Loại sân:</label>
            <select class="form-control" id="loaisan" name="loaisan" value="<?= $loaisan?>">
              <option >Sân 5 người</option>
              <option >Sân 7 người</option>
              <option >Sân 11 người</option>
            </select>
          </div>
          <div class="col-md-3 mb-3">
            <label for="giatien" class="form-label">Giá tiền</label>
            <input value="<?= $giatien?>" name="giatien" type="number" class="form-control" id="giatien" required>
          </div>
          <div class="col-md-3 mb-3">
            <label for="trangthai" style="margin-bottom: 8px;">Trạng thái</label>
            <select class="form-control" id="trangthai" name="trangthai" value="<?= $trangthai?>">
              <option >Trống</option>
              <option >Hoạt động</option>
            </select>
          </div>
        </div>
        <div class="text-center" style="margin-bottom:50px;">
          <?php
            if (!empty($error)) {
               echo "<div class='alert alert-danger'>$error</div>";
            }
          ?>
          <button class="btn btn-primary">Thêm</button>
          <button type="reset" class="btn btn-secondary" >Làm mới</button>
        </div>
        

      </form>




</body>
  <!-- Link to Bootstrap 5 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/">

