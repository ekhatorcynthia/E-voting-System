<?php require_once('Connections/evoting.php'); ?>
<?php //redirecting to home
header("location: home.php");
?>
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
  $password=$_POST['txtstudentid'];
  $MM_fldUserAuthorization = "";
  $_SESSION['username']=$loginUsername;
  $MM_redirectLoginSuccess = "home.php";
  $MM_redirectLoginFailed = "welcome.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_evoting, $evoting);
  
  $LoginRS__query=sprintf("SELECT Username, Password FROM admin_login WHERE Username='%s' AND Password='%s'",
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
<title>|| Evoting||Admin Login</title>
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
.style7 {font-size: 16px; font-weight: bold; }
.style8 {color: #000000; font-weight: bold; font-size: 18px; }
.style3 {	color: #FF0000;
	font-weight: bold;
}
-->
</style>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="menu"></div>
`</div>
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
             <?php if(isset($_SESSION['message'])){ echo 'Your username and password does not match'; unset($_SESSION['message']); }  ?>
             <table width="313" align="center">
              <tr>
                <td width="96"><span class="style3">USERNAME</span></td>
                <td width="205"><span id="sprytextfield1">
                  <label>
                    <input type="text" name="txtusername" />
                  </label>
                <span class="textfieldRequiredMsg">please insert a username***.</span></span></td>
              </tr>
              <tr>
                <td height="30"><span class="style3">PASSWORD</span></td>
                <td><span id="sprytextfield2">
                  <input name="txtstudentid" type="password" id="txtstudentid" />
                <span class="textfieldRequiredMsg">please type your password***.</span></span></td>
              </tr>
              <tr>
                <td height="41"><label>
                  <input type="submit" name="Submit" value="Submit" />
                </label></td>
                <td><input type="reset" name="Submit2" value="Reset" /></td>
              </tr>
            </table>
            <p>&nbsp;</p>
        </form></td>
      </tr>
  </table>
	<p>Copyright &copy;2016 Designed by Cynthia Ali</p>
	<div id="footer2">
  </div>
    <p>&nbsp; </p>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
      </script>
</body>
</html>