<?php

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'phpedits');
   define('DB_PASSWORD', 'WinactPoint@2021');
   define('DB_DATABASE', 'activnew');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['usn']);
      $mypassword = mysqli_real_escape_string($db,$_POST['creden']); 
      
      $sql = "SELECT usn FROM activcheckt WHERE usn = '$myusername' and creden = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      // $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         header("location: loginerr.php");
         
      }
   }
?>