<?php ob_start();
include("../dbcon.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cập Nhật Thuộc Tính Loại Sản Phẩm</title>
<link href="style_admin/style_control.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="back"><a href="index.php"><< Quay lại trang quản trị</a></div>
<?php 
if(isset($_GET['idLoai']))
{
	//include("../dbcon.php");
	$kq=mysql_query("select * from loaisp where idLoai=".$_GET['idLoai']);
	$d=mysql_fetch_array($kq);
?>
<form method="post" name="frmSuaLoai" id="frmSuaLoai">
<h2 align="center" style="color:#F00; font-family:Tahoma">Cập Nhật Loại Sản Phẩm</h2>
  <center><table id="them" width="400" border="1" bordercolor="#0069A8" style="border-collapse: collapse" cellpadding="0">
    <tr>
      <td width="139">Tên loại sản phẩm:</td>
      <td width="245"><input type="text" name="loai" id="loai" value="<?php echo $d["TenLoai"]; ?>"/></td>
    </tr>
    <tr>
      <td>Chủng loại:</td>
      <td><select name="chungloai" id="chungloai">
      <?php
	  $kqcl=mysql_query("select * from chungloaisp");
	  while($dcl=mysql_fetch_array($kqcl))
	  {?>
      <option value="<?php echo $dcl['idCL']; ?>"<?php if($d['idCL']==$dcl['idCL']) echo "selected='selected'"?>><?php echo $dcl['TenCL']; ?></option>
	  <?php }
	  ?>
      </select></td>
    </tr>
    <tr>
    	<td>&nbsp;</td>
        <td><input type="submit" name="sua" id="sua" value="Update" />
    <a href="index.php" onclick="return confirm('Trở về trang chủ ?');"><input type="button" name="huy" id="huy" value="Cancel" /></a></td>
    </tr>
  </table>
</center>
</form>
<?php } 
if(isset($_POST['sua']))
{
	$upd="update loaisp set TenLoai='{$_POST['loai']}', idCL={$_POST['chungloai']} where idLoai={$_GET['idLoai']}";
	if(mysql_query($upd))
	{
		header("location:index.php?key=loaisanpham");
	}
	else
	echo $upd;
}
?>
</body>
</html>