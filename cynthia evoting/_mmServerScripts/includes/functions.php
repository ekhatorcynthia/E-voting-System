<?php
$connect=mysql_connect('localhost',DBUSER,DBPASS);
mysql_select_db(DATABASE);


function query($que){
	if(!$check = mysql_query($que))
	{
	echo '<h4> an error occured '.mysql_error(). '</h4>';
	echo '<p>error: '.mysql_error(). '</p>';
	echo '<p>SQL:'.$que.'</p>';
	exit;
	}	
	else return $check;
	}
function insert($data){
	
    if(empty($data['txtfirstname'])) return 'Please enter voters Firstname';
	if(empty($data['txtlastname'])) return 'Please choose voters Lastname ';
	if(empty($data['txtsex'])) return 'Please choose voters Sex';
	if(empty($data['txtage'])) return 'Please enter voters Age';
	if(empty($_FILES['pic'])) return 'Please enter voters picture';
	if(empty($data['txtaddress'])) return 'Please enter voters address ';
	if(empty($data['txtatudentid'])) return 'Please enter voters student ID';
	if(empty($data['txtcountry'])) return 'Please enter voters country';
	if(empty($data['select'])) return 'Please enter voters state';
	if(empty($data['txtnonnigeria'])) return 'Please enter voters other state';
	if(empty($data['txtphone'])) return 'Please enter voters phone number';
	if(empty($data['txtemail'])) return 'Please enter voters email';
	if(empty($data['txtfaculty'])) return 'Please enter voters faculty'; 
	if(empty($data['txtlevel'])) return 'Please enter voters level'; 
	if(empty($data['txtusername'])) return 'Please enter voters username'; 

$_POST['Reg_No']="";	
if(($_FILES['pic']['type']=='image/jpg' or
	  $_FILES['pic']['type']=='image/png' or
   	  $_FILES['pic']['type']=='image/jpeg' or
      $_FILES['pic']['type']=='image/gif')){
  $target="images/".$_POST['Reg_No']."_".$_FILES['pic']['name'];
  move_uploaded_file($_FILES['pic']['tmp_name'],$target);
  }
  else{
  echo "Wrong Picture Format";
  exit;
  }
	
//check if username already exist
$fname = $data['txtatudentid'];
if($chk = mysql_query("select Student_id from voter where Student_id ='$fname'"));
$numrows = mysql_num_rows($chk);
if($numrows > 0) return 'Student ID ALREADY EXIST';

$username = $data['txtusername'];
if($chk = mysql_query("select username from voter where username ='$username'"));
$numrows = mysql_num_rows($chk);
if($numrows > 0) return 'Username already taken, choose another username';

if(mysql_query("INSERT INTO voter (First_name,Last_name,sex,Age,photo,Address,Student_id,country,state,state_nonindigene,phone,e_mail,faculty,level,username) values('".$_POST['txtfirstname']."','".$_POST['txtlastname']."','".$_POST['txtsex']."','".$_POST['txtage']."','".$target."','".$_POST['txtaddress']."','".$_POST['txtatudentid']."','".$_POST['txtcountry']."','".$_POST['select']."','".$_POST['txtnonnigeria']."','".$_POST['txtphone']."','".$_POST['txtemail']."','".$_POST['txtfaculty']."','".$_POST['txtlevel']."','".$_POST['txtusername']."')")){

return ' YOUR REGISTRATION WAS SUCCESSFUL';}
else return 'YOUR REGISTRATION WAS NOT SUCCESSFUL';
}

function login($log){
	if(empty($log['txtusername'])) return 'Username is empty,Kindly insert your Username';
	if(empty($log['tstudentid'])) return 'Election ID is empty,Kindly insert your Election ID';
	
	$uname = $log['txtusername'];
	$pass =  $log['tstudentid'];
	if($result = query("SELECT username,student_id FROM voter WHERE username = '$uname' AND student_id = '$pass'"));

	$numrows = mysql_num_rows($result);
	
	if($numrows == 1){
// Register $myusername, $mypassword and redirect to file "browse_page.php"
$_SESSION['username']=$log['txtusername'];
session_register("tstudentid");
header("location: choose_election.php");
return 'you have successfully login';
}
else 
	{return 'Invalid Login-in';}
	}

function adminlogin($log2){
	if(empty($log2['txtusername'])) return 'Username is empty,Kindly insert your Username';
	if(empty($log2['txtstudentid'])) return 'Election ID is empty,Kindly insert your Election ID';
	
	$uname = $log2['txtusername'];
	$pass =  $log2['txtstudentid'];
	if($result = query("SELECT username,password FROM admin_login WHERE username = '$uname' AND password = '$pass'"));

	$numrows = mysql_num_rows($result);
	
	if($numrows == 1){
// Register $myusername, $mypassword and redirect to file "browse_page.php"
session_register("txtusername");
session_register("txtstudentid");
header("location: Admin_index.php");
return 'you have successfully login';
}
else 
	{
	header("location: welcome.php");
	$_SESSION['username']=$uname;
	}
	}
function get_pres_vote(){
	$get = query('SELECT cand_name,party,pres_count FROM presidential_votes');
	while($var = mysql_fetch_assoc($get))
	{
	$yes[] = $var;
	}
	return $yes;
		}
		
	function get_vice_vote(){
	$gets = query('SELECT vice_president.cand_name, vice_president.party, vice_president.vice_count
FROM vice_president');
	while($vars = mysql_fetch_assoc($gets))
	{
	$yess[] = $vars;
	}
	return $yess;
	
	}
	function get_social_vote(){
	$gets = query('SELECT sodirector_votes.cand_name, sodirector_votes.party, sodirector_votes.social_count, sodirector_votes.vote_date
FROM sodirector_votes');
	while($vars = mysql_fetch_assoc($gets))
	{
	$yess[] = $vars;
	}
	return $yess;
	
	}
	function get_treasurer_vote(){
	$gets = query('SELECT treasurer_votes.cand_name, treasurer_votes.party, treasurer_votes.treasure_count, treasurer_votes.vote_date
FROM treasurer_votes');
	while($vars = mysql_fetch_assoc($gets))
	{
	$yess[] = $vars;
	}
	return $yess;
	
	}
	
?>