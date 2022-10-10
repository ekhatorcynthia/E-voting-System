<?php
session_start();

$_SESSION['message']='good';

header('Location: Social_director.php');

?>