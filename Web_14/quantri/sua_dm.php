<?php
    include_once('ketnoi.php');
    $id_dm = $_GET['id_dm'];
    $sql = "SELECT * FROM dmsanpham WHERE id_dm = $id_dm";
    $query = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($query)) {
?>
<link rel="stylesheet" type="text/css" href="css/themsp.css" />
<h2>Sửa thông tin danh mục</h2>
<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd">
        <tr>
        	<td><label>Tên danh mục</label><br /><input type="text" name="ten_dm" value="<?php echo $row['ten_dm']?>" /></td>
        </tr>
        <tr>
        	<td><label>Ảnh mô tả</label><br /><input type="file" name="anh_dm" /><input type="text" name="anh_dm" value="<?php echo $row['anh_dm'];?>" /></td>
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

        $ten_dm = $_POST['ten_dm'];

        if($_FILES['anh_dm']['name'] == ''){
            $anh_dm = $_POST['anh_dm'];
        }
        else{
            $anh_dm = $_FILES['anh_dm']['name'];
            $tmp = $_FILES['anh_dm']['tmp_name'];
        }

        if($_FILES['anh_dm']['name'] != ""){
            move_uploaded_file($tmp, 'anh/'.$anh_dm);
        }  
        $sqlUpdate = "UPDATE dmsanpham  SET   ten_dm ='$ten_dm', anh_dm ='$anh_dm'  WHERE   id_dm =".$id_dm;
                                    
        mysqli_query($conn,$sqlUpdate);
        header('location:quantri.php?page_layout=ql_dm');  
    }
?>