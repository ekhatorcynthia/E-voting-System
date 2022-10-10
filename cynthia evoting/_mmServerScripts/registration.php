<?php require_once('Connections/evoting.php'); ?>
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
<?php
include('includes/config.php');
$collect='';
if($_POST){
$collect = insert($_POST);
}


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
.style4 {font-size: 18px; color: #FFFFFF; }
-->
</style>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style14 {color: #0000CC}
.style15 {color: #0000FF}
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
    <p style="text-align:center; color:#FF0000;"><strong><marquee  behavior="scroll">
    THIS REGISTRATION FORM IS FOR ELEGIBLE STUDENTS OF AHMADU BELLO UNIVERSITY..... 
    </marquee>
    </strong></p>
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
          <h1    align="center"><strong></strong>
            <?php if(isset($_SESSION['message'])){ echo 'Registration was successfull'; unset($_SESSION['message']); }  ?>
          </h1>
          </div> <?php echo $collect; ?>        </th>
          </tr>
        </table>
          <form action="" name="form2" method="POST" enctype="multipart/form-data" id="form1">
            <table width="439" border="0" align="center" cellpadding="3" cellspacing="17" bordercolor="#00FF66">
              <tr>
                <th width="122" scope="col"><div align="justify" class="style14">FIRST NAME</div></th>
                <th width="254" scope="col"><div align="justify">
                  <input type="text" name="txtfirstname" />
                </th>
              </tr>
              <tr>
                <td><div align="justify" class="style15">LAST NAME</div></td>
                <td><div align="justify"><span id="sprytextfield2">
                  <input type="text" name="txtlastname" />
                <span class="textfieldRequiredMsg">A last name is empty.</span></span></div></td>
              </tr>
              <tr>
                <td><div align="justify" class="style15">SEX</div></td>
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
                <td><div align="justify" class="style15">AGE</div></td>
                <td><div align="justify"><span id="sprytextfield3">
                  <input type="text" name="txtage" />
                <span class="textfieldRequiredMsg">Age  is empty.</span></span></div></td>
              </tr>
			  <tr>
                <td><div align="justify" class="style15">Image</div></td>
                <td><div align="justify"></a><input name="pic" type="file" id="pic" size="10" />
</div></td>
              </tr>
              <tr>
                <td><div align="justify" class="style15">ADDRESS</div></td>
                <td><div align="justify">
                    <input type="text" name="txtaddress" />
                </div></td>
              </tr>
			  <tr>
                <td><div align="justify" class="style15">Student ID </div></td>
                <td><div align="justify">
                    <input type="int" name="txtatudentid" />
                </div></td>
              </tr>
              <tr>
                <td><div align="justify" class="style15">Country</div></td>
                <td><div align="justify">
                    <input type="text" name="txtcountry" />
                </div></td>
              </tr>
              <tr>
                <td><div align="justify" class="style15">STATE</div></td>
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
                <td><div align="justify" class="style15">STATE Non-Nigerian</div></td>
                <td><div align="justify">
                    <input type="text" name="txtnonnigeria" />
                </div></td>
              </tr>
              <tr>
                <td><div align="justify" class="style15">PHONE</div></td>
                <td><div align="justify">
                    <input type="text" name="txtphone" />
                </div></td>
              </tr>
              <tr>
                <td><div align="justify" class="style15">E-MAIL</div></td>
                <td><div align="justify">
                  <input type="text" name="txtemail" />
                </div></td>
              </tr>
              <tr>
                <td><div align="justify" class="style15">Faculty</div></td>
                <td><div align="justify">
                  <input type="text" name="txtfaculty" />
                </div></td>
              </tr>
              <tr>
                <td><span class="style15">Level</span></td>
                <td><div align="justify">
                  <input type="text" name="txtlevel" />
                </div></td>
              </tr>
              <tr>
                <td><span class="style15">USERNAME</span></td>
                <td><input type="text" name="txtusername" /></td>
              </tr>
              <tr>
                <td><span class="style15">VOTER'S ID </span></td>
                <td><input type="text" name="txtvoterid" /></td>
              </tr>
              <tr>
                <td><input type="submit" name="Submit" value="Registered" /></td>
                <td>&nbsp;</td>
              </tr>
            </table>
            
            
            
                
            
            
            <input type="hidden" name="MM_insert" value="form2">
        </form></th>
    </tr>
  </table>
  <p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>Copyright &copy; 2016 Designed by Cynthia Ali.</p>
</div>
</body>
</html>
<?php
}
?>
