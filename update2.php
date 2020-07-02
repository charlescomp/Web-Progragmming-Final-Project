<html>
 
<?php
  if (!empty($_POST)) {
    $Tab = $_POST['tabname'];
   $ID = $_POST['MessengerID'];
  $FNAME = $_POST['FirstName'];
  $LNAME = $_POST['LastName'];
  $MSG = $_POST['Message'];
  $MSG = $_POST[''];


   } else {
     print "<br>No record selected.";
   }
  //$IDnum =  $_POST['Edit'];
  //echo $IDnum;
  $mysqli = new mysqli("localhost", "root", "", "HW1");
  if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  $sql = "UPDATE " . $Tab . " SET FirstName='" . $FNAME . "', LastName='" . $LNAME. "', Message='" . $MSG. "' where MessengerID='" . $ID . "'";
  print $sql;
  if (mysqli_query($mysqli, $sql)) {
       echo "Record updated successfully";
    } else {
       echo "Error: " . $sql . "" . mysqli_error($mysqli);
    }
   $mysqli->close();
?>
  <head>
    <script>
      
    </script>
    
  </head>
  <body>
    <script>
    //
      document.location.href = "Update.php"
    </script>
  </body>
  </html>