<?php require_once('Connections/evoting.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['txtusername'])) {
  $loginUsername=$_POST['txtusername'];
  $password=$_POST['tstudentid'];
  $MM_fldUserAuthorization = "";
  $_SESSION['studid']=$password;
  $_SESSION['username']=$password;
  $MM_redirectLoginSuccess = "choose_election.php";
  $MM_redirectLoginFailed = "userwelcome.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_evoting, $evoting);
  
  $LoginRS__query=sprintf("SELECT username, Student_id FROM voter WHERE username='%s' AND Student_id='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $evoting) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
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
.style8 {color: #000000; font-weight: bold; font-size: 18px; }
.style3 {	color: #FF0000;
	font-weight: bold;
}
.style9 {color: #000000}
-->
</style>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
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
	    <div align="center"><a href="index.php" class="style9">MAIN PAGE 
	      </a>          </div>
	</ul>
</div>
<div id="content">
	<div id="left">
    <p style="text-align:center; color:#FF0000;"><strong><marquee  behavior="scroll">
    THIS E-VOTING SYSTEMIS FOR ELEGIBLE STUDENT OF AHMADU BELLO UNIVERSITY
    </marquee></strong></p>
</div>
  <th height="41" colspan="2" scope="col"><h1><center>
   </center>
   
   </h1></th>
</div>
</div>
<div id="footer">
  <p class="style8">LOGIN CONSOLE </p>
	<table width="371" height="177" border="1" align="center" bgcolor="#99CCFF">
      <tr>
        <td width="361" height="32"><table width="200" align="center" bgcolor="#CCCCCC">
            <tr>
              <td height="29"><div align="center"><span class="style3">LOGIN CONSOLE </span></div></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="130"><form id="form1" method="POST" action="<?php echo $loginFormAction; ?>">
		<?php if(isset($_SESSION['message'])){ echo 'Your username and Student ID does not match'; unset($_SESSION['message']); }  ?>
          <table width="313" align="center">
              <tr>
                <td width="96"><span class="style3">USERNAME</span></td>
                <td width="205"><span id="sprytextfield1">
                <label>
                  <input type="text" name="txtusername" />
                </label>
                <span class="textfieldRequiredMsg">Invalid Username.</span></span></td>
              </tr>
              <tr>
                <td height="30"><span class="style3">STUDENT ID</span></td>
                <td><span id="sprytextfield2">
                <input name="tstudentid" type="text" id="tstudentid" />
                <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid Student ID.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span></td>
              </tr>
              <tr>
                <td height="41"><label>
                  <input type="submit" name="Submit" value="Submit" />
                </label></td>
                <td><input type="reset" name="Submit2" value="Reset" /></td>
              </tr>
            </table>
        </form></td>
      </tr>
    </table>
	<p>&nbsp;</p>
	<p>Copyright &copy; 2016 Designed by Cynthia Ali. </p>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer", {validateOn:["blur"], maxChars:15});
</script>
</body>
</html>
