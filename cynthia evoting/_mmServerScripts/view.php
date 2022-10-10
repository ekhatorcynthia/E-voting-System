<html>
<head>
</head>
<body>
<?php
	include "config.php";

	foreach($_POST as $k=>$v)
	{
		if(substr($k,0,4)=="chkd")
		{
			$qdel="delete from voter where student_id=".$v;
			mysql_query($qdel);
		}
	
	echo "<script>window.location='viewvoters.php';</script>";
	}
?>
</body>
</html>