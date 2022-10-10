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
echo $attempt=$_SESSION['username'];

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="e_voting"; // Database name

mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$verify=mysql_query("SELECT election_type, username, attempt FROM votes where username='$attempt'");
$verify= mysql_fetch_row($verify);

$names='';
$names2='';
if(isset($_POST['Submit'])) {

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$names = '0';
mysql_query("select * from votes");
$result = mysql_query("SELECT pres_count FROM presidential_votes where party ='ASFC'");
 while($row = mysql_fetch_row($result)){
   $names =  $row [0];
   $names =  $names + 1;
   
   mysql_query("UPDATE presidential_votes SET pres_count=$names WHERE party ='ASFC' ");
   mysql_query("INSERT INTO votes (election_type,username) VALUES ('presidential','$attempt')" );
$insertGoTo = "process2.php";
 
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

  }
//pdp
if(isset($_POST['Submit2'])) {
// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$names2 =  '0';
//$regnum = $_POST['txtnumber'];
$result = mysql_query("SELECT pres_count FROM presidential_votes where party ='SSFC'");
 while($row = mysql_fetch_row($result)){
   // $names = $row[1];
 $names2 =  $row [0];
   $names2 =  $names2 + 1;
   
   mysql_query("UPDATE presidential_votes SET pres_count=$names2 WHERE party ='SSFC' ");
  mysql_query("INSERT INTO votes (election_type,username) VALUES ('presidential','$attempt')");

$insertGoTo = "process2.php";
 
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

  } 
 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>|| <?php echo $_SESSION['username'];?> ||Presidential</title>
<script type="text/javascript">
function confirm_vote(textfield){
if(confirm("ARE U SURE YOU WISH TO VOTE FOR "+textfield+" ?"))
{
return  true;
}
else {return false;
}
	 
}

function error($msg){
if(confirm("double voting "+$msg+" ?"))
{
return  true;
}
else {return false;
}
	 
}
</script>
<script type="text/javascript">
function view_profile(textfield){
if(confirm("My name is Yusuf Hayatuddeen. I am 25 years old, faculty of Electrical and electronics 200 level."))
{
return  true;
	 }
}
</script>
</script>
<script type="text/javascript">
function view_profile2(textfield){
if(confirm("My name is Ahmad Ahmad Sani, faculty of political science 400 level. "))
{
return  true;
	 }
}
</script>

<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style8 {color: #990000}
.style9 {
	color: #000000;
	font-weight: bold;
}
.style10 {color: #000000}
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
  <div align="center" class="style9"><a href="choose_election.php">choose election </a></div>
</div>
<div id="content">
	<div id="left">
    <p style="text-align:center; color:#FF0000;"><strong><marquee  behavior="scroll">
    THIS VOTING SYSTEM IS FOR ELEGIBLE STUDENT OF AHMADU BELLO UNIVERSITY
    </marquee></strong></p>
</div>
  <th height="41" colspan="2" scope="col"><h1><center>
   </center>
   
   </h1>
  </th>
</div>
<div id="footer">
  <p><?php if(isset($_SESSION['message'])){ echo 'Voting Successfull'; unset($_SESSION['message']); }  ?>&nbsp;</p>
  <p><a href="logout.php">LOGOUT</a></p>
  <table width="719" border="0" align="center">
    <tr>
      <th width="713" height="661" scope="col"><form id="form1" method="post" action="">
          <table width="671" border="0" align="center">
            <tr>
              <th width="233" bgcolor="#00FF66" scope="col"><span class="style8">CANDIDATE</span></th>
              <th width="199" scope="col"><span class="style8">NAME</span></th>
              <th width="147" bgcolor="#00FF66" scope="col"><span class="style8">PARTY</span></th>
              <th width="74" bgcolor="#993300" scope="col">UPDATED RESULT </th>
            </tr>
            <tr>
              <td height="151"><img src="images/inecchair.jpg" alt="" width="177" height="221" /></td>
              <td><span class="style10">Ahmad Ahmad Sani </span><br/>
              <input type="submit" name="Submit4" value="view profile" onclick="return view_profile2('<?php echo "";  ?>')"/></td>
              <td>
			  <?php if($verify<1){ ?>
			  <input name="Submit" type="submit"  onclick="return confirm_vote('<?php echo "Ahmad Ahmad Sani AS President ";  ?>')" value="ASFC" />
			  <?php } else echo "you have already voted"; ?></td>
              <td><?php echo $names;  ?>&nbsp;</td>
            </tr>
            <tr>
              <td height="150"><img src="images/president1.jpg" alt="" width="177" height="250" /></td>
              <td><span class="style10">Yusuf Hayatuddeen</span> <br/>
              <input type="submit" name="Submit3" value="view profile" onclick="return view_profile('<?php echo "";  ?>')" /></td>
              <td>
			  <?php if($verify<1){ ?>
			  <input type="submit" name="Submit2" value="SSFC" onclick="return confirm_vote('<?php echo "Yusuf Hayatuddeem AS President ";  ?>')"/>
			   <?php } else echo "you have already voted"; ?>			  </td>
              <td><?php echo $names2;  ?></td>
            </tr>
            <tr>
              <td height="105">&nbsp;</td>
              <td>&nbsp;</td>
              <td> <a href="pres_result.php">VIEW RESULTS </a></td>
              <td>&nbsp;</td>
            </tr>
          </table>
      </form></th>
    </tr>
    <tr>
      <th height="17" scope="col">&nbsp;</th>
    </tr>
  </table>
  <p>&nbsp;</p>
	<p>&nbsp;</p>
	<p align="center"> Copyright &copy; 2016 Designed by Cynthia Ali. </p>
</div>
</body>
</html>
<?php
}
?>