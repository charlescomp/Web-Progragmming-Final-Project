<?php
   if (!empty($_POST)) {
     $Ans = $_POST['Remove'];
     $Tab = $_POST['tabname'];
     $Fld = $_POST['fldname'];
     print "<br>" . $Ans. "    ". $Tab . "   ". $Fld;
      } else {
     print "<br>No record selected.";
   }

    $mysqli = new mysqli("localhost", "root", "", "HW1");
    
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql="DELETE FROM " . $Tab . " where MessengerID=" . $Ans ;
 print "<br>" . $sql;
    $sql = $mysqli->query("DELETE FROM " . $Tab . " where MessengerID='" . $Ans ."'" );
    //print "<br>" . $sql;
        if (mysqli_query($mysqli, $sql)) {
           echo "Record deleted successfully";
        } else {
           echo "Error: " . $sql . "" . mysqli_error($mysqli);
        }
    $mysqli->close();
   
?>