<?php
    include_once('ketnoi.php');
    $error = NULL;
    if(isset($_POST['submit'])){
        // Bẫy lỗi để trống trường dữ liệu trong Form
        // Tên người dùng
        if($_POST['name'] == ''){
            $error_name = '<span style="color:red;">(*)<span>';
        }
        else{
            $name = $_POST['name'];
        }
        if($_POST['email'] == ''){
            $error_email = '<span style="color:red;">(*)<span>';
        }
        else{
            $email = $_POST['email'];
        }
        if($_POST['pass'] == ''){
            $error_pass = '<span style="color:red;">(*)<span>';
        }
        else{
            $pass = $_POST['pass'];
        }
        $role = $_POST['role'];
       
       
        if(isset($name)){
            $sql = "INSERT INTO thanhvien(name,email,pass,role) VALUES ('$name', '$email','$pass','$role')";
            $query = mysqli_query($conn,$sql);
            header('location:quantri.php?page_layout=ql_nguoidung');
        }
    }
?>

<link rel="stylesheet" type="text/css" href="css/themsp.css" />
<h2>Thêm người dùng mới</h2>
<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" >
    	<tr>
        	<td><label>Tên người dùng</label><br /><input type="text" name="name" /><?php if(isset($error_name)){echo $error_name;}?></td>
        </tr>
        <tr>
        	<td><label>Email</label><br /><input type="text" name="email" /><?php if(isset($error_email)){echo $error_email;}?></td>
        </tr>
        <tr>
        	<td><label>Password</label><br /><input type="text" name="pass" /><?php if(isset($error_pass)){echo $error_pass;}?></td>
        </tr>
        <tr>
        	<td><label>Quyền Admin</label><br />Có <input type="radio" name="role" value=1 /> Không <input checked="checked" type="radio" name="role" value=0 /></td>
        </tr>
        	<td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>