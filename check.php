<?php
include('config.php');
$id=mysqli_real_escape_string($link,$_GET['id']);
mysqli_query($link,"UPDATE activcheckt set verification_status='1' where verification_id='$id'");
echo "Your account verified";
?>
<a href="login.html"> Click here for Login</a>
