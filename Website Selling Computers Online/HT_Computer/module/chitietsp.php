<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">

#main1 {	
	width: 578px;
	min-height:700px;
	border:solid #CCC;
	text-align:left;
}
#main1 #nav_bottom {
	background-image: url(images/index/nav_long.jpg);
	background-repeat: no-repeat;
	height: 27px;
	width: 578px;
}
#main1 #detail_1 #detail_img {
	float: left;
	height: 200px;
	width: 200px;
	margin-right: 15px;
}
#main1 #nav_bottom #txt_bottom {
	margin-left:10px;
	font-family:tahoma;
	text-align:left;
	padding:5px;
}
#main1 #detail_1 {
	height: 200px;
	width: 570px;
}
#main1 #detail_1 #detail_cat {
	float: left;
	width:305px;
	height: 200px;
	font-family:tahoma;
}
#main1 #detail_2 {
	height: 500px;
	width: 578px;
}
#main1 #detail_2 #detail_content {
	padding: 10px;
	height: 500px;
	width: 500px;
	font-family:tahoma;
	font-size:14px;
}
#main1 #detail_1 #detail_cat #name_pro {
	width: 250px;
	margin:30px 10px 5px 30px;
	font-weight:bold;
	color:#00F;
}
#main1 #detail_1 #detail_cat #cat_pro a {
	color:#36F;
	font-weight:bold;
	text-decoration: none;
	font-size:14px;
}
#main1 #detail_1 #detail_cat #cat_pro a:hover {
	color:#F00;
	font-weight:bold;
	text-decoration: none;
	font-size:14px;
}
#main1 #detail_1 #detail_cat #gia_pro {
	width: 200px;
	margin:2px 10px 5px 30px;
}
#main1 #detail_1 #detail_cat #cat_pro {
	width: 200px;
	margin:2px 10px 2px 30px;
}
</style>
</head>

<body>
<?php 
$sl="select * from sanpham where idSP=".$_GET['idSP']	;
$kq=mysql_query($sl);
$d=mysql_fetch_array($kq);
?>
<div id="main1">
  <div id="nav_bottom">
    <div id="txt_bottom">Chi Tiết Sản Phẩm</div>
  </div>
  <div id="detail_1">
  	<div id="detail_img"><img src="admin/<?php echo $d['Hinh']; ?>" width="200" height="200"/></div>
  	<div id="detail_cat">
   	  <div id="name_pro"><?php echo $d['TenSP']; ?></div>
        <div id="gia_pro"><span style="color:#F00">Giá:</span> <b><?php echo $d['DonGia']; ?></b>&nbsp;VNĐ</div>
        <div id="cat_pro"><img src="images/index/cart_1.jpg" width="20" height="17" /><a href="index.php?key=addcart&idSP=<?php echo $d['idSP'];?>">Đặt hàng</a></div>
    </div>
  </div>
  <hr />
  <div id="detail_2">
  	<div id="detail_content">
    <span style="font-family:tahoma; font-size:14px; font-weight:bold; color:#06C;">Thông tin chi tiết sản phẩm:</span><p>
    <?php echo $d['ChiTietSP']; ?>
    </div>
  </div>
</div>
</body>
</html>