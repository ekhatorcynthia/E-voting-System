<?php require_once('Connections/evoting.php'); ?>
<?php
// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="registration.php";
  $loginUsername = $_POST['txtusername'];
  $LoginRS__query = "SELECT username FROM voter WHERE username='" . $loginUsername . "'";
  mysql_select_db($database_evoting, $evoting);
  $LoginRS=mysql_query($LoginRS__query, $evoting) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
    header ("Location: $MM_dupKeyRedirect");
    exit;
  }
}

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;
  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO voter (First_name, Last_name, sex, Age, photo, Address, Student_id, country, `state`, state_nonindigene, phone, e_mail, faculty, `level`, username, Voters_id) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['txtfirstname'], "text"),
                       GetSQLValueString($_POST['txtlastname'], "text"),
                       GetSQLValueString($_POST['txtsex'], "text"),
                       GetSQLValueString($_POST['txtage'], "text"),
                       GetSQLValueString($_FILES['pic'], "text"),
                       GetSQLValueString($_POST['txtaddress'], "text"),
                       GetSQLValueString($_POST['txtatudentid'], "text"),
                       GetSQLValueString($_POST['txtcountry'], "text"),
                       GetSQLValueString($_POST['select'], "text"),
                       GetSQLValueString($_POST['txtnonnigeria'], "text"),
                       GetSQLValueString($_POST['txtphone'], "text"),
                       GetSQLValueString($_POST['txtemail'], "text"),
                       GetSQLValueString($_POST['txtfaculty'], "text"),
                       GetSQLValueString($_POST['txtlevel'], "text"),
                       GetSQLValueString($_POST['txtusername'], "text"),
                       GetSQLValueString($_POST['txtelectionid'], "int"));

  mysql_select_db($database_evoting, $evoting);
  $Result1 = mysql_query($insertSQL, $evoting) or die(mysql_error());

  $insertGoTo = "viewvoters.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_evoting, $evoting);
$query_Recordset1 = "SELECT * FROM voter";
$Recordset1 = mysql_query($query_Recordset1, $evoting) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>|| VOTING REGISTRATION SYSTEM||</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style11 {font-size: 18px; font-weight: bold; }
.style13 {font-size: x-large; font-weight: bold; color: #000000; }
.style2 {	color: #FF00FF;
	font-weight: bold;
}
.style3 {
	font-size: 18px;
	color: #000000;
}
.style4 {font-size: 18px; color: #FFFFFF; }
.style5 {font-size: 12px}
-->
</style>
<script type="text/JavaScript">
<!--



function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
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
		<li> <a href="index.php"> |  Home  |</a></li>
		<li>
		  <a href="login.php">|  Voting  |</a></li>
		<li>
		  <a href="result.php">|  Result  |</a></li>
		<li>
		  <a href="login.php" >|  Login  |</a></li>
		<li>
		  <a href="contact.php">|  Contact Us  |</a></li>
	</ul>
</div>
<div id="content">
	<div id="left">
    <p style="text-align:center; color:#FF0000;"><strong><marquee  behavior="scroll">THIS REISTRATION FORM IS FOR ELEGIBLE NIGERIAN WHO ARE ABOVE 18 YEARS OF AGE AS FROM 23RD JUNE 2012 </marquee></strong></p>
</div>
  <th height="41" colspan="2" scope="col"><h1><center>
   </center>
   
   </h1></th>
</div>
</div>
<div id="footer">
  <table width="651" border="0" align="center">
    <tr>
      <th width="645" height="783" scope="col"><table width="667" height="31" border="0" align="center" bgcolor="#00FF00">
          <tr>
            <th width="607" scope="col"><div align="center"><span class="style4">REGISTRATION FORM </span></div></th>
          </tr>
          <tr>
            <th scope="col"><div "align="center"  style="background:#FF00OO"  >
          <h1    align="center"><strong></strong></h1>
          </div>&nbsp;        </th>
          </tr>
        </table>
          <form action="<?php echo $editFormAction; ?>" name="form2" method="POST" enctype="multipart/form-data" id="form1">
            <table width="439" border="0" align="center" cellpadding="3" cellspacing="17">
              <tr>
                <th width="122" scope="col"><div align="justify">FIRSTNAME</div></th>
                <th width="254" scope="col"><div align="justify">
                  <input type="text" name="txtfirstname" />
                </div></th>
              </tr>
              <tr>
                <td><div align="justify">LASTNAME</div></td>
                <td><div align="justify">
                    <input type="text" name="txtlastname" />
                </div></td>
              </tr>
              <tr>
                <td><div align="justify">SEX</div></td>
                <td><div align="justify">
                  <label>
                  <select name="txtsex">
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                  </select>
                  </label>
                </div></td>
              </tr>
              <tr>
                <td><div align="justify">AGE</div></td>
                <td><div align="justify">
                    <input type="text" name="txtage" />
                </div></td>
              </tr>
			  <tr>
                <td><div align="justify">Image</div></td>
                <td><div align="justify"></a>
                  <input name="pic" type="file" id="pic" size="10" /></div></td>
              </tr>
              <tr>
                <td><div align="justify">ADDRESS</div></td>
                <td><div align="justify">
                    <input type="text" name="txtaddress" />
                </div></td>
              </tr>
			  <tr>
                <td><div align="justify">Student ID </div></td>
                <td><div align="justify">
                    <input type="int" name="txtatudentid" />
                </div></td>
              </tr>
              <tr>
                <td><div align="justify">Country</div></td>
                <td><div align="justify">
                    <input type="text" name="txtcountry" />
                </div></td>
              </tr>
              <tr>
                <td><div align="justify">STATE</div></td>
                <td><div align="justify">
                  <select name="select">
                    <option value="ABIA">ABIA</option>
                    <option value="ADAMAWA">ADAMAWA</option>
                    <option value="AKWA IBOM">AKWA IBOM</option>
                    <option value="ANAMBRA">ANAMBRA</option>
                    <option value="BAUCHI">BAUCHI</option>
                    <option value="BAYELSA ">BAYELSA </option>
                    <option value="BENUE ">BENUE </option>
                    <option value="BORNO">BORNO</option>
                    <option value="CROSS RIVER">CROSS RIVER</option>
                    <option value="DELTA">DELTA</option>
                    <option value="EBONYI">EBONYI</option>
                    <option value="EDO">EDO</option>
                    <option value="EKITI">EKITI</option>
                    <option value="ENUGU">ENUGU</option>
                    <option value="GOMBE">GOMBE</option>
                    <option value="IMO">IMO</option>
                    <option value="JIGAWA">JIGAWA</option>
                    <option value="KADUNA">KADUNA</option>
                    <option value="KANO">KANO</option>
                    <option value="KATSINA">KATSINA</option>
                    <option value="KEBBI">KEBBI</option>
                    <option value="KOGI">KOGI</option>
                    <option value="KWARA">KWARA</option>
                    <option value="LAGOS">LAGOS</option>
                    <option value="NASARAWA">NASARAWA</option>
                    <option value="NIGER">NIGER</option>
                    <option value="OGUN ">OGUN </option>
                    <option value="ONDO">ONDO</option>
                    <option value="OSUN">OSUN</option>
                    <option value="OYO">OYO</option>
                    <option value="PLATEAU">PLATEAU</option>
                    <option value="RIVERS">RIVERS</option>
                    <option value="SOKOTO">SOKOTO</option>
                    <option value="TARABA">TARABA</option>
                    <option value="YOBE">YOBE</option>
                    <option value="ZAMFARA">ZAMFARA</option>
                    <option value="ABUJA">ABUJA</option>
                  </select>
                  </div></td>
              </tr>
			  <tr>
                <td><div align="justify">STATE Non-Nigerian</div></td>
                <td><div align="justify">
                    <input type="text" name="txtnonnigeria" />
                </div></td>
              </tr>
              <tr>
                <td><div align="justify">PHONE</div></td>
                <td><div align="justify">
                    <input type="text" name="txtphone" />
                </div></td>
              </tr>
              <tr>
                <td><div align="justify">E-MAIL</div></td>
                <td><div align="justify">
                    <input type="text" name="txtemail" />
                </div></td>
              </tr>
              <tr>
                <td><div align="justify">Faculty</div></td>
                <td><div align="justify">
                    <input type="text" name="txtfaculty" />
                </div></td>
              </tr>
              <tr>
                <td>Level</td>
                <td><div align="justify">
                    <input type="text" name="txtlevel" />
                </div></td>
              </tr>
              <tr>
                <td>USERNAME</td>
                <td><input type="text" name="txtusername" /></td>
              </tr>
              <tr>
                <td>VOTER'S ID </td>
                <td><input type="text" name="txtuserid" />
                </tr>
              <tr>
                <td><input type="submit" name="Submit" value="Register" /></td>
                <td>&nbsp;</td>
              </tr>
            </table>
            
            
            
                
            <input type="hidden" name="MM_insert" value="form2">
        </form></th>
    </tr>
  </table>
  <p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>Copyright &copy; 2016 Designed by Cynthia Ali</p>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
