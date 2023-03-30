<?php
 
require './QLNV/nhanvien.php';
 
// Lấy thông tin hiển thị lên để người dùng sửa
$ma_nv = isset($_GET['Ma_NV']) ? (int)$_GET['Ma_NV'] : '';
if ($ma_nv){
    $data = get_nhanvien ($ma_nv);
}
 
// Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
   header("location: ds_nhanvien.php");
}
 
// Nếu người dùng submit form
if (!empty($_POST['edit_nhanvien']))
{
    // Lay data
    $data['Ma_NV']        = isset($_POST['ma']) ? $_POST['ma'] : '';
    $data['Ten_NV']       = isset($_POST['ten']) ? $_POST['ten'] : '';
    $data['Phai']         = isset($_POST['phai']) ? $_POST['phai'] : '';
    $data['Noi_Sinh']     = isset($_POST['noisinh']) ? $_POST['noisinh'] : '';
    $data['Ma_Phong']     = isset($_POST['maphong']) ? $_POST['maphong'] : '';
    $data['Luong']        = isset($_POST['luong']) ? $_POST['luong'] : '';
     
    // Validate thong tin
    $errors = array();
    if (empty($data['Ma_NV'])){
        $errors['Ma_NV'] = 'Chưa nhập mã nhân viên';
    }
     
    if (empty($data['Ten_NV'])){
        $errors['Ten_NV'] = 'Chưa nhập tên nhân viên';
    }
    if (empty($data['Phai'])){
        $errors['Phai'] = 'Chưa nhập giới tính nhân viên';
    }
     
    // Neu ko co loi thi insert
    if (!$errors){
        edit_nhanvien($data['Ma_NV'], $data['Ten_NV'], $data['Phai'], $data['Noi_Sinh'], $data['Ma_Phong'], $data['Luong']);
        // Trở về trang danh sách
        header("location: ds_nhanvien.php");
    }
}
 
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Chỉnh sửa nhân viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Chỉnh sửa nhân viên </h1>
        <a href="ds_nhanvien.php">Trở về</a> <br/> <br/>
        <form method="post" action="edit_nhanvien.php?id=<?php echo $data['Ma_NV']; ?>">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Mã nhân viên</td>
                    <td>
                        <input type="text" name="ma" value="<?php echo $data['Ma_NV']; ?>"/>
                        <?php if (!empty($errors['Ma_NV'])) echo $errors['Ma_NV']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Họ tên</td>
                    <td>
                        <input type="text" name="ten" value="<?php echo $data['Ten_NV']; ?>"/>
                        <?php if (!empty($errors['Ten_NV'])) echo $errors['Ten_NV']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <select name="sex">
                            <option value="NAM">Nam</option>
                            <option value="NU" <?php if ($data['Phai'] == 'Nữ') echo 'selected'; ?>>Nu</option>
                        </select>
                        <?php if (!empty($errors['Phai'])) echo $errors['Phai']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Nơi sinh</td>
                    <td>
                        <input type="text" name="noisinh" value="<?php echo $data['Noi_Sinh']; ?>"/>
                        <?php if (!empty($errors['Noi_Sinh'])) echo $errors['Noi_Sinh']; ?>
                    </td>
                </tr>
                <tr>
                    <td>mã phòng</td>
                    <td>
                        <input type="text" name="maphong" value="<?php echo $data['Ma_Phong']; ?>"/>
                        <?php if (!empty($errors['Ma_Phong'])) echo $errors['Ma_Phong']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Lương</td>
                    <td>
                        <input type="text" name="luong" value="<?php echo $data['Luong']; ?>"/>
                        <?php if (!empty($errors['Luong'])) echo $errors['Luong']; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="ma" value="<?php echo $data['Ma_NV']; ?>"/>
                        <input type="submit" name="edit_nhanvien" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>