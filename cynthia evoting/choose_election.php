<?php require_once('Connections/evoting.php'); ?>
<?php
session_start();
if (!isset($_SESSION['studid']))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=login.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
else
{
?>
<?php
$studid=$_SESSION['studid'];
mysql_select_db($database_evoting, $evoting);
$query_Recordset1 = "SELECT * FROM voter WHERE voter.Student_id='$studid'";
$Recordset1 = mysql_query($query_Recordset1, $evoting) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

if(isset($_POST['Submit'])) {
header("location:president.php");
}
if(isset($_POST['Submit1'])) {
header("location:Vice_pres.php");
}
if(isset($_POST['Submit3'])) {
header("location:Social_director.php");
}
if(isset($_POST['Submit4'])) {
header("location:Treasure.php");
}
?>
</tr>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>||||CHOOSE ELECTION</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style2 {
	color: #000000;
	font-size: 16px;
}
.style9 {color: #000000; font-weight: bold; font-size: 16px; }
.style10 {color: #FF0000}
.style19 {
	color: #000099
}
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
		<li> <a href="index.php"></a></li>
	</ul>
</div>
<div id="content">
  <div id="left">
    <p align="right" style="text-align:center; color:#60B7DE;">	<a href="logout.php">LOGOUT</a></p>
</div>
   <th height="41" colspan="2" scope="col"><h1><center>
        <p class="style2 style10">&nbsp;</p>
        <p class="style2 style10">To Start Voting you must choose the Type of Election to start with</p>
        <p class="style2 style19"><span class="style11"><marquee>
          Welcome <?php echo $row_Recordset1['First_name']; ?>  <?php echo $row_Recordset1['Last_name']; ?> ! !
        </marquee>
        </p>
   </center>
   </h1></th>
</div>
</div>
<div id="footer">
  <table width="463" align="center">
    <tr>
      <td width="455" height="61"><form id="form1" method="post" action="">
        <table width="459" height="103" align="center" bgcolor="#FF00FF">
          <tr>
            <td width="305" height="55"><div align="center" class="style9">PRESIDEN </div></td>
            <td width="142"><label>
              <div align="center">
                <input type="submit" name="Submit" value="PRESIDEN" />
              </div>
            </label></td>
          </tr>
          <tr>
            <td height="40"><div align="center" class="style9">Vice President </div></td>
            <td><div align="center">
              <input name="Submit1" type="submit" id="Submit1" value="Vice President" />
            </div></td>
          </tr>
		  <tr>
            <td height="40"><div align="center" class="style9">Social Director </div></td>
            <td><div align="center">
              <input name="Submit3" type="submit" id="Submit3" value="Social Director" />
            </div></td>
          </tr><tr>
            <td height="40"><div align="center" class="style9">Treasurer</div></td>
            <td><div align="center">
              <input name="Submit4" type="submit" id="Submit4" value="Treasurer" />
            </div></td>
          </tr>
          <tr>
            <td height="40"><div align="center" class="style9">SECRETARY</div></td>
            <td><div align="center">
              <input name="Submit5" type="submit" id="Submit5" value="Secretary" />
            </div></td>
          </tr>
          <tr>
            <td height="40" bgcolor="#FF00FF"><div align="center" class="style9">
              <blockquote>
                <p> ASST SECRETARY</p>
              </blockquote>
            </div></td>
            <td><div align="center">
              <input name="Submit6" type="submit" id="Submit6" value="ASST SEC" />
            </div></td>
          </tr>
        </table>
            </form>
      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
	<p><span class="style2 style10">
	  <?php
$currentTime=date("g:i:s a");
echo "The time is $currentTime";
?>
	</span></p>
	<p>Copyright &copy;2016 Designed by Cynthia Ali</p>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);

}
?>
