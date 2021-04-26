<?php
   include('session.php');
   // include('dashboard.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   <body>
   <table align="center" border="1px">
   <tr>
   <th colspan="4">
   <h2>STudent database</h2>
   </th>
   </tr>
   <tr>
   <th> USN </th>
   <th> NAME </th>
   <th> EMAIL </th>
   </tr>
   <?php
    while($rowdata=mysqli_fetch_assoc($fetchdata))
    {
       ?>
       <tr>
          <td><?php echo $rowdata['usn']; ?></td>
          <td><?php echo $rowdata['Cyclathon']; ?></td>
          <td><?php echo $rowdata['Plog run']; ?></td>
       </tr>
       <?php
    }
    ?>

    

   

   </table>
   </body>
   

 
   
</html>