<?php
include ("init.php");
include("config.php");
$upload_dir = $logsDir;
$filename = isset($_GET['file'])?$_GET['file']:'';
if ( $filename == "" || !is_file($upload_dir.$filename) || !is_readable($upload_dir.$filename) ) {
    echo "Loi: Ten file khong hop le hoac file khong ton tai!";
    exit(-1);
}
//mở file để đọc với chế độ nhị phân (binary)
$fp = fopen($upload_dir.$filename, "rb");
 
//gởi header đến cho browser
header('Content-type: application/octet-stream');
header('Content-disposition: attachment; filename="'.$filename.'"');
header('Content-length: ' . filesize($upload_dir.$filename));
 
//đọc file và trả dữ liệu về cho browser
fpassthru($fp);
fclose($fp);
?>