<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_con_online = "localhost";
$database_con_online = "online";
$username_con_online = "root";
$password_con_online = "";
$con_online = mysql_pconnect($hostname_con_online, $username_con_online, $password_con_online) or trigger_error(mysql_error(),E_USER_ERROR); 
?>