<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_evoting = "localhost";
$database_evoting = "e_voting";
$username_evoting = "root";
$password_evoting = "";
$evoting = mysql_pconnect($hostname_evoting, $username_evoting, $password_evoting) or trigger_error(mysql_error(),E_USER_ERROR); 
?>