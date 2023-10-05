<?php
require_once "Connect.php";
  session_start();
  $error = '';
  $tensan = '';
  $diachi = '';
  $loaisan = '';
  $giatien = '';
  $trangthai = '';
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
            $sql ="SELECT * from danhsachsan where Tensan ='$tensan'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $sqlupdate = "UPDATE danhsachsan SET Diachi = '$diachi',Loaisan = '$loaisan',Giatien = '$giatien',Trangthai = '$trangthai' WHERE Tensan='$tensan'";
                if ($conn->query($sqlupdate) === true) {
                    echo '
                        <div class="alert alert-success" role="alert">
                        Cập nhật thông tin sân thành công!
                        </div>
                    ';
                }
                else{
                    $error ='Cập nhật thất bại';
                }
            }
            else {     
                $error ='Sai tên sân';
            }
        }


    
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <form method="post">
        <div class="container mt-3">
            <h2>Chỉnh sửa thông tin</h2>
            <form action="/action_page.php">
                <div class="mb-3 mt-3">
                    <label for="tensan">Tên sân:</label>
                    <input type="text" class="form-control" id="tensan"  name="tensan">
                </div>
                <div class="mb-3">
                    <label for="diachi">Địa chỉ:</label>
                    <input type="text" class="form-control" id="diachi" name="diachi">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="loaisan" style="margin-bottom: 8px;">Loại sân:</label>
                    <select class="form-control" id="loaisan" name="loaisan" value="<?= $loaisan?>">
                        <option >Sân 5 người</option>
                        <option >Sân 7 người</option>
                        <option >Sân 11 người</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="giatien">Giá tiền:</label>
                    <input type="text" class="form-control" id="giatien"  name="giatien">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="trangthai" style="margin-bottom: 8px;">Trạng thái</label>
                    <select class="form-control" id="trangthai" name="trangthai" value="<?= $trangthai?>">
                    <option >Trống</option>
                    <option >Hoạt động</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" herf="listsan.php" name="luu">Lưu</button>
            </form>
        </div>
    </form>
</body>