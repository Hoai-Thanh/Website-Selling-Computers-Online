<style type="text/css">
<!--

#sanpham {
	height: 165px;
	width: 150px;
	float:left;
	margin-top: 10px;
	margin-left: 10px;
	margin-right:5px;
	padding: 10px;
	margin-bottom: 10px;
	text-align:center;
}
#hinhanh {
	height: 100px;
	width: 100px;
	text-align:center;
}
#gia {
	text-align: center;
	height: 19px;
	width: 100px;
	color:#06F;
	margin-top:20px;
	padding-top:5px;
}
#tensanpham {
	text-align: center;
	height: 20px;
	width: 120px;
	color:#00F;
	font-size:12px;
	margin-top:10px;
}
#tensanpham a{
	text-decoration:none;
	font-size:13px;
	font-family:tahoma;
}
#tensanpham a:hover {
	color:#F00;
	text-decoration:underline;
}
#main1 {
	width: 578px;
	min-height:880px;
	border:solid #CCC;
	text-align:left;
}
#main1 #nav_bottom {
	background-image: url(images/index/nav_long.jpg);
	background-repeat: no-repeat;
	height: 27px;
	width: 578px;
}
#main1 #nav_bottom #txt_bottom {
	margin-left:10px;
	font-family:tahoma;
	text-align:left;
	padding:5px;
}


-->
</style>

<div id="main1">
<div id="nav_bottom">
<div id="txt_bottom">Loại sản phẩm</div>
</div>

  <?php 
  $idLoai=$_GET['idLoai'];
  // tinh tong so trang:
	$stong="select * from sanpham where idLoai=$idLoai";
	$kqtong=mysql_query($stong);
	$st=7;
	$tst=ceil(mysql_num_rows($kqtong)/$st);
  // lay trang:
	if(isset($_GET['page']))
	$page=$_GET['page'];
	else
	$page=1;
	
	// Tinh vi tri:
	$vitri=($page-1)*$st;
  $sl = "select * from sanpham where idLoai=$idLoai limit $vitri,$st";
  $kq = mysql_query($sl);
  while($row = mysql_fetch_array($kq))
  
  { ?>
  <div id="sanpham">
  
    <div id="hinhanh">
    	
        	<img src="<?php echo "admin/".$row['Hinh']?>" width="100px" height="95">
    </div>
    <div id="tensanpham"> <a href="index.php?key=chitiet&idSP=<?php echo $row['idSP'];?>"><?php echo $row['TenSP']?></a> </div>
    <div id="gia">Giá: <?php echo $row['DonGia']; ?></div>
    
  </div>
  <?php } ?>
  
</div>
<div id="page" style="float:left;">Trang: <?php for($i=1;$i<=$tst;$i++) 
if($i==$page)
echo "<font color='red' size='3'>".$i."</font> &nbsp;";
else
echo "<a href='index.php?key=sanpham&page=$i'>".$i."</a> &nbsp;";?>
</div>