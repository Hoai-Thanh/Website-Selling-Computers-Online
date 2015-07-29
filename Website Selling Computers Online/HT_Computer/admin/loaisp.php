<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="style_admin/style_control.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
  include("../dbcon.php");
  
  if(isset($_GET['xoa']))
  {
	  $del="delete from loaisp where idLoai=".$_GET['xoa'];
	if(mysql_query($del))
	echo "<script language='javascript'>alert('Đã xóa sản phẩm');</script>";
	else echo "Không thể xóa!";
  }
  $kqt=mysql_query("select * from loaisp");
$st=10;
$tst=ceil(mysql_num_rows($kqt)/$st);
  ?>
<table width="518" border="1" bordercolor="#0069A8">
  <tr id="thuoctinh">
    <td width="102" >Mã Loại</td>
    <td width="116">Tên Loại</td>
    <td width="173">Chủng Loại</td>
    <td width="99">Chức Năng</td>
  </tr>
  
  <?php 

	// lay trang:
	if(isset($_GET['page']))
	$page=$_GET['page'];
	else
	$page=1;
	
	// Tinh vi tri:
	$vitri=($page-1)*$st;
  $sl="select * from loaisp limit $vitri,$st";
  $kq=mysql_query($sl);
  
  while($d=mysql_fetch_array($kq))
  {
  ?>
  <tr id="data">
    <td height="30" id="id"><?php echo $d['idLoai'];?></td>
    <td><?php
	echo $d['TenLoai'];?></td>
    <td><?php $slcl="select * from chungloaisp where idCL ={$d['idCL']}";
	$kqcl=mysql_query($slcl);
	$dcl=mysql_fetch_array($kqcl);
	echo $dcl['TenCL'];?></td>
    
    <td id="id"><a href="index.php?key=loaisanpham&xoa=<?php echo $d['idLoai'];?>" onclick="return confirm('Ban co chac chan khong?');">Xóa</a> | <a href="sua_loaisp.php?idLoai=<?php echo $d['idLoai'];?>">Sửa</a></td>
  </tr>
  <?php }?>
</table>
<a href="themloaisp.php"><input name="them" type="button" value="Thêm loại sản phẩm mới" /></a><br />
Trang: <?php for($i=1;$i<=$tst;$i++) 
if($i==$page)
echo "<font color='red' size='3'>".$i."</font> &nbsp;";
else
echo "<a href='index.php?key=loaisanpham&page=$i'>".$i."</a> &nbsp;";?>
</body>
</html>