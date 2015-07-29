<?php
// Bat dau session (quan trong)
session_start();

//Neu nguoi dung da dang nhap thanh cong, thi huy bien session
if (isset($_SESSION['image_is_logged_in'])) 
{
	unset($_SESSION['image_is_logged_in']);
}

//Da dang xuat, quay tro lai trang login.php
header('Location: login.php');
?>