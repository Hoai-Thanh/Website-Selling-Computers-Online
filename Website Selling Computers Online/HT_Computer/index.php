<?php include ("dbcon.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang chủ - Cty TNHH CNTT HT-Computer</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="main">
    <div id="content">
      <div id="header">
        
          <div id="banner"><a href="index.php"><img src="images/index/logo.jpg" width="1006" height="100" /></a></div>
            <div id="flash"> 
              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="1000" height="200" align="top">
                        <param name="movie" value="images/index/flash.swf" />
                        <param name="quality" value="high" />
                        <embed src="images/index/flash.swf" width="1000" height="200" align="top" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
              </object>
            </div>
            <div id="menu_top"><table id="menu" width="990" border="0" height="20">
  <tr>
    <td width="130"><a href="index.php">Trang chủ</a></td>
    <td width="122"><a href="index.php?key=gioithieu">Giới thiệu</a></td>
    <td width="124"><a href="index.php?key=sanpham">Sản phẩm</a></td>
    <td width="296"><a href="index.php?key=lienhe">Liên hệ</a></td>
    <td width="14"><img src="images/index/icon_search.gif" width="11" height="11" /></td>
    <td width="144"><input name="txtseach" type="text" id="txtseach" style="height:20"/></td>
    <td width="130">
      <a href="index.php?key=timkiem&TuKhoa=$tukhoa"><input type="submit" name="tim" id="tim" value="Tìm nhanh" /></a>
      
    </td>
    </tr>
</table>
        </div>
      </div>
   	  <div id="bottom">
        <div id="menu_left">
			<div id="nav">
            <div id="txt_nav"><strong>Danh Mục</strong></div>
            </div>

		  <?php include("sdMenu/sdmenu.php"); ?>
        </div>
        <div id="center">
        <?php 
	if(isset($_GET['key']))
				{
					switch($_GET['key'])
					{
						case "tim": include("timkiem.php"); break;
						case 'sanpham': include ("module/product.php"); break;
						case 'gioithieu': include ("module/gioithieu.php"); break;
						case 'lienhe': include ("module/lienhe.php"); break;
						case 'lienhe_success': include ("module/lienhe_success.php"); break;
						case 'loaisp': include ("module/loai_product.php"); break;
						case 'chitiet': include ("module/chitietsp.php"); break;
						//case 'addcart': include ("module/cart.php"); break;
					}
				}
				else include ("module/product.php");
	?>
          
        </div>
        <div id="menu_right">
        	<div id="nav_right">
            	<div id="txt_nav_right"><strong>Giỏ hàng</strong></div>
                <div id="cat"></div>
          </div>
        </div>
        
      </div>
        <div id="footer">Copyright &copy; 2013 <br />
        Design by: <font color="#FF0000">MGF7-11 Team</font><br />
        All Right Reserved </div>
    </div>
</div>
</body>
</html>
