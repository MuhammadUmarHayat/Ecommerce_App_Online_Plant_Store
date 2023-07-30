<?php
session_start();
$username=   $_SESSION['username'];
if(!isset($username))
{
    header('Location:http://localhost/rmPlantStore/logout.php');
}
include("header.php");
?>
<h1>Welcome <?php

echo $username;

?>
 </h1>