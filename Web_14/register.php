<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div class="container">
            <div class="box form-box">
                <?php
                    include("cauhinh/ketnoi.php");
                    if(isset($_POST['submit'])){
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $confirm_password = $_POST['confirm_password'];

                        //Giới hạn độ dài tên người dùng
                        if (mb_strlen($username, 'UTF-8') > 20){
                            echo "<div class='message'>
                                <p>Tên người dùng không được vượt quá 20 ký tự</p>
                                </div> <br>";
                            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                        }else if($password != $confirm_password) {
                            echo "<div class='message'>
                                      <p>Mật khẩu không khớp, vui lòng nhập lại!</p>
                                  </div> <br>";
                            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                        } else {
                            $verify_query = mysqli_query($conn, "SELECT email FROM thanhvien WHERE email='$email'");
                            if(mysqli_num_rows($verify_query) != 0){
                                echo "<div class='message'>
                                          <p>Email này đã được sử dụng, vui lòng thử email khác!</p>
                                      </div> <br>";
                                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                            } else {
                                mysqli_query($conn, "INSERT INTO thanhvien(name, email, pass) VALUES('$username', '$email', '$password')") or die("Error Occurred");
            
                                echo "<div class='message'>
                                          <p>Đăng Ký Thành Công!</p>
                                      </div> <br>";
                                echo "<a href='login.php'><button class='btn'>Đăng nhập ngay bây giờ</button>";
                            }
                        }
                    }else{
                ?>
                <header>Đăng ký</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Tên người dùng</label>
                        <input type="text" name="username" id="username" maxlength="20" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="confirm_password">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm_password" id="confirm_password" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Register">
                    </div>
                    <div class="links">
                        Đã có tài khoản <a href="login.php">Đăng Nhập</a>
                    </div>
                </form>
            </div>
            <?php } ?>
        </div>
    </body>
</html>