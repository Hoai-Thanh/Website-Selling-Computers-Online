<?php
// Bat dau session (quan trong)
session_start();
//kiem tra xem da dang nhap (log in) chua?
if (!isset($_SESSION['image_is_logged_in']) || $_SESSION['image_is_logged_in'] !== true) 
{
	//neu trang nay chua dang nhap (log in) thi chuyen huong sang trang login.php
	header('Location: login.php');
	exit;
}
?>
<html>
<head>
<title>Main User Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="shortcut icon" href="icons/login_admin.png" type="image/x-icon" />
<link href="style_admin/style_control.css" rel="stylesheet" type="text/css">
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css">
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body>
<form id="frm1" name="frm1" action="">
<p><a href="logout.php">Logout</a></p>
<div id="top">
<div id="txt_top">CONTROL PANEL</div>
</div>
<table width="100%" border="0" cellspacing="-1">
  <tr>
    <td>
    	<div id="left">
    	  <!--<table width="200" border="0">
    	    <tr>
    	      <td><a href="index.php?key=sanpham">Sản phẩm</a></td>
  	      </tr>
    	    <tr>
    	      <td>Loại sản phẩm</td>
  	      </tr>
    	    <tr>
    	      <td>&nbsp;</td>
  	      </tr>
    	    <tr>
    	      <td>&nbsp;</td>
  	      </tr>
  	    </table>-->
        
    	  <ul id="MenuBar1" class="MenuBarVertical">
    	    <li><a href="index.php?key=sanpham">Sản Phẩm</a></li>
    	    <li><a href="index.php?key=loaisanpham">Loại Sản Phẩm</a></li>
  	    </ul>
    	</div>
        <div id="right"><?php 
	if(isset($_GET['key']))
				{
					switch($_GET['key'])
					{
						case 'sanpham': include ("sanpham.php"); break;
						case 'suasanpham': include ("sua_sanpham.php"); break;
						case 'themsanpham': include ("themsp.php"); break;
						case 'loaisanpham': include ("loaisp.php"); break;
					}
				}
				else include ("sanpham.php");
	?></div>
    </td>
  </tr>
</table>
</form>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>

