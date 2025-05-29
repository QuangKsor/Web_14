<?php
    include_once('ketnoi.php');
    $id_dm = $_GET['id_dm'];
	//Tính số lượng danh mục
	$result = mysqli_query($conn, 'select count(id_sp) as total from sanpham WHERE id_dm='.$id_dm);
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];
	$sql = "DELETE FROM dmsanpham WHERE id_dm = $id_dm";
	if ($total_records < 1) {
		$query = mysqli_query($conn,$sql);
		header('location:quantri.php?page_layout=ql_dm');
	}else {
		header('location:quantri.php?page_layout=ql_dm');
	}
?>