<?php
include('DB.php');
session_start();
$check=$_SESSION['login_email'];
$session=mysql_query("select email from user where email='$check' ");
$row=mysql_fetch_array($session);
$login_session=$row['email'];
if(!isset($login_session))
{
   echo("<script>location.href = '/online_market/index.php';</script>");
} 
?>