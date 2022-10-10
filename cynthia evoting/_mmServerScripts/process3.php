<?php
session_start();

$_SESSION['message']='good';

header('Location: Vice_pres.php');

?>