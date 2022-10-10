<?php
session_start();
if (!isset($_SESSION['admin']))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=Admin_login.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
else
{

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>|| ADMIN INDEX ||</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style2 {
	color: #000000;
	font-size: 16px;
}
.style8 {color: #0000FF; font-weight: bold; font-size: 16px; }
-->
</style>
</head>
<body>
<div id="header">
  <table width="200" align="center">
    <tr>
      <td height="224"><img src="images/header1.jpg" alt="" width="770" height="210" /></td>
    </tr>
  </table>
</div>
<div id="menu">
	<ul>
		<li></li>
	    <div align="center"><a href="Admin_index.php">Admin Index 
	    </a></div>
	</ul>
</div>
<div id="content">
  <div id="left">
    <p align="right" style="text-align:center; color:#60B7DE;">	<a href="logout.php">LOGOUT</a></p>
</div>
   <th height="41" colspan="2" scope="col"><h1><center>
   </center>
   </strong></h1></th>
	<p>&nbsp;</p>
</div>
</div>
<div id="footer">
  <p><form action=view.php method=POST>
<?php
	include "includes/config.php";

	$qrysel="select * from voter";
	$rs=mysql_query($qrysel);
	echo "<table border=1>";
	echo "<tr>
		<th></th><th>First Name</th>
		<th>Last Name</th><th>Sex</th><th>Age</th>
		<th>Student ID</th><th>Country</th><th>State</th><th>Faculty</th><th>level</th><th>Username</th>";

	while($v=mysql_fetch_array($rs))
	{
		//$d=substr($v["r_chkindt"],8,2)."-".substr($v["r_chkindt"],5,2)."-".substr($v["r_chkindt"],0,4);
		
		//$dt=substr($v["r_chkoutdt"],8,2)."-".substr($v["r_chkoutdt"],5,2)."-".substr($v["r_chkoutdt"],0,4);

		echo"<tr>";
		echo "<td><input type=checkbox name=chkd".$v['First_name']." value=".$v['First_name']."></td>";
		echo "<td><input type=hidden name=txtq".$v['First_name']." value=".$v['First_name'].">".$v['First_name']."</td>";
		echo "<td><input type=hidden name=txtq".$v['First_name']." value=".$v['Last_name'].">".$v['Last_name']."</td>";
		echo "<td><input type=hidden name=txtq".$v['First_name']." value=".$v['sex'].">".$v['sex']."</td>";
		echo "<td><input type=hidden name=txtt".$v['First_name']." value=".$v['Age'].">".$v['Age']."</td>";
		echo "<td>".$v[6]."</td>";
		echo "<td><input type=hidden name=txtt".$v['First_name']." value=".$v['country'].">".$v['country']."</td>";
		echo "<td><input type=hidden name=txtt".$v['First_name']." value=".$v['state'].">".$v['state']."</td>";
		echo "<td><input type=hidden name=txtt".$v['First_name']." value=".$v['faculty'].">".$v['faculty']."</td>";
		echo "<td><input type=hidden name=txtt".$v['First_name']." value=".$v['level'].">".$v['level']."</td>";
		echo "<td><input type=hidden name=txtt".$v['First_name']." value=".$v['username'].">".$v['username']."</td>";
	}
	echo "</table>";
	mysql_free_result($rs);
	mysql_close();
?>
<input type="submit" name="s1" value="Registered Voters">
</form>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
	<p>Copyright &copy; 2016 Designed by Cynthia Ali</p>
</div>
</body>
</html>
<?php
}
?>
