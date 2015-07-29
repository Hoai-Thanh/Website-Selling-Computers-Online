<?php  ob_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#main_1 {
	height: 700px;
	width: 576px;
}
#main_1 #nav_gt {
	background-image: url(images/index/nav_long.jpg);
	background-repeat: no-repeat;
	width:576px;
	height:27px;
}
#main_1 #nav_gt #txt {
	width:570px;
	height:27px;
	padding:5px;
	margin-left:5px;
	font-family:tahoma;
}
#main_1 #nd_gt {
	padding:5px;
	margin-left:5px;
}
</style>
</head>

<body>
<div id="main_1">
	<div id="nav_gt">
	  <div id="txt">Liên hệ</div></div>
    <div id="nd_gt">
   	  <h2>C&ocirc;ng ty TNHH CNTT HT-Computer</h2>
Văn ph&ograve;ng: 65, Huỳnh Thúc Kháng, P.Bến Nghé, Q.1<br />
ĐT: Mr Hiển - 091.7704.363<br />
Email: <a href="mailto:thaihien121293@gmail.com">thaihien121293@gmail.com</a><br />
Website: <a href="https://plus.google.com/u/0/101740367695515335148" title="Thiết kế website, thiết kế trang web">http://htcomputer.tk</a><br />
<br />
Mọi &yacute; kiến, xin gửi về địa chỉ email: <a href="mailto:thaihien121293@gmail.com">thaihien121293@gmail.com</a>
  </div>
  <?php include("dbcon.php"); ?>
  <form id="frmContact" name="frmContact" method="post" action="">
  
  <div id="thongtinlienhe">
  	<center><table width="459" border="0">
  <tr>
    <td width="202">Họ tên: <strong style="color:#F00">*</strong></td>
    <td width="247">
      <input name="hoten" type="text" id="hoten" size="35" />
    </td>
  </tr>
  <tr>
    <td>Công ty:</td>
    <td><input name="cty" type="text" id="cty" size="35" /></td>
  </tr>
  <tr>
    <td>Địa chỉ:</td>
    <td><input name="diachi" type="text" id="diachi" size="35" /></td>
  </tr>
  <tr>
    <td> Email:<strong style="color:#F00">*</strong></td>
    <td><input name="email" type="text" id="email" size="35" /></td>
  </tr>
  <tr>
    <td>SĐT:</td>
    <td><input name="sdt" type="text" id="sdt" size="35" /></td>
  </tr>
  <tr>
    <td valign="top">Nội dung liên hệ: <strong style="color:#F00">*</strong></td>
    <td><textarea name="noidung" cols="35" rows="10" id="noidung"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="guitt" id="guitt" value="Gửi"/>
      <input type="reset" name="reset" id="reset" value="Nhập lại" /></td>
  </tr>
  </table>
</center>
  </div>
  </form>
  <?php
if(isset($_POST['guitt']))
{
	
	$sl="insert into lienhe value(NULL,'{$_POST['hoten']}','{$_POST['cty']}','{$_POST['diachi']}','{$_POST['email']}','{$_POST['sdt']}','{$_POST['noidung']}')";
	if(mysql_query($sl))
	header("location:index.php?key=lienhe_success");
	else echo $sl;
}
?>
</div>
</body>
</html>