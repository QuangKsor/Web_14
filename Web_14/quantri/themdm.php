<?php
    include_once('ketnoi.php');
    $error = NULL;
    if(isset($_POST['submit'])){
        // Bẫy lỗi để trống trường dữ liệu trong Form
        // Tên danh mục
        if($_POST['ten_dm'] == ''){
            $error_ten_dm = '<span style="color:red;">(*)<span>';
        }
        else{
            $ten_dm = $_POST['ten_dm'];
        }
        // Ảnh danh mục
        if($_FILES['anh_dm']['name'] == ''){
            $error_anh_dm = '<span style="color:red;">(*)<span>';
        }
        else{
            $anh_dm = $_FILES['anh_dm']['name'];
            $tmp = $_FILES['anh_dm']['tmp_name'];
        }
       
        if(isset($ten_dm)){
            move_uploaded_file($tmp, 'anh/'.$anh_dm);
            $sql = "INSERT INTO dmsanpham(ten_dm,anh_dm) VALUES ('$ten_dm', '$anh_dm')";
            $query = mysqli_query($conn,$sql);
            header('location:quantri.php?page_layout=ql_dm');
        }
    }
?>

<link rel="stylesheet" type="text/css" href="css/themsp.css" />
<h2>Thêm danh mục mới</h2>
<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" >
    	<tr>
        	<td><label>Tên danh mục</label><br /><input type="text" name="ten_dm" /><?php if(isset($error_ten_dm)){echo $error_ten_dm;}?></td>
        </tr>
        <tr>
        	<td><label>Ảnh mô tả</label><br /><input type="file" name="anh_dm" /><?php if(isset($error_anh_dm)){echo $error_anh_dm;}?></td>
        </tr>
        	<td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>