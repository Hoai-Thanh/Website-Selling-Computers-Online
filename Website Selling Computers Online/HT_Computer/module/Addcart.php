<?php session_start();
		ob_start();
include("cart.php");
$idSP=$_POST["idSP"];
$DonGia=$_POST["DonGia"];
$Hinh = $_POST['Hinh'];

$SoLuong=intval($_POST["SoLuong"]);
if($SoLuong<=0)
		$SoLuong=1;
addcart($idSP,$SoLuong,$DonGia,$Hinh);
//header('location:".$_SERVER['HTTP_REFERER']');
echo "<script language='javascript'>location.href='".$_SERVER['HTTP_REFERER']."';</script>"; 
?>
