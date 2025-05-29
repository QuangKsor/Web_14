<?php
    include_once('ketnoi.php');
	$id = $_GET['id'];
	//Tính số lượng người dùng Admin
	$result = mysqli_query($conn, 'select count(id) as total from thanhvien WHERE role=1');
	$row = mysqli_fetch_assoc($result);
	$total_records = $row['total'];
	//Nếu số người dùng admin lớn hơn 1 thì mới được phép xóa tài khoản admin này đi
	if ($total_records > 1) {
		$sql = "DELETE FROM thanhvien WHERE id = $id";
		$query = mysqli_query($conn,$sql);
		header('location:quantri.php?page_layout=ql_nguoidung');
	}else {
		header('location:quantri.php?page_layout=ql_nguoidung');
	}	
?>