<?php
    require './QLNV/nhanvien.php';
 
    $ma_nv = isset($_POST['Ma_NV']) ? (int)$_POST['Ma_NV'] : '';
    if ($ma_nv){
        delete_nhanvien($ma_nv);
    }
     
    header("location: ds_nhanvien.php");
?>