<?php
 
require './QLNV/nhanvien.php';
    
if (!empty($_POST['add_nhanvien.php']))
{
    $data['Ma_NV']        = isset($_POST['ma']) ? $_POST['ma'] : '';
    $data['Ten_NV']       = isset($_POST['ten']) ? $_POST['ten'] : '';
    $data['Phai']         = isset($_POST['phai']) ? $_POST['phai'] : '';
    $data['Noi_Sinh']     = isset($_POST['noisinh']) ? $_POST['noisinh'] : '';
    $data['Ma_Phong']     = isset($_POST['maphong']) ? $_POST['maphong'] : '';
    $data['Luong']        = isset($_POST['luong']) ? $_POST['luong'] : '';

     
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
     
    if (!$errors){
        add_nhanvien($data['Ma_NV'], $data['Ten_NV'], $data['Phai'], $data['Noi_Sinh'], $data['Ma_Phong'], $data['Luong'] );
        header("location: ds_nhanvien.php");
    }
}
 
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Thêm nhân viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Thêm nhân viên </h1>
        <a href="ds_nhanvien.php">Trở về</a> <br/> <br/>
        <form method="post" action="add_nhanvien.php">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Mã nhân viên</td>
                    <td>
                        <input type="text" name="ma" value="<?php echo !empty($data['Ma_NV']) ? $data['Ma_NV'] : ''; ?>"/>
                        <?php if (!empty($errors['Ma_NV'])) echo $errors['Ma_NV']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Họ tên</td>
                    <td>
                        <input type="text" name="ten" value="<?php echo !empty($data['Ten_NV']) ? $data['Ten_NV'] : ''; ?>"/>
                        <?php if (!empty($errors['Ten_NV'])) echo $errors['Ten_NV']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td>
                        <select name="phai">
                            <option value="NAM">Nam</option>
                            <option value="NU" <?php if (!empty($data['Phai']) && $data['Phai'] == 'NU') echo 'selected'; ?>>Nữ</option>
                        </select>
                        <?php if (!empty($errors['Phai'])) echo $errors['Phai']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Nơi Sinh</td>
                    <td>
                        <input type="text" name="noisinh" value="<?php echo !empty($data['Noi_Sinh']) ? $data['Noi_Sinh'] : ''; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Mã phòng</td>
                    <td>
                        <input type="text" name="maphong" value="<?php echo !empty($data['Ma_Phong']) ? $data['Ma_Phong'] : ''; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Lương</td>
                    <td>
                        <input type="text" name="luong" value="<?php echo !empty($data['Luong']) ? $data['Luong'] : ''; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="add_nhanvien" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>