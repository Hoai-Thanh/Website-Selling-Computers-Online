<?php
@mysql_connect("localhost","root","root") or die("Khong ket noi duoc voi csdl");
mysql_select_db("webtintuc") or die("database khong ton tai");
mysql_query("set names 'utf8'");

?>