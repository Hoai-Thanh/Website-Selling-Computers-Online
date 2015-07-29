
<script language="javascript">
		function del(idSP)
		{
			if(confirm('Ban co chac muon xoa san pham nay ?'))
			{
				document.CapNhatGioHang.idSP.value = idSP;
				document.CapNhatGioHang.command.value = 'delete';
				document.CapNhatGioHang.submit();
				
			}
			
		}
		function clear_cart()
		{
			if(confirm('Ban co chac muon xoa het gio hang'))
			{
				document.CapNhatGioHang.command.value = 'clear';	
				document.CapNhatGioHang.submit();
			}
		}
		function update_cart()
		{
				document.CapNhatGioHang.command.value = 'update';	
				document.CapNhatGioHang.submit();
		}
    </script>
</head>

<style type="text/css">
#CapNhatGioHang #frm {
	width: 585px;
}
</style>
<body>
<?php
	//include("dbcon.php");
	include("cart.php");
	$msg = "";
	$_SESSION['muahangxong']  = "";
	if(@$_REQUEST['command'] == 'delete')
		{
			remove_product($_REQUEST['idSP']);
		}
	if(@$_REQUEST['command']=='clear')
	{
		unset($_SESSION['somathang']);	
	}
	if(@$_REQUEST['command']=='update')
	{
		$max = count($_SESSION['somathang']);
		for($i=0;$i<$max;$i++)
		{
			$idSP = $_SESSION['somathang'][$i]['idSP'];
			$SoLuong = intval($_REQUEST['SoLuong_'.$idSP]);
			if($SoLuong>0&&SoLuong<=999)
			{
				$_SESSION['somathang'][$i]['SoLuong']=$SoLuong;
				
			}
			else
			{
				$msg = 'So luong phai tu 1 den 999';
				
			}
		}
	}
	
?>

<form action="" method="post" name="CapNhatGioHang" id="CapNhatGioHang">
    	<input type="hidden" name="idSP"/>
        <input type="hidden" name="command"/>
<div id="frm">
<table width="500" border="1"  bordercolor="#0069A8" style="border-collapse: collapse" cellpadding="0">
  <tr>
    <td colspan="6" align="center">Giỏ Hàng</td>
  </tr>
  <tr>
    <td>STT</td>
    <td>MaSP</td>
    <td>Giá</td>
    <td>Số Lượng</td>
    <td>Thành tiền</td>
    <td> Xóa</td>
  </tr>
 	<?php
				if(@is_array($_SESSION['somathang']))
				{
					$max =  count($_SESSION['somathang']);
					for($i = 0; $i < $max; $i++)
					{
						$idSP = $_SESSION['somathang'][$i]['idSP'];
						$SoLuong = $_SESSION['somathang'][$i]['SoLuong'];
						//$Mota = get_product_name($MaSP);
						if($SoLuong == 0)
						continue;
			?> 
  <tr>
    <td><?php echo $i+1; ?></td>
    <td><?php echo $_SESSION['somathang'][$i]['idSP']; ?></td>
    <td><?php echo $_SESSION['somathang'][$i]['DonGia']; ?></td>
    <td><input name="SoLuong_<?php echo $idSP; ?>" type="text" value="<?php echo $SoLuong; ?>" /></td>
    <td><?php echo $_SESSION['somathang'][$i]['Gia']*$SoLuong; ?></td>
    <td><a href="javascript:del('<?php echo $idSP; ?>')">Xoa</a></td>
  </tr>
  				<?php } ?>
</table>
 <table border="0" width="500">
                <tr class="left">
                	<td><a href="index.php" class=simplebtn""> Tiếp tục mua hàng</a> </td>
                    <td><a  onclick="update_cart()" href="#" class=simplebtn""> cập nhật</a> </td>
                    <td><a  onclick="clear_cart()" href="#" class=simplebtn""> Xóa hết</a> </td>
                </tr>
                <h3 class="right"><?php echo get_order_total(); ?></h3>
                
                </table>
                <?php
				
                }
				else
				{
				?>
                <table width="500" border="0">
                	<tr class="cartlist">
                    	<td style="text-align:center";><strong>Chưa có sản phẩm nào</strong>
                
					</td>
                    </tr>
                    </table>
                    <?php
				}
        	?>
  </div>     
</form>

