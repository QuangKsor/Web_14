<?php
    include_once('ketnoi.php');
    $error = NULL;
    if(isset($_POST['submit'])){
        // Bẫy lỗi để trống trường dữ liệu trong Form
        // Tên sản phẩm
        if($_POST['ten_sp'] == ''){
            $error_ten_sp = '<span style="color:red;">(*)<span>';
        }
        else{
            $ten_sp = $_POST['ten_sp'];
        }
        //Giá sản phẩm
        if($_POST['gia_sp'] == ''){
            $error_gia_sp = '<span style="color:red;">(*)<span>';
        }
        else{
            $gia_sp = $_POST['gia_sp'];
        }
        //Tình trạng
        if($_POST['tinh_trang'] == ''){
            $error_tinh_trang = '<span style="color:red;">(*)<span>';
        }
        else{
            $tinh_trang = $_POST['tinh_trang'];
        }
        //Khuyến mãi
        if($_POST['khuyen_mai'] == ''){
            $error_khuyen_mai = '<span style="color:red;">(*)<span>';
        }
        else{
            $khuyen_mai = $_POST['khuyen_mai'];
        }
        //Trạng thái
        if($_POST['trang_thai'] == ''){
            $error_trang_thai = '<span style="color:red;">(*)<span>';
        }
        else{
            $trang_thai = $_POST['trang_thai'];
        }
        //Sản phẩm đặc biệt
        $dac_biet = $_POST['dac_biet'];
        //Chi tiết sản phẩm
        if($_POST['chi_tiet_sp'] == ''){
            $error_chi_tiet_sp = '<span style="color:red;">(*)<span>';
        }
        else{
            $chi_tiet_sp = $_POST['chi_tiet_sp'];
        }
        // Ảnh sản phẩm
        if($_FILES['anh_sp']['name'] == ''){
            $error_anh_sp = '<span style="color:red;">(*)<span>';
        }
        else{
            $anh_sp = $_FILES['anh_sp']['name'];
            $tmp = $_FILES['anh_sp']['tmp_name'];
        }
        if($_POST['id_dm'] == 'unselect'){
            $error_id_dm = '<span style="color:red;">(*)<span>';
        }
        else{
            $id_dm = $_POST['id_dm'];
        }
        if(isset($ten_sp) && isset($gia_sp) && isset($tinh_trang) && isset($khuyen_mai) && isset($trang_thai) && isset($chi_tiet_sp) && isset($dac_biet) && isset($anh_sp) && isset($id_dm)){
            move_uploaded_file($tmp, 'anh/'.$anh_sp);
            $sql = "INSERT INTO sanpham(ten_sp, gia_sp, tinh_trang, khuyen_mai, trang_thai, dac_biet, chi_tiet_sp, anh_sp, id_dm) VALUES ('$ten_sp','$gia_sp','$tinh_trang','$khuyen_mai','$trang_thai','$dac_biet', '$chi_tiet_sp','$anh_sp', '$id_dm')";
            $query = mysqli_query($conn,$sql);
            header('location:quantri.php?page_layout=danhsachsp');
        }
        
    }
?>
<link rel="stylesheet" type="text/css" href="css/themsp.css" />
<h2>Thêm sản phẩm mới</h2>
<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" >
        <tr>
            <td>
                <label>Danh mục sản phẩm</label><br />
                <select name="id_dm">
                    <option value="unselect" selected="selected">Lựa chọn danh mục</option>
                    <?php
                        $result_dm = mysqli_query($conn, "SELECT * FROM dmsanpham");
                        while ($row_dm = mysqli_fetch_assoc($result_dm)) {
                            echo '<option value="'.$row_dm['id_dm'].'">'.$row_dm['ten_dm'].'</option>';
                        }
                    ?>
                </select>
                <?php if(isset($error_id_dm)){echo $error_id_dm;}?>
            </td>
        </tr>
    	<tr>
        	<td><label>Tên sản phẩm</label><br /><input type="text" name="ten_sp" /><?php if(isset($error_ten_sp)){echo $error_ten_sp;}?></td>
        </tr>
        <tr>
        	<td><label>Ảnh mô tả</label><br /><input type="file" name="anh_sp" /><?php if(isset($error_anh_sp)){echo $error_anh_sp;}?></td>
        </tr>
        <tr>
        	<td><label>Giá sản phẩm</label><br /><input type="text" name="gia_sp" />VNĐ<?php if(isset($error_gia_sp)){echo $error_gia_sp;}?></td>
        </tr>
        <tr>
        	<td><label>Tình trạng</label><br /><input type="text" name="tinh_trang" /><?php if(isset($error_tinh_trang)){echo $error_tinh_trang;}?></td>
        </tr>
        <tr>
        	<td><label>Khuyến mãi</label><br /><input type="text" name="khuyen_mai" /><?php if(isset($error_khuyen_mai)){echo $error_khuyen_mai;}?></td>
        </tr>
        <tr>
        	<td><label>Trạng thái</label><br /><input type="text" name="trang_thai" /><?php if(isset($error_trang_thai)){echo $error_trang_thai;}?></td>
        </tr>
        <tr>
        	<td><label>Sản phẩm đặc biệt</label><br /><input type="radio" name="dac_biet" value=1/> Có <input checked="checked" type="radio" name="dac_biet" value=0 /> Không</td>
        </tr>
        <tr>
        	<td><label>Chi tiết sản phẩm</label><br /><textarea name="chi_tiet_sp" id=""></textarea><?php if(isset($error_chi_tiet_sp)){echo $error_chi_tiet_sp;}?></td>
        </tr>
        <tr>
        	<td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>