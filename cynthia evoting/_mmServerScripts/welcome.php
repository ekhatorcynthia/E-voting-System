<?php
session_start();

$_SESSION['message']='good';

header('Location: index.php');

?>