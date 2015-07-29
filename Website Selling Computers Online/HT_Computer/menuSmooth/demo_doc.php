<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<link rel="stylesheet" type="text/css" href="mrk_smooth/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="mrk_smooth/ddsmoothmenu-v.css" />

<script type="text/javascript" src="mrk_smooth/jquery.min.js"></script>
<script type="text/javascript" src="mrk_smooth/ddsmoothmenu.js">


</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "smoothmenu2", //Menu DIV id
	orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
	//customtheme: ["#804000", "#482400"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>
</head>

<body>

<div id="smoothmenu2" class="ddsmoothmenu-v">
<ul>
<?php 
$slcl="select * from chungloaisp";
	$kqcl=mysql_query($slcl);
	while ($dcl=mysql_fetch_array($kqcl))
	{
 ?>
<!--level 1-->
<li><a href="#"><?php echo $dcl['TenCL']; ?></a>
  <ul>
  <?php 
	  $sll="select * from loaisp where idCL=".$dcl['idCL'];
	  $kql=mysql_query($sll);
	  while ($dl=mysql_fetch_array($kql))
	  {
	  ?>
  	<!--level 2--><li><a href="#"><?php echo $dl['TenLoai']; ?></a></li><!--level 2-->
	<?php } ?>
  </ul>
</li>
<!--// level 1-->
<?php } ?>
</ul>
<br style="clear: left" />
</div>

</body>
</html>
