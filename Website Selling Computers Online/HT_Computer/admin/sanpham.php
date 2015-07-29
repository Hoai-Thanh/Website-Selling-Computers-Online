<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang Quản Lý Danh Mục Sản Phẩm</title>
<link rel="shortcut icon" href="icons/login_admin.png" type="image/x-icon" />
<link href="style_admin/style_control.css" rel="stylesheet" type="text/css" />
</head>

<body>

<table width="1052" border="1" bordercolor="#0069A8">
  <tr id="thuoctinh">
    <td width="102" >Mã Sản Phẩm</td>
    <td width="169">Tên Sản Phẩm</td>
    <td width="116">Loại Sản Phẩm</td>
    <td width="173">Chủng Loại</td>
    <td width="79">Hãng Sản Xuất</td>
    <td width="131">Hình Ảnh</td>
    <td width="131">Đơn Giá</td>

    <td width="99">Chức Năng</td>
  </tr>
  <?php
  include("../dbcon.php");
  
  if(isset($_GET['xoa']))
  {
	  $del="delete from sanpham where idSP=".$_GET['xoa'];
	if(mysql_query($del))
	echo "<script language='javascript'>alert('Đã xóa sản phẩm');</script>";
	else echo "Không thể xóa!";
  }
  $kqt=mysql_query("select * from sanpham");
$st=6;
$tst=ceil(mysql_num_rows($kqt)/$st);
  // lay trang:
	if(isset($_GET['page']))
	$page=$_GET['page'];
	else
	$page=1;
	
	// Tinh vi tri:
	$vitri=($page-1)*$st;
  $sl="select * from sanpham limit $vitri,$st";
  $kq=mysql_query($sl);
  while($d=mysql_fetch_array($kq))
  {
  ?>
  <tr id="data">
    <td height="30" id="id"><?php echo $d['idSP'];?></td>
    <td><?php echo $d['TenSP'];?></td>
    <td id="id"><?php $sll="select * from loaisp where idLoai ={$d['idLoai']}";
	$kql=mysql_query($sll);
	$dl=mysql_fetch_array($kql);
	echo $dl['TenLoai'];?></td>
    <td id="id"><?php $slcl="select * from chungloaisp where idCL ={$d['idCL']}";
	$kqcl=mysql_query($slcl);
	$dcl=mysql_fetch_array($kqcl);
	echo $dcl['TenCL'];?></td>
    
    <td id="id"><?php 
	$slh="select * from hangsx where idHang ={$d['idHang']}";
	$kqh=mysql_query($slh);
	$dh=mysql_fetch_array($kqh);
	echo $dh['TenHang'];?></td>
    <td id="id">...</td>
    <td id="id"><?php echo $d['DonGia'];?></td>
        <td id="id"><a href="index.php?key=sanpham&xoa=<?php echo $d['idSP'];?>" onclick="return confirm('Ban co chac chan khong?');">Xóa</a> | <a href="sua_sanpham.php?idSP=<?php echo $d['idSP'];?>">Sửa</a></td>
  </tr>
  <?php }?>
</table>
<a href="themsp.php"><input name="them" type="button" value="Thêm sản phẩm" /></a>
Trang: <?php for($i=1;$i<=$tst;$i++) 
if($i==$page)
echo "<font color='red' size='3'>".$i."</font> &nbsp;";
else
echo "<a href='index.php?key=sanpham&page=$i'>".$i."</a> &nbsp;";?>
</body>
</html>
