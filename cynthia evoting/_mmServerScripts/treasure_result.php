<?php require_once('Connections/evoting.php'); ?>
<?php

mysql_select_db($database_evoting, $evoting);
$query_Recordset1 = "SELECT * FROM sodirector_votes";
$Recordset1 = mysql_query($query_Recordset1, $evoting) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

// Check if session is not registered , redirect back to main page.
// Put this code in first line of web page.
?>
<?php
include('includes/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>||<?php echo $_SESSION['username'];  ?> ||TREASURER RESULTS</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {
	color: #000000;
	font-weight: bold;
	font-size: 16px;
}
.style2 {color: #FF0000}
-->
</style>
</head>
<body>
<div id="header">
  <table width="200" align="center">
    <tr>
      <td height="212"><img src="images/header1.jpg" alt="" width="770" height="210" /></td>
    </tr>
  </table>
</div>
<div id="menu">
<ul>
		<li></li>
	    <div align="center"><a href="treasure.php">Voting Page 
	    </a></div>
	</ul>
</div>
<div id="content">
	<div id="left">
    <p style="text-align:center; color:#FF0000;"><strong><marquee  behavior="scroll">
    THIS E-VOTING SYSTEMIS FOR ELEGIBLE STUDENT OF AHMADU BELLO UNIVERSITY 
    </marquee>
</strong></p>
</div>
  <th height="41" colspan="2" scope="col"><h1><center>
   </center>
   
   </h1></th>
</div>
</div>
<div id="footer">
  <p class="style1"><a href="logout.php">LOGOUT</a></p>
  <p class="style1">UPDATED  TREASURER RESULT </p>
  <table width="743" height="93" border="1" align="center" cellpadding="7" cellspacing="0" bgcolor="#999999">
      <tr>
        <th width="263" height="56" scope="col" >CANDIDATE NAME </th>
        <th width="215" scope="col" >PARTY</th>
        <th width="215" scope="col" >VOTES</th>
      </tr>
      <?php 
 $row =get_treasurer_vote();
 foreach($row as $col_val){
  $col_val++;
 if(($col_val%2)==1)$format="background-color:#cccccc";
 else $format="background-color:#00FF66";
 
?>
      <tr>
        <td  style="<?php echo $col_val['cand_name']; ?>"><?php echo $col_val['cand_name'] ?></td>
        <td  style="<?php echo $col_val['party']; ?>"><?php echo $col_val['party'] ; ?></td>
        <td  style="<?php echo $col_val['treasure_count']; ?>"><?php echo $col_val['treasure_count'] ; ?> </td>
      </tr>
      <?php  } 
	  ?>
  </table>
	<p>&gt;&gt;<a href="choose_election.php">&gt;BACK TO CHOOSE ELECTION</a></p>
	<p>Copyright &copy;2016 Designed by Cynthia Ali</p>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>