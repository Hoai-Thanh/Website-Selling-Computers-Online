<?php  ob_start();
include("../dbcon.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Thêm Mới Loại Sản Phẩm</title>
<link href="style_admin/style_control.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="back"><a href="index.php"><< Quay lại trang quản trị</a></div>
<form name="form1" action="" method="post">
<center>
<h2 align="center" style="color:#F00; font-family:Tahoma">Thêm Mới Loại Sản Phẩm</h2>
<table id="them" width="400" border="1" bordercolor="#0069A8" style="border-collapse: collapse" cellpadding="0">
  <tr>
    <td width="125">Tên Loại Sản Phẩm:</td>
    <td width="259">
      <input type="text" name="tenloai" id="tenloai" />
</td>
  </tr>
  <tr>
    <td>Thuộc Chủng Loại:</td>
    <td>
      <select name="chungloai" id="chungloai">
      <?php 
	  $slcl="select * from chungloaisp";
	  $kqcl=mysql_query($slcl);
	  while($dcl=mysql_fetch_array($kqcl))
	  {
	  ?>
      <option value="<?php echo $dcl['idCL']; ?>"><?php echo $dcl['TenCL']; ?></option>
      <?php } ?>
      </select>
</td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" name="them" id="them" value="Thêm" />
      <a href="index.php" onclick="return confirm('Trở về trang chủ ?');"><input type="button" name="huy" id="huy" value="Cancel" /></a></td>
  </tr>
</table></center>
</form>
<?php
if(isset($_POST['them']))
{
	$ins="insert into loaisp value(NULL,{$_POST['chungloai']},'{$_POST['tenloai']}')";
	if(mysql_query($ins))
	header("location:index.php?key=loaisanpham");
	else echo $ins;
}
?>
</body>
</html>