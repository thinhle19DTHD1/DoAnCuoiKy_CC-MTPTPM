<?php
require './QLNV/nhanvien.php';
$nhanvien = get_all_nhanvien();
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách nhân viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Danh sách nhân viên</h1>
        <a href="add_nhanvien.php">Thêm nhân viên</a> <br/> <br/>
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>Mã nhân viên</td>
                <td>Họ tên</td>
                <td>Giới tính</td>
                <td>Nơi sinh</td>
                <td>Mã phòng</td>
                <td>Lương</td>

            </tr>
            <?php foreach ($nhanvien as $item){ ?>
            <tr>
                <td><?php echo $item['Ma_NV']; ?></td>
                <td><?php echo $item['Ten_NV']; ?></td>
                <td><?php echo $item['Phai']; ?></td>
                <td><?php echo $item['Noi_Sinh']; ?></td>
                <td><?php echo $item['Ma_Phong']; ?></td>
                <td><?php echo $item['Luong']; ?></td>
                
                <td>
                    <form method="post" action="del_nhanvien.php">
                        <input onclick="window.location = 'edit_nhanvien.php?Ma_NV=<?php echo $item['Ma_NV']; ?>'" type="button" value="Sửa"/>
                        <input type="hidden" name="ma" value="<?php echo $item['Ma_NV']; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>