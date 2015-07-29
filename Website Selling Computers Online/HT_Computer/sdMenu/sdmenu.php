	<link rel="stylesheet" type="text/css" href="sdMenu/sdmenu.css" />
	<script type="text/javascript" src="sdMenu/sdmenu.js">
		/***********************************************
		* Slashdot Menu script- By DimX
		* Submitted to Dynamic Drive DHTML code library: http://www.dynamicdrive.com
		* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
		***********************************************/
	</script>
	<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
	// ]]>
	</script>

    <?php
	//include("conect.php");
	$kq1=mysql_query("select * from chungloaisp");
	
	?>

    <div style="float: left" id="my_menu" class="sdmenu">
    <?php
	while($d=mysql_fetch_array($kq1)){
		?>
      <div> 
      <span><?php echo $d['TenCL'] ?></span> 
      <?php 
	  $kq2=mysql_query("select * from loaisp where idCL=".$d['idCL']);
	  while($dl=mysql_fetch_array($kq2)){
	  ?>
      <a href="index.php?key=loaisp&idLoai=<?php echo $dl['idLoai'];?>"><?php echo $dl['TenLoai']?></a>
      <?php }?> 
      </div>
     <?php } ?>
</div>