<?php
include "menu.php";

?> 
<div class="main_add">
            <h3>Thêm Menu</h3>
            <form action="xulysanpham.php" method="post" enctype="multipart/form-data">
                <div class="add_them">
                    <label for="ten_menu">Thêm Tên Sản Phẩm</label>
                    <input type="text" name="ten_sanpham" placeholder="Nhập Tên Sản Phẩm ... " required>
                </div>
                <div class="add_them">
                    <label for="anh_sanpham">Thêm Ảnh Sản Phẩm</label>
                    <input type="file" name="anh_sanpham">
                </div>
                <div class="add_them">
                    <label for="gia_sanpham">Thêm Giá Sản Phẩm</label>
                    <input type="text" name="gia_sanpham" placeholder="Nhập Giá Sản Phẩm ... " required>
                </div>
                <div class="add_them">
                    <label for="soluong">Thêm Số Lượng Sản Phẩm</label>
                    <input type="text" name="soluong" placeholder="Nhập Số Lượng Sản Phẩm ... " required>
                </div>
                <div class="add_them">
                    <label for="menu">Chọn Menu</label>
                    <select name="menu" id="">
                    <?php
	    		        $sql_danhmuc = "SELECT * FROM tbl_menu ORDER BY id_menu DESC";
	    		        $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
	    		        while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
	    		        ?>
	    		            <option value="<?php echo $row_danhmuc['id_menu'] ?>"><?php echo $row_danhmuc['ten_menu'] ?></option>
	    		        <?php
	    		        } 
	    		        ?>
                    </select>
                </div>
                <button name="them" type="submit">Thêm</button>
            </form>

            <?php
	            $sql_lietke_sp = "SELECT * FROM tbl_sanpham,tbl_menu WHERE tbl_sanpham.id_menu=tbl_menu.id_menu ORDER BY id_sanpham DESC";
	            $query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
            ?>
            <h3>Danh Sách</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>ảnh sản phẩm</th>
                    <th>giá sản phẩm</th>
                    <th>số lượng</th>
                    <th>Menu</th>
                    <th>Edit</th>
                </tr>
                <?php
                    $i = 0;
                     while($row = mysqli_fetch_array($query_lietke_sp)){
  	                $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['ten_sanpham'] ?></td>
                    <td>
                        <img src="upload/<?php echo $row['anh_sanpham'] ?>" alt="" width="150px">
                    </td>
                    <td><?php echo $row['gia_sanpham'] ?></td>
                    <td><?php echo $row['soluong'] ?></td>
                    <td><?php echo $row['ten_menu'] ?></td>
                    <td>
                        <a href="suasanpham.php?id_sanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
                        <a href="xulysanpham.php?id_sanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a>
                    </td>
                </tr>
                <?php
                     }
                ?>
            </table>
        </div>
        <?php
include "footer.php";
?>        