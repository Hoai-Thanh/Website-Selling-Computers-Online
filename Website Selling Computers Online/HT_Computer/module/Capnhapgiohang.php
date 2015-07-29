<?php
session_start();
for($i=1;$i<=$_SESSION["somathang"];$i++){
	if ($_POST["C".$i]=="") {
		$_SESSION["soluong".$i]=1;
	}else
	{
	$_SESSION["soluong".$i]=$_POST["C".$i];
	}
}
echo "<script language='javascript'>location.href='".$_SERVER['HTTP_REFERER']."';</script>";
?>
