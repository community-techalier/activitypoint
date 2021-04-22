<?php

$name = $_POST["namec"];
$email = $_POST["email"];
$usn = $_POST['usn'];
$creden = $_POST['creden'];
$credencnmf = $_POST['credencnfm'];

$conn = new mysqli('localhost','root','','activnew');
if($conn->connect_error){
    die('connection FAiled : '.$conn->connect_error);


}
else if($creden==$credencnmf)
{
  
              $sql = "INSERT INTO activcheckt (namec, email, usn, creden, credencnfm)
          VALUES ('$name','$email', '$usn', '$creden','$credencnmf')";

          if ($conn->query($sql) === TRUE) {
              
            header("location: login.php");
            

          } else
           {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
 }
else{
     header("register.php");

   }
        
$conn->close();

?>