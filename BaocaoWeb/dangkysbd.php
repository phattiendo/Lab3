<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    require_once "Connect.php";
    // require_once "./send_mail.php";

    $error = '';
    $hovaten='';
    $sdt = '';
    $user = '';
    $pass = '';
    $pass_confirm = '';
    $cauhoi = '';
    $traloi = '';

    if (isset($_POST['hovaten']) && isset($_POST['sdt']) && isset($_POST['user'])
    && isset($_POST['pass']) && isset($_POST['pass_confirm']) && isset($_POST['cauhoi']) && isset($_POST['traloi']))
    {
        $hovaten = $_POST['hovaten'];
        $sdt = $_POST['sdt'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $pass_confirm = $_POST['pass_confirm'];
        $cauhoi = $_POST['cauhoi'];
        $traloi = $_POST['traloi'];

        if (empty($hovaten)) {
            $error = 'Vui lòng nhập họ và tên';
        }
        else if (empty($sdt)) {
            $error = 'Vui lòng nhập số điện thoại';
        }
        else if (empty($user)) {
            $error = 'Please enter your username';
        }
        else if (empty($pass)) {
            $error = 'Vui lòng nhập mật khẩu';
        }
        else if (strlen($pass) < 6) {
            $error = 'Bạn phải có ít nhất 6 ký tự';
        }
        else if ($pass != $pass_confirm) {
            $error = 'Mật khẩu không khớp';
        }
        else if (empty($cauhoi)) {
            $error = 'Vui lòng chọn câu hỏi bảo mật';
        }
        else if (empty($traloi)) {
            $error = 'Vui lòng nhập câu trả lời bảo mật';
        }
        else {
            // register a new account
            $sql ="select * from taikhoan where TenDN ='$user'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $error ='Tên tài khoản đã có người sử dụng';
            }
            else {     
                $sqlinsert = "insert into taikhoan values ('$hovaten', '$sdt', '$user', '$pass', '$cauhoi', '$traloi')";               
                if ($conn->query($sqlinsert) === true) {
                    // $href ="http://localhost/Lab08/source%20code/active.php?email=$email$token=$token";
                    header('Location: SanbongdaTiTeo.php');
                    exit();
                }
                else{
                    $error ='Đăng ký không thành công';
                }
            }

        }
    }
?>

    <!---main-->
    <form method="post" action="" novalidate>
        <div class="container d-flex justify-content-center align-items-center min-vh-100" style="border-radius: 5%s;">

        <!--Login-->
            <div class="row border rounder-5 p-3 bg-white shadow box-area ">

        <!--Left box-->
                <div class="col-md-6 rounder-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: rgb(55, 54, 54)  ;">
                    <div class="featured-image mb-3">
                        <img src="images/CR71.jpg" class="img-fluid" style="width: 100%;">
                    </div>
                    <!-- <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be verified</p>
                    <small class="text-white text-wrap text-center" style= "width: 17rem;font-family: 'Courier New', Courier, monospace;">cc</small> -->
                </div>
        <!--right box-->
                <div class="col-md-6 right-box">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <H2>Đăng ký</H2>
                        </div>
                        
                    </div>
                    <div class="input-group mb-3">
                        <input value="<?= $hovaten?>" name="hovaten" required class="form-control" id="hovaten" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Họ và tên">
                    </div>
                    <div class="input-group mb-3">
                        <input value="<?= $sdt?>" name="sdt" required class="form-control" type="tel" id="sdt" class="form-control form-control-lg bg-light fs-6" placeholder="Số điện thoại">
                    </div>
                    <div class="input-group mb-3">
                        <input value="<?= $user?>" name="user" required class="form-control" id="user" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Tên đăng nhập">
                    </div>
                    <div class="input-group mb-3">
                        <input value="<?= $pass?>" name="pass" required class="form-control" id="pass" type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Mật khẩu">
                    </div>
                    <div class="input-group mb-3">
                        <input value="<?= $pass_confirm?>" name="pass_confirm" required class="form-control" id="pass_confirm" type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Nhập lại mật khẩu">
                    </div>
                    <div class="input-group mb-3">
                        <input value="<?= $cauhoi?>" name="cauhoi" required class="form-control" id="cauhoi" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Câu hỏi bảo mật">
                    </div>
                    <div class="input-group mb-3">
                        <input value="<?= $traloi?>" name="traloi" required class="form-control" id="traloi" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Câu trả lời">
                    </div>
                    <div class="input-group mb-5 d-flex justify-content-between">
                    </div>
                    <div class="input-group mb-3">
                        <?php
                                if (!empty($error)) {
                                    echo "<div class='alert alert-danger'>$error</div>";
                                }
                            ?>
                        <button class="btn btn-lg btn-primary w-100 fs-6">Tạo tài khoản</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>