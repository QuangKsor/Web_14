<?php
    include_once('ketnoi.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM thanhvien WHERE id = $id";
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($query)){
?>
<h2>Sửa thông tin người dùng</h2>
<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" >
    	<tr>
        	<td><label>Tên người dùng</label><br /><input type="text" name="ten_user" value="<?php echo $row['name']?>" /></td>
        </tr>
        <tr>
        	<td><label>Email</label><br /><input type="text" name="email" value="<?php echo $row['email']?>" /></td>
        </tr>
        <tr>
        	<td><label>Mật khẩu</label><br /><input type="text" name="pass" value="<?php echo $row['pass']?>" /></td>
        </tr>
        <tr>
        	<td><label>Quyền Admin</label><br />Có <input type="radio" name="role" value=1 <?php if($row['role']==1){echo 'checked';} ?>/> Không <input type="radio" name="role" value=0 <?php if($row['role']==0){echo 'checked';} ?>/></td>
        </tr>
        <tr>
        	<td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>
<?php
}
?>
<?php
    if(isset($_POST['submit'])){
        $ten_user = $_POST['ten_user'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $role = $_POST['role'];

        $update = "UPDATE thanhvien SET name = '$ten_user', email = '$email', pass = '$pass', role = '$role' WHERE id = ".$id;
        $sql_update = mysqli_query($conn, $update);
        header('location:quantri.php?page_layout=ql_nguoidung'); 
    }
?>