<?php
@mysql_connect("localhost","root","") or die("Not connected Database !");
mysql_select_db("banhangmt") or die("Database not found");
mysql_query("set names 'utf8'");

?>