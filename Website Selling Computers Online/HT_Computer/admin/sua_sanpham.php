<?php ob_start();
include("../dbcon.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../ckeditor/sample.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style_admin/style_control.css" rel="stylesheet" type="text/css" />
<title>Cập Nhật Sản Phẩm</title>
</head>
<?php 
if(isset($_FILES['ufile'])&&isset($_POST['sua']))
{		
	if($_FILES['ufile']['name']!="")
	{
		//Co cap nhat hinh
		$target="images/product/".basename($_FILES['ufile']['name']);
		if(move_uploaded_file($_FILES['ufile']['tmp_name'],$target))
		{
			$target_path="images/product/".basename($_FILES['ufile']['name']);// luu lai duong link de update database
			unlink($_POST['hinh']);// xoa hinh cu di
		}
			$sl="update sanpham set TenSP='{$_POST['Ten']}', idCL={$_POST['chungloai']}, idLoai={$_POST['loai']}, 			idHang={$_POST['hang']}, ChiTietSP='{$_POST['chitiet']}', Hinh='$target_path', DonGia={$_POST['dongia']} where idSP={$_GET['idSP']}";
	}
	else
	{
		// Khong cap nhat hinh
			$sl="update sanpham set TenSP='{$_POST['Ten']}', idCL={$_POST['chungloai']}, idLoai={$_POST['loai']}, 			idHang={$_POST['hang']}, ChiTietSP='{$_POST['chitiet']}', DonGia={$_POST['dongia']} where idSP={$_GET['idSP']}";
	}
	
	//Thuc hien query
	if(mysql_query($sl))
				header("location:index.php?key=sanpham");
	else
	echo $sl;
	
}
?>
<body>
<div id="back"><a href="index.php"><< Quay lại trang quản trị</a></div>
<?php
//$target_patch="images/product";
if(isset($_GET['idSP']))
{
	//include("../dbcon.php");
	$kq=mysql_query("select * from sanpham where idSP=".$_GET['idSP']);
	$d=mysql_fetch_array($kq);
?>
<h2 align="center" style="color:#F00; font-family:Tahoma">Cập Nhật Sản Phẩm</h2>
<form name="frmCapNhat" id="frmCapNhat" method="post" enctype="multipart/form-data">
  <center><table id="them" width="800" border="1"  bordercolor="#0069A8" style="border-collapse: collapse" cellpadding="0">
    <tr>
      <td width="144">Tên Sản Phẩm:</td>
      <td width="344"><input name="Ten" type="text" id="Ten" value="<?php echo $d['TenSP'];?>" size="25" /></td>
    </tr>
    <tr>
      <td>Chủng Loại:</td>
      <td><select name="chungloai" id="chungloai" onchange="document.frmCapNhat.submit();">
        <?php
	  $kqcl=mysql_query("select * from chungloaisp");
	  while($dcl=mysql_fetch_array($kqcl))
	  {

			$k=$dcl['idCL'];

		  ?>
        <option value="<?php echo $dcl['idCL']; ?>" <?php if(isset($_POST['chungloai'])&& $_POST['chungloai']==$dcl['idCL']) echo "selected='selected'" ?>><?php echo $dcl['TenCL'] ?></option>
        <?php }
	  ?>
      </select>
	  </td>
    </tr>
    <tr>
      <td>Loại Sản Phẩm:</td>
      <td>
      <?php 
  	if(isset($_POST['chungloai']))
	$k=$_POST['chungloai'];
		$sl="select * from loaisp where idCL=".$k;
		$kq=mysql_query($sl);
	
  ?>
      <select name="loai" id="loai">
        <?php 
	while ($dloai=mysql_fetch_array($kq))
	{ ?>
      <option value="<?php echo $dloai['idLoai'] ?>"<?php if(isset($_POST['chungloai'])&& $_POST['chungloai']==$dcl['idCL']) echo "selected='selected'" ?>><?php echo $dloai['TenLoai'] ?></option>
      <?php }?>
      </select></td>
    </tr>
    <tr>
      <td>Hãng Sản Xuất:</td>
      <td><select name="hang" id="hang">
      <?php
	  $kqh=mysql_query("select * from hangsx");
	  while($dh=mysql_fetch_array($kqh))
	  {?>
      <option value="<?php echo $dh['idHang']; ?>"<?php if($d['idHang']==$dh['idHang']) echo "selected='selected'"?>><?php echo $dh['TenHang']; ?></option>
	  <?php }
	  ?>
      </select></td>
    </tr>
    <tr>
      <td valign="top">Chi Tiết Sản Phẩm:</td>
      <td><textarea name="chitiet" cols="30" rows="10" id="chitiet" class="ckeditor" style="width:344; height:100"><?php echo $d['ChiTietSP'];?></textarea></td>
    </tr>
    <tr>
      <td>Hình hiện tại:</td>
      <td><img src="<?php echo $d['Hinh']; ?>" /></td>
    </tr>
    <tr>
      <td>Hình:</td>
      <td><input name="ufile" id="ufile" type="file" /><input type="hidden" name="MAX_FILE_SIZE" value="500000"><input type="hidden" name="hinh" value="<?php echo $d['Hinh']; ?>" /></td>
    </tr>
    <tr>
      <td>Đơn Giá:</td>
      <td><input type="text" name="dongia" id="dongia" value="<?php echo $d['DonGia'];?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="sua" id="sua" value="Update" />
    <a href="index.php" onclick="return confirm('Trở về trang chủ ?');"><input type="button" name="huy" id="huy" value="Cancel" /></a></td>
    </tr>
  </table></center>
</form>
<?php
}// ket thuc if isset

?>
</body>
</html>