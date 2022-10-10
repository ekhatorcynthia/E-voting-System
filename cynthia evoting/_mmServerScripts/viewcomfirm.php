<?php require_once('Connections/evoting.php'); ?>
<?php
mysql_select_db($database_evoting, $evoting);
$query_Recordset1 = "SELECT * FROM voter";
$Recordset1 = mysql_query($query_Recordset1, $evoting) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
 
if(isset($_GET["resid"]))
{
$rid =	$_GET[resid];
}
else
{
	$rid =	$_POST["rollno"];
}
$result= mysql_query("SELECT * FROM voter where Student_id='$rid' ");
 while($row1 = mysql_fetch_array($result))
  {
	  $Student_id = $row1["Student_id"];
	  $name = $row1['First_name'] . " " . $row1['Last_name'] ;
	  $Age = $row1["Age"];
	  $Address = $row1["Address"];
	  $Country = $row1["country"];
	  $state = $row1["state"];
	  $email = $row1["e_mail"];
	  $faculty = $row1["faculty"];
	  $photo = $row1["photo"];
	  $level = $row1["level"];
	  $username = $row1["username"];
	  $Voters_id = $row1["Student_id"];
	  
  }
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
.style8 {color: #0000FF; font-weight: bold; font-size: 16px; }
#Layer1 {
	position:absolute;
	width:529px;
	height:665px;
	z-index:1;
	left: 143px;
	top: 298px;
	background-color: #33CCCC;
}
.style10 {font-size: 14px}
.style11 {color: #0000FF; font-weight: bold; font-size: 16px; font-family: Verdana, Geneva, sans-serif; }
.style12 {font-family: Verdana, Geneva, sans-serif}
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
	</ul>
</div>
<div id="content">
  <div id="left">
    <p align="right" style="text-align:center; color:#60B7DE;">	<a href="logout.php">LOGOUT</a></p>
</div>
   <th height="41" colspan="2" scope="col"><h1><center>
   </center>
   </strong></h1></th>
	  <form name="form1" method="post" action="">
  <p>
  <p align="center"><td align="center"><p align="center" class="style8"><img name="" src="<?php echo $photo; ?>" width="135" height="166" alt="" /></p>
    <p align="center" class="style8">&nbsp;</p>
    <div align="center"><span class="style8">
    </span></div>
    <span class="style8"><label for="textfield2">
    <div align="center">Name: </div>
    </label> 
      <div align="center"><?php echo $name; ?></div>
    </span>
    <div align="center">
      </p>
      </div>
    <p align="center" class="style12">
    <span class="style8">
    <label for="textfield3">Age:</label>
    <?php echo $Age; ?></span></p>
  <p align="center" class="style12">
    <span class="style8">
<label for="select">Address</label>
:  <?php echo $Address; ?> </span></p>
  <p align="center" class="style12">
    <span class="style8">
  <label for="select2">Country</label>
  : <?php echo $Country; ?></span></p>
  <p align="center" class="style12">
    <span class="style8">
    <label for="textfield4">State</label>
    :  <?php echo $state; ?></span></p>
  <p align="center" class="style12">
    <span class="style8">
<label for="textfield4">Email</label>
: <?php echo $email; ?> </span></p>
  <p align="center" class="style12">
    <span class="style8">
<label for="textfield4">Faculty</label>
</span><span class="style10">: <?php echo $faculty; ?> </span></p>
  <p align="center" class="style12">
    <span class="style8">
<label for="textfield4">Level</label>
: <?php echo $level; ?> </span></p>
  <p align="center" class="style12">
    <span class="style8">
<label for="textfield4">username</label>
: <?php echo $username; ?> </span></p>
  <p align="center">
    <span class="style11">
<label for="textfield4">Student ID </label>
: <?php echo $Voters_id; ?> </span></p>
  <p><a href="Admin_index.php"><strong>&lt;&lt;Back</strong></a></p>
  </form>
      </form>

  </p>
 <input name="Print" type="button" onclick="window.print()" value="Print" />
 
	<p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
</div>
<div id="footer">
  <p>&nbsp;</p>
	<p>Copyright &copy; 2016 Designed by Cynthia ALI. </p>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
