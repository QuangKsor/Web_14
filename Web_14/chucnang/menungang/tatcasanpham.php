
<link rel="stylesheet" type="text/css" href="css/tatcasanpham.css"> 
<div class="prd-block">
    <h2>Tất cả sản phẩm</h2>
    <div class="pr-list">
        <?php
            //Số bản ghi trên trang
            $rowPerPage = 8;
            //Số trang
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            //Vị trí
            $perRow = $page*$rowPerPage-$rowPerPage;
            $sql = "SELECT * FROM sanpham LIMIT $perRow,$rowPerPage";
            $query = mysqli_query($conn, $sql);
            //Tổng số bản ghi
            $totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanpham"));
            //Tổng số trang
            $totalPage = ceil($totalRow / $rowPerPage);
            $listPage = '';
            //Nút trang trước và trang đầu
            if($page > 1){
                $listPage .= '<a href="index.php?page_layout=tatcasanpham'.'&page=1"> First </a>';
                $prev = $page - 1;
                $listPage .= '<a href="index.php?page_layout=tatcasanpham'.'$page='.$prev.'"> << </a>';
            }
            //Các phím số
            for($i = 1; $i <= $totalPage; $i++){
                if($i == $page){
                    $listPage .= '<span> ' .$i. '</span';
                }
                else {
                    $listPage .= '<a href="index.php?page_layout=tatcasanpham'.'&page='.$i.' "> '.$i.' </a>';
                }
            }
            //Nút trang sau và trang cuối
            if($page < $totalPage){
                $next = $page + 1;
                $listPage .= '<a href="index.php?page_layout=tatcasanpham'.'&page='.$next.' "> >> </a>';
                $listPage .= '<a href="index.php?page_layout=tatcasanpham'.'&page='.$totalPage.' "> Last </a>';
            }
            $i = 0;
            while($row = mysqli_fetch_array($query)){
        ?>
            <div class="prd-item">
                <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><img width="140" height="150" src="quantri/anh/<?php echo $row ['anh_sp'] ?>" /></a>
                <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><?php echo $row['ten_sp'] ?></a></h3>
                <p>Tình trạng: <?php echo $row['tinh_trang'] ?></p>
                <p class="price"><span>Giá: <?php echo $row['gia_sp'] ?> VNĐ</span></p>
            </div>
        <?php
            $i++;
            if($i%4==0){
                echo '<div class="clear"></div>';
            }
            }
        ?>
    </div>
</div>
<div id="pagination"><?php echo $listPage ?></div>