<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
                session_start();
                include("cauhinh/ketnoi.php");

                if(isset($_POST['submit'])){
                    $email = mysqli_real_escape_string($conn,$_POST['email']);
                    $password = mysqli_real_escape_string($conn,$_POST['password']);
                    //Thuc hien truy van
                    $result = mysqli_query($conn, "SELECT * FROM thanhvien WHERE email='$email' AND pass='$password' ") or die ("Select Error");
                    $row = mysqli_fetch_assoc($result);

                    if(is_array($row) && !empty($row)){
                        $_SESSION['valid'] = $row['email'];
                        $_SESSION['username'] = $row['name'];
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['role'] = $row['role'];

                        if($_SESSION['role'] == 1){
                            header("Location: quantri/quantri.php");
                            exit();
                        }else{
                            header("Location: index.php");
                            exit();
                        }
                    }else{
                        echo "<div class='message'>
                        <p> Tên người dùng hoặc mật khẩu sai</p>
                        </div> <br>";
                        echo "<a href='login.php'><button class='btn'>Trở lại</button></a>";
                    }
                }
            ?>
            <header>Đăng nhập</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" require>
                </div>
                
                <div class="field input">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" id="password" autocomplete="off" require>
                </div>
                <div class="field">
                    <input type="submit" class ="btn" name="submit" value="Login" require>
                </div>
                <div class ="link">
                    Bạn chưa có tài khoản? <a href="register.php">Đăng ký ngay</a>
                </div>
            </form>
        </div>
    </div>
</body>