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
$attempt=$_SESSION['username'];

mysql_select_db($database_evoting, $evoting);
$query_Recordset1 = "SELECT * FROM sodirector_votes";
$Recordset1 = mysql_query($query_Recordset1, $evoting) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="e_voting"; // Database name

mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$verify=mysql_query("SELECT election_type, username, attempt FROM social_attempt where username='$attempt'");
$verify= mysql_fetch_row($verify);

$names='';
$names2='';
if(isset($_POST['Submit'])) {

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


 //$e_id ="inec/ 396" ;
//	$attempt  = "1";
//$pres_result = mysql_query("SELECT pres_attempts FROM attempts where election_id ='$e_id'");
 //while($pres_row = mysql_fetch_row($pres_result)){
 //$pres_attempt =  $pres_row ['pres_attempts'];
  // if ($pres_attempt >= 1){
//header("location:error.php");
 
$names = '0';
mysql_query("select * from social_attempt");
$result = mysql_query("SELECT social_count FROM sodirector_votes where party ='ASFC'");

 while($row = mysql_fetch_row($result)){
   $names =  $row [0];
   $names =  $names + 1;
  
   mysql_query("UPDATE sodirector_votes SET social_count=$names WHERE party ='ASFC' ");
mysql_query("INSERT INTO social_attempt (election_type,username) VALUES ('social_director','$attempt')" );
 $insertGoTo = "process4.php";
 
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
$result = mysql_query("SELECT social_count FROM sodirector_votes where party ='SSFC'");
 while($row = mysql_fetch_row($result)){
   // $names = $row[1];
 $names2 =  $row [0];
   $names2 =  $names2 + 1;
   
   mysql_query("UPDATE sodirector_votes SET social_count=$names2 WHERE party ='SSFC' ");
   mysql_query("INSERT INTO social_attempt (election_type,username) VALUES ('social_director','$attempt')" );
 $insertGoTo = "process4.php";
 
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
<title>||SOCIAL DIRECTOR</title>
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
if(confirm("My name is Yusuf Hayatuddeen. I am 23 years old, student of Mechanical engineering 300 level. Voting for me is a vote for transparency, accountability, hardwork,and instant transformation. if you vote me i promise to make an impact to all student of this respected university through social activities, processing of state government scholarships, free photocopy shop to ease handouts purchase, supports activities and lots more. Vote me today as your servant of change. My promises are not like other promises, because i will always keep my word. I left it to you to decide between a man who always keeps his promises and the one who dont, between the one who gives you hope and the one who failed you. Thank YOU."))
{
return  true;
	 }
}
</script>
</script>
<script type="text/javascript">
function view_profile2(textfield){
if(confirm("My name is Ahmad Ahmad Sani, Student of department of Law 400 level. Vote for continuity. As the incumbent President, i will like to highlight my achievement as follows; during my last year as the president i was able to pay the outstanding state scholarship to all student from the school treasury and the help of the state government. i was able to increase the scholarship amount from N4000 to N10000. under my watch my administration bought a luxirious university bus and students hospital ambulance. I am committed to student well being and social transformation, the new swimming pool area was build from our treasury account. I seek from you to vote me for continuity to continue the good work we started. Thank YOU."))
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
.style10 {
	color: #FF0000;
	font-size: 24px;
}
.style11 {color: #000000}
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
  <div align="center" class="style9"><a href="choose_election.php">Choose Election </a></div>
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
  <p><a href="logout.php">LOGOUT</a></p>
  <p class="style10"><?php if(isset($_SESSION['message'])){ echo 'Voting Successfull'; unset($_SESSION['message']); }  ?>&nbsp;</p>
  <table width="719" border="0" align="center">
    <tr>
      <th width="713" height="661" scope="col"><form id="form1" method="post" action="">
          <table width="671" border="0" align="center">
            <tr>
              <th width="233" bgcolor="#00FF66" scope="col"><span class="style8">CANDIDATE</span></th>
              <th width="197" scope="col"><span class="style8">NAME</span></th>
              <th width="149" bgcolor="#00FF66" scope="col"><span class="style8">PARTY</span></th>
              <th width="74" bgcolor="#993300" scope="col">UPDATED RESULT </th>
            </tr>
            <tr>
              <td height="151"><img src="images/socialdirector1.jpg" alt="" width="177" height="250" /></td>
              <td><span class="style11">RABIU UMAR </span><br/>
              <input type="submit" name="Submit4" value="view profile" onclick="return view_profile2('<?php echo "";  ?>')"/></td>
              <td><?php if($verify<1){ ?>
                <input name="Submit" type="submit"  onclick="return confirm_vote('<?php echo "RABIU UMAR AS Social director ";  ?>')" value="ASFC" />
                <?php } else echo "you have already voted"; ?></td>
              <td><?php echo $names;  ?>&nbsp;</td>
            </tr>
            <tr>
              <td height="150"><img src="images/socialdirector2.jpg" alt="" width="177" height="250" /></td>
              <td><span class="style11">Tijjani Mahmud Gazali</span> <br/>
              <input type="submit" name="Submit3" value="view profile" onclick="return view_profile('<?php echo "";  ?>')" /></td>
              <td><?php if($verify<1){ ?>
                <input type="submit" name="Submit2" value="SSFC" onclick="return confirm_vote('<?php echo "Tijjani Mahmud Gazali AS Social director ";  ?>')"/>
                <?php } else echo "you have already voted"; ?></td>
              <td><?php echo $names2;  ?></td>
            </tr>
            <tr>
              <td height="105">&nbsp;</td>
              <td>&nbsp;</td>
              <td> <a href="social_result.php">VIEW RESULTS </a></td>
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
	<p align="center"> Copyright &copy;2016 Designed by Cynthia Ali</p>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
<?php
}
?>
