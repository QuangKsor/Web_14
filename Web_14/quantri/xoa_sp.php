<?php
    include_once('ketnoi.php');
    $id_sp = $_GET['id_sp'];
	$sql = "DELETE FROM sanpham WHERE id_sp = $id_sp";
	$query = mysqli_query($conn,$sql);
	header('location:quantri.php?page_layout=danhsachsp');
?>