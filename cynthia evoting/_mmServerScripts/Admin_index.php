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
.style8 {color: #0000FF; font-weight: bold; font-size: 16px; }
.style9 {color: #000000}
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
	<p>&nbsp;</p>
</div>
</div>
<div id="footer">
  <table width="463" align="center" bgcolor="#00CC99">
    <tr>
      <td width="455" height="61"><form id="form1" method="post" action="">
        <table width="315" height="103" align="center">
          <tr>
            <td width="305" height="55"><div align="center" class="style8"><a href="registration.php" class="style9">Register Voter</a> </div></td>
            </tr>
          <tr>
            <td height="40"><div align="center" class="style8"><a href="All_result.php" class="style9">View Results</a> </div></td>
            </tr>
		  <tr>
            <td height="40"><div align="center" class="style8"><a href="viewvoters.php" class="style9">View Registered Voters </a></div></td>
            </tr>
		  <tr>
            <td height="40"><div align="center" class="style8"><a href="confirmVoter.php" class="style9">Confirm Voter</a> </div></td>
            </tr>
        </table>
            </form>
      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>Copyright &copy;2016 Designed by Cynthia Ali</p>
</div>
</body>
</html>
<?php
}
?>
