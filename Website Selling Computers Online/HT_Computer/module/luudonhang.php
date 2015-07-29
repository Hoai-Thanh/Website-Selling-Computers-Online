<?php 
session_start();
include "../dbcon.php";


	$idDH = $_SESSION['UserName'].date("U");
	$user = $_SESSION['UserName'];

	$nguoinhan = $_POST['tennguoinhan'];
	$diadiem = $_POST['diadiem'];
	$ghichu= $_POST['ghichu'];
	$donhang = "INSERT INTO donhang(idDH,UserName,ThoiDiemDatHang,ThoiDiemGiaoHang,TenNguoiNhan,DiaDiemGiaoHang,GhiChu) VALUES ('$idDH','$user',CURDATE(),ADDDATE( CURDATE( ) , 3 ), '$nguoinhan', '$diadiem','$ghichu')";
	
	if(mysql_query($donhang,$link))
		{
			$max = count($_SESSION['somathang']);
			for($i=0 ; $i < $max; $i++)
			{
				/*
				$MaSP = $_SESSION['somathang'][$i]['MaSP'];
				$SoLuong = $_SESSION['somathang'][$i]['SoLuong'];
				$Gia = $_SESSION['somathang'][$i]['Gia']*$SoLuong;
				mysql_query("insert into donhangchitiet(idDH,MaSP,SoLuong,DonGia) values('$idDH','$MaSP','$SoLuong','$Gia')");*/
		$MaSP=$_SESSION["somathang"][$i]["MaSP"];
		$SoLuong=$_SESSION["somathang"][$i]["SoLuong"];
		$Gia=$_SESSION["somathang"][$i]["Gia"];
		$donhangchitiet = "INSERT INTO donhangchitiet(idDH,MaSP,SoLuong,DonGia) VALUES     ('$idDH','$MaSP','$SoLuong','$Gia')";
		
		mysql_query($donhangchitiet,$link);
			}
		echo "<script language='javascript'>
		alert('Đặt hàng thành công');
		location.href='index.php';
		</script>"; 
		}
	else
	{
	echo "<script language='javascript'>
		alert('Đặt hàng thất bại, xin thử lại');
		location.href='index.php';
		</script>"; 
	}

?>