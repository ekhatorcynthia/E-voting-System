<?php require_once('../Connections/evoting.php'); ?>
<?php
mysql_select_db($database_evoting, $evoting);
$query_Recordset1 = "SELECT * FROM voter";
$Recordset1 = mysql_query($query_Recordset1, $evoting) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php
include('includes/functions2.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>|| VOTING REGISTRATION SYSTEM||</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style11 {font-size: 18px; font-weight: bold; }
.style13 {font-size: x-large; font-weight: bold; color: #000000; }
.style2 {	color: #FF00FF;
	font-weight: bold;
}
.style3 {
	font-size: 18px;
	color: #000000;
}
.style4 {font-size: 18px; color: #FFFFFF; }
.style5 {font-size: 12px}
-->
</style>
</head>
<body>
</div> 
<p>CONGRATULATIONS!!! YOU ARE NOW AN ELIGIBLE VOTER. MAKE YOUR VOTE COUNT BY CASTING YOUR VOTE IN THE COME FEBRUARY 2015 ELECTION 22-29. YOUR USERNAME AND ELECTION ID IS:</p>
<p>&nbsp;</p>

<table width="512" height="93" border="1" align="center" cellpadding="7" cellspacing="0" bgcolor="#999999">
  <tr>
    <th width="263" height="56" scope="col" >Username</th>
    <th width="215" scope="col" >Student ID </th>
    <th width="215" scope="col" >Voters ID </th>
  </tr>
  <?php 
 $row = get_username();
 foreach($row as $col_val){
  $col_val++;
 if(($col_val%3)==0)$format="background-color:#cccccc";
 else $format="background-color:#00FF66";
 
?>
  <tr>
    <td ><?php echo $col_val['username'] ?></td>
    <td ><?php echo $col_val['Student_id'] ; ?></td>
    <td ><?php echo $col_val['Voters_id'] ; ?></td>
  </tr>
  <?php  } 
	  ?>
</table>
<p>&nbsp;</p>
<p><a href="Admin_index.php">&gt;&gt;&gt;&gt;BACK</a></p>
<p></p>


</body>
</html>
<?php
mysql_free_result($Recordset1);
?>