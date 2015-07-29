<?php
// Bat dau session (quan trong)
session_start();

$errorMessage = '';
if (isset($_POST['txtUserId']) && isset($_POST['txtPassword'])) 
{
	// first check if the number submitted is correct
	//buoc dau tien kiem tra so nhap vao co dung khong?
	$number   = $_POST['txtNumber'];
	
	if (md5($number) == $_SESSION['image_random_value']) 
	{
		include ("library/config.php");
		include ("library/opendb.php");
		
		$userId   = $_POST['txtUserId'];
		$password = $_POST['txtPassword'];
	
		//kiem tra neu user_id va user_password ton tai trong CSDL
		$sql = "SELECT uid 
				FROM admin
				WHERE uid = '$userId' AND pwd = '$password'";
		
		$result = mysql_query($sql) or die('Query failed. ' . mysql_error()); 
		
		if (mysql_num_rows($result) == 1) 
		{
			// username va password hop le 
			// Tao bien session "image_is_logged_in" va gan gia tri bang true
			$_SESSION['image_is_logged_in'] = true;

			//xoa gia tri ngau nhien tu session
			$_SESSION['image_random_value'] = '';
			
			//sau khi dang nhap thanh cong thi chuyen sang trang main.php
			header('Location: index.php');
			exit;
		} 
		else 
		{
			$errorMessage = 'Sai Tên dang nhập / mật khẩu, xin thử lại';
		}
		
		include ("library/closedb.php");
	} else {
		$errorMessage = 'Sai mã bảo mật, xin thử lại';
	}	
}
?>
<html>
<head>
<link rel="icon" href="icons/login_admin.png" type="image/x-icon" />
<link rel="shortcut icon" href="icons/login_admin.png" type="image/x-icon" />
<link href="style_admin/style_control.css" rel="stylesheet" type="text/css">
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<?php
if ($errorMessage != '') {
?>
<p align="center"><strong><font color="#990000"><?php echo $errorMessage; ?></font></strong></p>
<?php
}
?>
<form action="" method="post" name="frmLogin" id="frmLogin">
 <center>
 <p><span style="font-family:tahoma; font-size:18px; color:#F00">-- ĐĂNG NHẬP ADMIN --</span></p>
 <table id="them" width="500" border="1"  bordercolor="#0069A8" style="border-collapse: collapse" cellpadding="0">
  <tr>
   <td width="150">Tên Ðăng Nhập:</td>
   <td><input name="txtUserId" type="text" id="txtUserId"></td>
  </tr>
  <tr>
   <td width="150">Password:</td>
   <td><input name="txtPassword" type="password" id="txtPassword"></td>
  </tr>
  <tr>
   <td width="150">Mã Bảo Mật:</td>
   <td><input name="txtNumber" type="text" id="txtNumber" value="">
    &nbsp;&nbsp;<img src="randomImage3.php"></td>
  </tr>

  <tr>
   <td width="150">&nbsp;</td>
   <td><input name="btnLogin" type="submit" id="btnLogin" value="Login"></td>
  </tr>
 </table></center>
</form>
</body>
</html>
