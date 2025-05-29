<?php
    include_once('ketnoi.php');
    $id_sp = $_GET['id_sp'];
    $sql = "SELECT * FROM sanpham WHERE id_sp = $id_sp";
    $query = mysqli_query($conn,$sql);
    $sql_dm = "SELECT * FROM dmsanpham";
    $query_dm = mysqli_query($conn,$sql_dm);
    while ($row = mysqli_fetch_assoc($query)) {
?>
    <h2>Sửa thông tin sản phẩm</h2>
<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" >
        <tr>
            <td>
                <label>Danh mục sản phẩm</label><br />
                <select name="id_dm">
                    <?php
                        //$result_dm = mysqli_query($conn, $sql_dm);
                        while ($row_dm = mysqli_fetch_assoc($query_dm)) {
                            echo '<option value="'.$row_dm['id_dm'].'">'.$row_dm['ten_dm'].'</option>';
                        }
                    ?>
                </select>
            </td>
        </tr>
    	<tr>
        	<td><label>Tên sản phẩm</label><br /><input type="text" name="ten_sp" value="<?php echo $row['ten_sp']?>"/></td>
        </tr>
        <tr>
        	<td><label>Ảnh mô tả</label><br /><input type="file" name="anh_sp"/> <input type="text" name="anh_sp" value="<?php echo $row['anh_sp']?>"/></td>
        </tr>
        <tr>
        	<td><label>Giá sản phẩm</label><br /><input type="text" name="gia_sp" value="<?php echo $row['gia_sp']?>"/>VNĐ</td>
        </tr>
        <tr>
        	<td><label>Tình trạng</label><br /><input type="text" name="tinh_trang" value="<?php echo $row['tinh_trang']?>"/></td>
        </tr>
        <tr>
        	<td><label>Khuyến mãi</label><br /><input type="text" name="khuyen_mai" value="<?php echo $row['khuyen_mai']?>"/></td>
        </tr>
        <tr>
        	<td><label>Trạng thái</label><br /><input type="text" name="trang_thai" value="<?php echo $row['trang_thai']?>"/></td>
        </tr>
        <tr>
        	<td><label>Sản phẩm đặc biệt</label><br />Có<input type="radio" name="dac_biet" value=1<?php if($row['dac_biet']==1){echo 'checked';} ?>/> Không <input type="radio" name="dac_biet" value=0 <?php if($row['dac_biet']==0){echo 'checked';} ?>/></td>
        </tr>
        <tr>
        	<td><label>Chi tiết sản phẩm</label><br /><textarea cols="60" rows="12" name="chi_tiet_sp" value=""><?php echo $row['chi_tiet_sp'];?></textarea></td>
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
        //Danh mục sản phẩm
        $id_dm = $_POST['id_dm'];
        //Tên sản phẩm
        $ten_sp = $_POST['ten_sp'];
        //Ảnh sản phẩm
        if($_FILES['anh_sp']['name'] == ''){
            $anh_sp = $_POST['anh_sp'];
        }
        else{
            $anh_sp = $_FILES['anh_sp']['name'];
            $tmp = $_FILES['anh_sp']['tmp_name'];
        }
        //Giá sản phẩm
        $gia_sp = $_POST['gia_sp'];
        //Tình trạng sản phẩm
        $tinh_trang = $_POST['tinh_trang'];
        //Khuyến mãi
        $khuyen_mai = $_POST['khuyen_mai'];
        //Trạng thái
        $trang_thai = $_POST['trang_thai'];
        //Đặc biệt
        $dac_biet = $_POST['dac_biet'];
        //Chi tiết
        $chi_tiet_sp = $_POST['chi_tiet_sp'];

        if($_FILES['anh_sp']['name'] != ""){
            move_uploaded_file($tmp, 'anh/'.$anh_sp);
        }
        $update = "UPDATE sanpham SET   ten_sp = '$ten_sp',
                                        id_dm ='$id_dm',
                                        anh_sp ='$anh_sp',
                                        gia_sp ='$gia_sp',
                                        tinh_trang ='$tinh_trang',
                                        khuyen_mai ='$khuyen_mai',
                                        trang_thai ='$trang_thai', 
                                        dac_biet ='$dac_biet',
                                        chi_tiet_sp = '$chi_tiet_sp' 
                                        WHERE   id_sp =".$id_sp;
        $sqlUpdate = mysqli_query($conn, $update);
        header('location:quantri.php?page_layout=danhsachsp');
    }
?>