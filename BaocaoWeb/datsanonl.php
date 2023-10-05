<?php
  
  require_once "Connect.php";
  session_start();
  // require_once "./send_mail.php";
  $user_ht = '';
  $error = '';
  $user = '';
  $sdt = '';
  $ngaydat = '';
  $thoigianbd = '';
  $thoigiankt = '';
  $soluong = '';
  $loaisan = '';
  $tensan = '';
  $ghichu = '';
  $sussess = '';
  $id = '';
  $doan = '';
  $sldoan = '';
  $nuoc = '';
  $slnuoc = '';

  if (isset($_POST['user']) && isset($_POST['sdt']) && isset($_POST['ngaydat'])
    && isset($_POST['thoigianbd']) && isset($_POST['thoigiankt']) && isset($_POST['soluong']) && isset($_POST['loaisan']) && isset($_POST['tensan']) && isset($_POST['ghichu']) && isset($_POST['doan']) && isset($_POST['nuoc'])&& isset($_POST['sldoan'])&& isset($_POST['slnuoc']))
    {
        $user = $_POST['user'];
        $sdt = $_POST['sdt'];
        $ngaydat = $_POST['ngaydat'];
        $thoigianbd = $_POST['thoigianbd'];
        $thoigiankt = $_POST['thoigiankt'];
        $soluong = $_POST['soluong'];
        $loaisan = $_POST['loaisan'];
        $tensan = $_POST['tensan'];
        $ghichu = $_POST['ghichu'];
        $doan = $_POST['doan'];
        $sldoan = $_POST['sldoan'];
        $nuoc = $_POST['nuoc'];
        $slnuoc = $_POST['slnuoc'];

        if (empty($user)) {
            $error = 'Vui lòng nhập họ và tên';
        }
        else if (empty($sdt)) {
            $error = 'Vui lòng nhập số điện thoại';
        }
        else if (empty($ngaydat)) {
            $error = 'Vui lòng chọn ngày';
        }
        else if (empty($tensan)) {
          $error = 'Vui lòng chọn sân';
      }
        else if (empty($thoigianbd)) {
            $error = 'Vui lòng chọn thời gian bắt đầu';
        }
        else if (empty($thoigiankt)) {
            $error = 'Vui lòng chọn thời gian kết thúc';
        }
        else if (empty($soluong)) {
            $error = 'Vui lòng nhập số lượng';
        }
        else if (empty($doan)) {
          $error = 'Vui lòng chọn đồ ăn';
      }
      else if (empty($nuoc)) {
        $error = 'Vui lòng chọn nước uống';
      }
        else{
          $sqlselect = "SELECT * FROM danhsachsan where Tensan = '$tensan' and Loaisan = '$loaisan'";
          $result = mysqli_query($conn, $sqlselect);
          if (mysqli_num_rows($result) > 0) {

            $sqltrung = "SELECT * FROM lichdatsan
            WHERE Tensan = '$tensan'
            AND Ngaydat = '$ngaydat'
            AND (Thoigianbd <= '$thoigianbd' AND Thoigiankt > '$thoigiankt'
            OR Thoigianbd < '$thoigiankt' AND Thoigiankt >= '$thoigiankt')";

            $resulttrung = $conn->query($sqltrung);

            if ($resulttrung->num_rows > 0) {
              $error = 'Sân bạn muốn đặt đã trùng giờ!';
            }
            else{

            $sql = "INSERT INTO lichdatsan values ('$id' ,'$user', '$sdt', '$ngaydat', '$thoigianbd', '$thoigiankt', '$soluong', '$loaisan', '$tensan' , '$ghichu','$doan','$sldoan','$nuoc','$slnuoc')";
            if ($conn->query($sql) === true) {
              $sqlupdate = "UPDATE danhsachsan SET Trangthai = 'Hoạt động' where Tensan = '$tensan'";
              if ($conn->query($sqlupdate) === true) {
                $sussess = 'Cập nhật trạng thái sân thành công!';
              }
              else{
                $error = 'cập nhật trạng thái sân thất bại!';
              }
              $sussess = 'Đặt sân thành công!';
            }
            else{
              $error = 'Đặt sân thất bại!';
            }
          }
          }
          else{
            $error = 'Sân không còn trống';
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
        $sql = "DELETE FROM lichdatsan WHERE id ='$id'";
        if ($conn->query($sql) === TRUE) {
            //echo "Đã xóa thành công!";
            echo '<script>xóa thành công</script>';
        } else {
            echo "Lỗi: ".$conn->error;
        }
    }
    ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Đặt sân bóng đá</title>
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
                            <a class="nav-link" href="TrangChu.php"><i class="fas fa-home"></i> Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listsankh.php"><i class="fas fa-futbol"></i> Sân bóng</a>
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

        </div>
    </header>
        
    <div class="container mt-4" style="padding-top: 30px">
      <h1 class="text-center mb-4">Đặt sân bóng đá</h1>
      <form form method="post" action="datsanonl.php" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="user" class="form-label">Tên đăng nhập</label>
            <input value="<?= $user?>" name="user" type="text" class="form-control" id="user" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="sdt" class="form-label">Số điện thoại:</label>
            <input value="<?= $sdt?>" name="sdt" type="tel" class="form-control" id="sdt" pattern="[0-9]{10}" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="ngaydat" class="form-label">Ngày đặt:</label>
            <input value="<?= $ngaydat?>" name="ngaydat" type="date" class="form-control" id="ngaydat" required>
          </div>
          <div class="col-md-3 mb-3">
            <label for="thoigianbd" class="form-label">Thời gian bắt đầu:</label>
            <input value="<?= $thoigianbd?>" name="thoigianbd" type="time" class="form-control" id="thoigianbd" required>
          </div>
          <div class="col-md-3 mb-3">
            <label for="thoigianktt" class="form-label">Thời gian kết thúc:</label>
            <input value="<?= $thoigiankt?>" name="thoigiankt" type="time" class="form-control" id="thoigiankt" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="soluong" class="form-label">Số lượng người chơi:</label>
            <input value="<?= $soluong?>" name="soluong" type="number" class="form-control" id="soluong" min="10">
          </div>
          <div class="col-md-3 mb-3">
            <label for="loaisan" style="margin-bottom: 8px;">Loại sân:</label>
            <select class="form-control" id="loaisan" name="loaisan" value="<?= $loaisan?>">
              <option >Sân 5 người</option>
              <option >Sân 7 người</option>
              <option >Sân 11 người</option>
            </select>
          </div>
          <div class="col-md-3 mb-3">
            <label for="loaisan" style="margin-bottom: 8px;">Tên sân:</label>
            <?php $tensan2 = "SELECT Tensan from danhsachsan"; 
                  $result2 = mysqli_query($conn, $tensan2);
            ?>
            <select class="form-control" id="tensan" name="tensan" value="<?= $tensan?>">
            <?php if(mysqli_num_rows($result2) > 0) {
                 while ($row = mysqli_fetch_assoc($result2)) { ?>
                    <option ><?php echo $row['Tensan']; ?></option>
            <?php } 
                }
                ?>
                
                      
                </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="ghichu" class="form-label">Đồ ăn</label>
            <select class="form-control" id="doan" name="doan" value="<?= $doan?>">
              <option >Không</option>
              <option >Bim Bim</option>
              <option >mì xào bò</option>
              <option >lẩu</option>
            </select>
          </div>
          <div class="col-md-2 mb-3">
            <label for="soluong" class="form-label">Số lượng đồ ăn:</label>
            <input value="<?= $sldoan?>" name="sldoan" type="number" class="form-control" id="sldoan" min="1">
          </div>
          <div class="col-md-4 mb-3">
            <label for="ghichu" class="form-label">Nước</label>
            <select class="form-control" id="nuoc" name="nuoc" value="<?= $nuoc?>">
              <option >Không</option>
              <option >Siting</option>
              <option >Cocacola</option>
              <option >Pepsi</option>
            </select>
          </div>
          <div class="col-md-2 mb-3">
            <label for="soluong" class="form-label">Số lượng nước</label>
            <input value="<?= $slnuoc?>" name="slnuoc" type="number" class="form-control" id="slnuoc" min="1">
          </div>
        </div>


        <div class="mb-3">
          <label for="ghichu" class="form-label">Ghi chú:</label>
          <input value="<?= $ghichu?>" name="ghichu" type="text" class="form-control" id="ghichu">
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
          <button class="btn btn-primary">Đặt sân</button>
          <button type="reset" class="btn btn-secondary">Làm mới</button>
        </div>
        

      </form>
    </div>
    <?php
      $taikhoanht = $_SESSION['user'];
// Kết nối cơ sở dữ liệu và truy vấn dữ liệu lịch sử đặt sân của khách hàng
      $query = "SELECT DISTINCT lichdatsan.id, lichdatsan.TenDN, lichdatsan.Ngaydat, lichdatsan.Thoigianbd, lichdatsan.Thoigiankt, lichdatsan.Soluong, lichdatsan.Loaisan, lichdatsan.Tensan, lichdatsan.Ghichu, lichdatsan.Doan, lichdatsan.sldoan, lichdatsan.Nuoc, lichdatsan.slNuoc from lichdatsan INNER JOIN taikhoan ON lichdatsan.SDT = taikhoan.SDT AND '$taikhoanht' = lichdatsan.TenDN ORDER BY lichdatsan.Ngaydat DESC";
      $result1 = mysqli_query($conn, $query);
      
    ?>

<!-- Form hiển thị lịch sử đặt sân -->
<div class="container mt-5">
  <h2 class="mb-4">Lịch sử đặt sân của bạn</h2>
  <table class="table">
    <thead>
      <tr>
        <th style="text-align:center;" scope="col">Ngày đặt sân</th>
        <th style="text-align:center;" scope="col">Thời gian bắt đầu</th>
        <th style="text-align:center;" scope="col">Thời gian kết thúc</th>
        <th style="text-align:center;" scope="col">Số lượng</th>
        <th style="text-align:center;" scope="col">Loại sân</th>
        <th style="text-align:center;" scope="col">Tên sân</th>
        <th style="text-align:center;" scope="col">Ghi chú</th>
        <th style="text-align:center;" scope="col">Đồ ăn</th>
        <th style="text-align:center;" scope="col">Số lượng</th>
        <th style="text-align:center;" scope="col">Nước</th>
        <th style="text-align:center;" scope="col">Số lượng</th>
        <th style="text-align:center;" scope="col">Hủy sân</th>
      </tr>
    </thead>
    <tbody>
    <form method= 'post' action = 'datsanonl.php'>
      <?php if(mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_assoc($result1)) { ?>
          <tr>
            <td style="text-align:center;"><?php echo $row['Ngaydat']; ?></td>
            <td style="text-align:center;"><?php echo $row['Thoigianbd']; ?></td>
            <td style="text-align:center;"><?php echo $row['Thoigiankt']; ?></td>
            <td style="text-align:center;"><?php echo $row['Soluong']; ?></td>
            <td style="text-align:center;"><?php echo $row['Loaisan']; ?></td>
            <td style="text-align:center;"><?php echo $row['Tensan']; ?></td>
            <td style="text-align:center;"><?php echo $row['Ghichu']; ?></td>
            <td style="text-align:center;"><?php echo $row['Doan']; ?></td>
            <td style="text-align:center;"><?php echo $row['sldoan']; ?></td>
            <td style="text-align:center;"><?php echo $row['Nuoc']; ?></td>
            <td style="text-align:center;"><?php echo $row['slNuoc']; ?></td>
            <th style="text-align:center;"><button class="btn btn-sm btn-danger" type="submit" name="delete" value="<?php echo $row['id']; ?>">Hủy</button></th>
          </tr>
               
    <?php } 
      }
      ?>
    </form>
    </tbody>
  </table>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-DUTJkclRpVGKp5TnycGd3mk+6eRoD9Kym2eX48sNr5FV9KVZP5oAM8p0m17ITs/e" crossorigin="anonymous"></script>
  </body>
</html>