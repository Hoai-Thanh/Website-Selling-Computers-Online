

<link rel="stylesheet" type="text/css" href="smoothmenu on pc11/mrk_smooth/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="smoothmenu on pc11/mrk_smooth/ddsmoothmenu-v.css" />

<script type="text/javascript" src="smoothmenu on pc11/mrk_smooth/jquery.min.js"></script>
<script type="text/javascript" src="smoothmenu on pc11/mrk_smooth/ddsmoothmenu.js">


</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "smoothmenu1", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>
</head>

<body>

<?php //include("../dbcon.php");?>
<div id="smoothmenu1" class="ddsmoothmenu">

    <ul>
    <?php 
	$slcl="select * from chungloaisp";
	$kqcl=mysql_query($slcl);
	while ($dcl=mysql_fetch_array($kqcl))
	{
	?>
    <li><a href="<?php echo $dcl['idCL']; ?>"><?php echo $dcl['TenCL']; ?></a>
      <ul>
      <?php 
	  $sll="select * from loaisp where idCL=".$dcl['idCL'];
	  $kql=mysql_query($sll);
	  while ($dl=mysql_fetch_array($kql))
	  {
	  ?>
      	<li><a href="<?php echo $dl['idLoai']; ?>"><?php echo $dl['TenLoai']; ?></a></li>
        <?php } ?>
      </ul>
      
    </li>
    <?php } ?>
    </ul>

</div>

