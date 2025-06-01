<!-- <link rel="stylesheet" href="../../css/khuyenmai.css"> -->
<div class="prd-block">
    <h2>Sản phẩm khuyến mãi</h2>
    <div class="prd-list">
        <?php
            $sql = "SELECT * FROM sanpham WHERE khuyen_mai = 'có' ORDER BY id_sp DESC LIMIT 0,10";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)){
        ?>   
            <div class="prd-item">
                <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><img width="230px" height="250px" src="quantri/anh/<?php echo $row['anh_sp'] ?>" /></a>
                <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><?php echo $row['ten_sp'] ?></a></h3>
                <p>Tình trạng: <?php echo $row['tinh_trang'] ?></p>
                <p class="price">Giá: <span><?php echo $row['gia_sp'] ?>đ</span></p>
            </div>  
        <?php   
            }
        ?>
    </div>
</div>
