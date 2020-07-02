<?php
  $IDnum =  $_POST['Edit'];
  //echo $IDnum;
  $mysqli = new mysqli("localhost", "root", "", "HW1");
  if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  
  $res = $mysqli->query("SELECT * FROM Messenger where MessengerID=" . $IDnum );
  //echo "We found " . $res->num_rows . " records for maxid.</br>";
  $res->data_seek(0);
  while ($row = $res->fetch_assoc()) {
     $Tab = $_POST['tabname'];
      $ID = $row['MessengerID'];
   // echo $ID . "<br>";
      $FirstName = $row['FirstName'];
      $LastName =  $row['LastName'];
      $Age = $row['Age'];
      $Msg = $row['Message'];
    $time = strftime("%X"); //time
      $date = strftime("%B %D, %Y"); //date
  }
?> 
<html>
   <head>
      <title>Edit the following Record in Messenger table</title>
   </head>
   <body>     
      <div id = "main">
         <form action = "update2.php" method = "post">
           <input type='hidden' name='tabname' value='Messenger'>
            <input type="hidden" name="MessengerID" value=" <?php echo $ID; ?>">
           <table>
             <tr>
               <td>
               <label>First Name :</label>
               </td>
              <td>
               <input type = "text" name = "FirstName" id = "name" value="<?php echo $FirstName;?> " />
               </td>
             </tr>
             <tr>
               <td>
               <label>Last Name :</label>
               </td>
              <td>
               <input type = "text" name = "LastName" id = "name" value="<?php echo $LastName;?> " />
               </td>
             </tr>
             
             </tr>
             <tr>
               <td>
               <label>Age :</label>
               </td>
              <td>
               <input type = "text" name = "Age" id = "name" value="<?php echo $Age;?> " />
               </td>
             </tr>
           <tr>
               <td>
               <label>Message :</label>
               </td>
              <td>
               <input type = "text" name = "Message" id = "name" value="<?php echo $Msg;?> " />
               </td>
             </tr>
             
             </tr>
             <td>
               <label>Post-Time :</label>
               </td>
              <td>
               <input type = "text" name = "Time" id = "name" value="<?php echo $time;?> " />
               </td>
        <td>
               <label>Post- Date :</label>
               </td>
              <td>
               <input type = "text" name = "Time" id = "name" value="<?php echo $date;?> " />
               </td>
             </tr>
           </table>
            
            <input type = "submit" value ="Submit" name = "submit"/>
            <br />
         </form>
      </div>
     </html>