<style>
#giohang {
	width:150px;
	overflow:hidden;
	text-align:center;
	background:#CFF;
	border-radius:10px;
	padding:5px 0 5px 0;
}
</style>
</head>

<body>

<div id="giohang">
<b align="center">Giỏ hàng</b><hr width="90%" color="#9966CC"/>
<p>Có <font color="red"><?php echo count($_SESSION["somathang"]); ?></font> mặt hàng trong giỏ hàng </p><hr width="90%"color="#9966CC"/>
<a href="index.php?key=xemgiohang">Xem</a>
<a href="index.php?key=dathang">Đặt hàng</a>
</div>