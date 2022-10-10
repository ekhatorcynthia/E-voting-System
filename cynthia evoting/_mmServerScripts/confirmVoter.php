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
<?php require_once('Connections/evoting.php'); ?>
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
      <td height="212"><img src="images/header1.jpg" alt="" width="770" height="210" /></td>
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
   </strong>
   <h2><a href="result.php">Confirm voter.</a></h2>
   </header>
      <table width="365" height="122" align="center">
<form action="viewcomfirm.php" method="post" name="form1" class="style8">
    <label for="textfield2">Student ID </label>
    <input type="text" name="rollno" id="textfield2">
  </p>
      <div align="center"></div>
  
  <p>
    <input type="submit" name="button2" id="button2" value="Submit">
  </p>
</form>
  </table>
</article>
<article class="post">
  <header class="postheader">
    <h2>&nbsp;</h2>
  </header>
  <form name="form2" method="post" action="">
    <p>
      <label for="textfield3"></label>
    </p>
    <p>&nbsp;</p>
</form>
<?php
if(isset($_POST['submitresult']))
{
	 $searchstu = mysql_query("SELECT * FROM voter where (Student_id LIKE '$_POST[textfield2]' OR `username` LIKE '$_POST[textfield2]') AND Voters_id ='$_POST[select]' ");
	
?>
<form name="form2" method="post" action="viewcomfirm.php">
  <?php
}
?>
</form>
  <p>&nbsp;</p>
</form>
</article>

</section>
<section id="sidebar">
</section>
<section id="sidebar"></section>
<div class="clear"></div>

<div class="clear"></div>
</section>
</div>
<?php
}
?>