<?php
session_start();

//tao ngau nhien 1 so co 5 chu so
$rand = rand(10000, 99999);

//tao gia tri bam cho so ngau nhien va dua vao bien Session "image_random_value"
$_SESSION['image_random_value'] = md5($rand);

// tao anh
$image = imagecreate(60, 30);

// su dung anh nen trang
$bgColor = imagecolorallocate ($image, 255, 255, 255); 

// mau chu la mau den
$textColor = imagecolorallocate ($image, 0, 0, 0); 

// ghi so ngau nhien
imagestring ($image, 5, 5, 8,  $rand, $textColor); 
	

// Gui cac thong tin header de dam bao anh duoc lay truc tiep tu PHP	
// Ngay het han 
header("Expires: Mon, 26 Jul 2010 05:00:00 GMT"); 

// ngay chinh sua
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 

// HTTP/1.1 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false); 

// HTTP/1.0 
header("Pragma: no-cache"); 	


// gui loai hinh anh
header('Content-type: image/jpeg');

// gui anh len trinh duyet web
imagejpeg($image);

// giai phong bo nho danh cho anh
imagedestroy($image);
?>
