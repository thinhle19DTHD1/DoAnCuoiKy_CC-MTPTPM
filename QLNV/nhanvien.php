<?php
global $conn;
 
function connect_db()
{
    global $conn;
     
    if (!$conn){
        $conn = mysqli_connect('localhost', 'root', 'ttn', 'ql_nhansu') or die ("Cant not connect to database");
        mysqli_set_charset($conn, 'utf8');
    }
}
 
function disconnect_db()
{
    global $conn;
     
    if ($conn){
        mysqli_close($conn);
    }
}
 
function get_all_nhanvien()
{
    global $conn;
     
    connect_db();
     
    $sql = "select * from nhanvien";
     
    $query = mysqli_query($conn, $sql);
     
    $result = array();
     
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
     
    return $result;
}
 
function get_nhanvien($ma_nv)
{
    global $conn;
     
    connect_db();
     
    $sql = "select * from nhanvien where Ma_NV = {$ma_nv}";
     
    $query = mysqli_query($conn, $sql);
     
    $result = array();
     
    if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }
     
    return $result;
}
 
function add_nhanvien($ma_nv, $ten_nv, $phai, $noisinh, $ma_phong, $luong)
{
    global $conn;
     
    connect_db();
     
    $ma_nv = addslashes($ma_nv);
    $ten_nv = addslashes($ten_nv);
    $phai = addslashes($phai);
    $noisinh = addslashes($noisinh);
    $ma_phong = addslashes($ma_phong);
    $luong = addslashes($luong);
     
    $sql = "
            INSERT INTO nhanvien(Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) VALUES
            ('$ma_nv','$ten_nv','$phai','$noisinh','$ma_phong','$luong')
    ";
     
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
 
 
function edit_nhanvien($ma_nv, $ten_nv, $phai, $noisinh, $ma_phong, $luong)
{
    global $conn;
     
    connect_db();
     
    $ma_nv         = addslashes($ma_nv);
    $ten_nv        = addslashes($ten_nv);
    $phai   = addslashes($phai);
    $noisinh   = addslashes($noisinh);
    $ma_phong   = addslashes($ma_phong);
    $luong   = addslashes($luong);
     
    $sql = "
            UPDATE nhanvien SET
            Ma_NV = '$ma_nv',
            Ten_NV = '$ten_nv',
            Phai = '$phai'
            Noi_Sinh = '$noisinh'
            Ma_Phong = '$ma_phong'
            Luong = '$luong'
            WHERE Ma_NV = $ma_nv
    ";
     
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
 
 
function delete_nhanvien($ma_nv)
{
    global $conn;
     
    connect_db();
     
    $sql = "
            DELETE FROM nhanvien
            WHERE Ma_NV = $ma_nv
    ";
     
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
?>