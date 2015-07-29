<?php  ob_start();
include("../dbcon.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../ckeditor/sample.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm Mới Sản Phẩm</title>
<link href="style_admin/style_control.css" rel="stylesheet" type="text/css" />
</head>
<?php 
$target_path = "images/product/";


if(isset($_FILES['hinh'])&& isset($_POST['them']))
{

$target_path = $target_path . basename($_FILES['hinh']['name']); 

// kiem tra phan mo rong cua file
if ( !preg_match('/\.(jpg|gif)$/i',basename($_FILES['hinh']['name'] )) )
{ echo "<script>alert('File ảnh không hợp lệ, kiểm tra lại định dạng file!');</script>";
}

else
// kiem tra file ton tai
if (file_exists($target_path))
      {
      echo "<script>alert('File ảnh đã tồn tại, chọn lại file ảnh khác');</script>";
      }

else
if(move_uploaded_file($_FILES['hinh']['tmp_name'],$target_path)) {
"File ".  basename($_FILES['hinh']['name']);
	
} else{
    echo "<script>alert('Vui lòng chọn lại hình có kích thước nhỏ hơn 500KB)!')</script>";
}

		$sl="insert into sanpham value(NULL,'{$_POST['Ten']}',{$_POST['chungloai']},{$_POST['loai']},{$_POST['hang']},'{$_POST['chitiet']}','$target_path',{$_POST['dongia']})";

	if(mysql_query($sl))
	{
		
		$url="index.php?key=sanpham";
		header("Location:$url");
		echo "<script>alert('Thêm thành công');</script>";
	}
	else echo "<script>alert('Thêm thất bại!');</script>";
		
}
?>
<body>
<form action="" method="post" name="form1" enctype="multipart/form-data" >
<div id="back"><a href="index.php"><< Quay lại trang quản trị</a></div>

<h2 align="center" style="color:#F00; font-family:Tahoma">Thêm Sản Phẩm</h2>
  <center><table id="them" width="800" border="1"  bordercolor="#0069A8" style="border-collapse: collapse" cellpadding="0">
    <tr>
      <td width="144">Tên Sản Phẩm:</td>
      <td width="344"><input name="Ten" type="text" id="Ten" size="25" value="<?php if(isset($_POST['Ten'])) echo $_POST['Ten'];?>"/></td>
    </tr>
    <tr>
      <td>Chủng Loại:</td>
      <td><select name="chungloai" id="chungloai" onchange="document.form1.submit();">
      
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
	//$temp = 'idCL = $k';
		$sl = "select * from loaisp where idCL=".$k;
		$kq=mysql_query($sl);
	
  ?>
      <select name="loai" id="loai">
        <?php 
	while ($dloai=mysql_fetch_array($kq))
	{ ?>
      <option value="<?php echo $dloai['idLoai'] ?>"><?php echo $dloai['TenLoai'] ?></option>
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
        <option value="<?php echo $dh['idHang'] ?>"><?php echo $dh['TenHang']; ?></option>
        <?php }
	  ?>
        </select></td>
    </tr>
    <tr>
      <td valign="top">Chi Tiết Sản Phẩm:</td>
      <td><textarea name="chitiet" cols="30" rows="10" id="chitiet" class="ckeditor" style="width:344; height:100"></textarea></td>
    </tr>
    <tr>
      <td>Hình:</td>
      <td><input name="hinh" id="hinh" type="file"/><input type="hidden" name="MAX_FILE_SIZE" value="500000"></td>
    </tr>
    <tr>
      <td>Đơn Giá:</td>
      <td><input type="text" name="dongia" id="dongia" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="them" id="them" value="Thêm" />
    <a href="index.php" onclick="return confirm('Trở về trang chủ ?');"><input type="button" name="huy" id="huy" value="Cancel" /></a></td>
    </tr>
  </table></center>
</form>
</body>
</html>