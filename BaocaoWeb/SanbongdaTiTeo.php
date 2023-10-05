<?php
    require_once "Connect.php";
    session_start();
    // if (isset($_SESSION['user'])) {
    //     header('Location: index.php');
    //     exit();
    // }

    $error = '';

    $user = '';
    $pass = '';

    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        if (empty($user)) {
            $error = 'Please enter your username';
        }
        else if (empty($pass)) {
            $error = 'Please enter your password';
        }
        else if (strlen($pass) < 6) {
            $error = 'Password must have at least 6 characters'; 
        }
        else if ($user == 'tinto' && $pass == '123456') {
            $_SESSION['user'] = 'tinto';
            header('Location: TrangchuAdmin.php');
            exit();
        }
        else if ($user == 'PhucAdmin') {
            $_SESSION['user'] = 'PhucAdmin';
            header('Location: TrangchuAdmin.php');
            exit();
        }
        else{
            $sql = "SELECT * from taikhoan where TenDN = '$user'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row= mysqli_fetch_array($result);
                if($pass == $row['MatKhau']) {  
                    $_SESSION['user'] = $user;
                    header('Location: TrangChu.php');
                    exit();
                }
                else{
                    $error = 'Sai mật khẩu';
                }
            }
            else {
                $error = 'Sai tên đăng nhập';
            }
        }
            
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!---main-->
    <form method="post" action="">
            <div class="container d-flex justify-content-center align-items-center min-vh-100" style="border-radius: 5%s;">

        <!--Login-->
            <div class="row border rounder-5 p-3 bg-white shadow box-area ">

        <!--Left box-->
                <div class="col-md-6 rounder-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: rgb(19, 19, 19);">
                    <div class="featured-image mb-3">
                        <img src="images/cc.jpg" class="img-fluid" style="width: 250px;">
                    </div>
                    <!-- <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be verified</p>
                    <small class="text-white text-wrap text-center" style= "width: 17rem;font-family: 'Courier New', Courier, monospace;">cc</small> -->
                </div>
        <!--right box-->
                <div class="col-md-6 right-box">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <H2>SÂN BÓNG ĐÁ TÍ TÈO</H2>
                            <p>Nơi thể hiện niềm đam mê vô tận</p>
                        </div>
                        
                    </div>
                    <div class="input-group mb-3">
                        <input value="<?= $user ?>" name="user" id="user" type="text" class="form-control form-control-lg bg-light fs-6"  placeholder="Tên đăng nhập">
                    </div>
                    <div class="input-group mb-1">
                        <input value="<?= $pass ?>" name="pass" id="password" type="password" class="form-control form-control-lg bg-light fs-6"  placeholder="Mật khẩu">
                    </div>
                    <div class="input-group mb-5 d-flex justify-content-between">
                        <div class="form-check">
                        
                            <input <?= isset($_POST['remember']) ? 'checked' : '' ?> name="remember" type="checkbox" class="form-check-input" id="formCheck">
                            <label for="formCheck" class="form-check-label text-secondary"><small>Lưu tài khoản</small></label>
                        </div>
                        <div class="forgot">
                            <small><a href="quenmk.php">Quên mật khẩu</a></small>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <?php
                            if (!empty($error)) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                        ?>
                        <button class="btn btn-lg btn-primary w-100 fs-6" >Đăng nhập</button>
                    </div>

                    <div class="row">
                        <small>Đăng ký tài khoản  <a href="dangkysbd.php">Đăng ký</a></small>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
</body>
</html>