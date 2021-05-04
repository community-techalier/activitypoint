<?php
   include("login.php");
   
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT usn from activcheckt where usn = '$user_check' ");
   $fetchlogin = mysqli_query($db,"SELECT * from activcheckt where usn='$user_check'");
   $fetchdata = mysqli_query($db,"SELECT * from testtable where usn='$user_check'");
   $fetchtotal = mysqli_query($db,"SELECT total from testtable where usn='$user_check'");


   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['usn'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>