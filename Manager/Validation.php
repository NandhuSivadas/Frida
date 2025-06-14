<?php
session_start();
if($_SESSION["managerid"]=="")
{
	header("location:../Guest/Login.php");
}

?>