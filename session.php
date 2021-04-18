<?php
   include("log1.php");
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT usn from activcheckt where usn = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['usn'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:log1.php");
      die();
   }
?>