<?php include_once("cart.php");
if(@is_array($_SESSION["somathang"])){//@ co hoac bo//neu co gio hang liet ke ko Gio hang chua co sam pham.
	?>
	<a href="index.php?key=xemgiohang">(<?php echo count($_SESSION["GioHang"]); ?>)Sản phẩm</a>
    <ul>
    <?php
	$max=count($_SESSION["somathang"]);
	for($i=0;$i<$max;$i++)
	{	
		$idSP=$_SESSION["somathang"][$i]["idSP"];
		$SoLuong=$_SESSION["somathang"][$i]["SoLuong"];
		$DonGia=$_SESSION["somathang"][$i]["DonGia"];
		if($SoLuong==0)
		continue;
		?>
     <li>
     <p>
    <?php echo "idSP: ".$idSP;?>
     </p>
     <div>
<p>So luong:<?php echo $SoLuong; ?></p>
<p><?php echo "Tien : ".$DonGia*$SoLuong;?></p>
</div>
</li>
<?php
	}
?>
</ul>
<div>
<p>Tong tien:<?php echo get_order_total();?></p>
</div>
<a href="index.php?key=donhang">Mua Hang</a>
<?php } else { ?>
<ul>
	<li>Gio hang chua co san pham nao!</li>
</ul>
<?php
}
?>

