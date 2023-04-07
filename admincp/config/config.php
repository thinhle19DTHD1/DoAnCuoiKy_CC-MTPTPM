<?php
$mysqli = new mysqli("localhost","root","ttn","web_shopthoitrang");

// Check connection
if ($mysqli->connect_errno) {
  echo "Kết nỗi MYSQLi bị lỗi" . $mysqli->connect_error;
  exit();
}
?>