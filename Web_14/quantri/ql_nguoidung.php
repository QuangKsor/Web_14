<link rel="stylesheet" href="css/ql_user.css">
<?php
    $sql = "SELECT * FROM thanhvien ORDER BY id ASC";
    $query = mysqli_query($conn, $sql);

?>
<div id="main">
    <p id="add-prd"><a href="quantri.php?page_layout=them_user"><span>Thêm người dùng mới</span></a></p>
    <table>
        <tr>
            <td width="10%">ID</td>
            <td width="20%">Tên người dùng</td>
            <td width="25%">Email</td>
            <td width="15%">Mật khẩu</td>
            <td width="15%">Quyền</td>
            <td width="10%">Sửa</td>
            <td width="15%">Xóa</td>
        </tr>
        <?php
            while($row = mysqli_fetch_array($query)){ 
        ?>
            <tr>
                <td><span><?php echo $row['id'];?></span></td>
                <td class="l5"><a href="#"><?php echo $row['name'];?></a></td>
                <td class="l5"><a href="#"><?php echo $row['email'];?></a></td>
                <td class="l5"><a href="#"><?php echo $row['pass'];?></a></td>
                <td class="l5"><a href="#"><?php 
                    if ($row['role'] == 1){
                        echo "Admin";
                    }else if($row['role'] == 0){
                        echo "User";
                    }
                 ;?></a>
                 </td>
                <td><a href="quantri.php?page_layout=sua_user&id=<?php echo $row['id'];?>"><span>Sửa</span></a></td>
                <td><a href="xoa_user.php?id=<?php echo  $row['id'];?>"><span>Xóa</span></a></td>
            </tr>
            <?php
            }
            ?>
    </table>
</div>