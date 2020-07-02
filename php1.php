<html>
  <?php
$mysqli = new mysqli("localhost", "root", "", "HW1");
if ($mysqli->connect_errno) {
echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if (!$mysqli->query("DROP TABLE IF EXISTS test") ||
!$mysqli->query("CREATE TABLE test(id INT)") ||
!$mysqli->query("INSERT INTO test(id) VALUES (1)")) {
echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
} else {

echo "Table creation worked";
}
if (!empty($_POST)) {
$ID = $_POST['MessengerID'];
$FNAME = $_POST['FirstName'];
$LNAME = $_POST['LastName'];
$AGE = $_POST['Age'];
$MSG = $_POST['Message'];
$EMA = $_POST['Email'];

}
print "<br>" . $ID;
print "<br>" . $FNAME;
print "<br>" . $LNAME;
print "<br>" . $AGE;
print "<br>" . $MSG;
print "<br>" . $EMA;

$sql = "INSERT INTO Messenger (MessengerID, FirstName,LastName,Age,Message,Email)
VALUES ('".$ID."','". $FNAME . "','". $LNAME . "','". $AGE . "','". $MSG . "','".$EMA."')";
  print $sql;

if (mysqli_query($mysqli, $sql)) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "" . mysqli_error($mysqli);
}
//$mysqli->close();

?>
 <head>
<style>
  table{
     width:50%;
      font-size:14pt;
      color: yellow;
      background-color:green;
  }
  </style>
 </head> 
 <body>

<?php
$res = $mysqli->query("SELECT * FROM Messenger order by age ");
$res->data_seek(0);
 print "<table border=1 cellspacing=0 cellpadding=5px>";
 print "<tr><th>ID</th><th>Last</th><th>First</th><th>Age</th><th>Message</th></tr>";

while ($row = $res->fetch_assoc()) {
 print "<tr>";
      print "<td>";
        echo  $row['MessengerID'] . "</td><td>";
        $Messenger = $row['MessengerID'];
        echo  $row['LastName'] . "</td><td>";
        echo  $row['FirstName'] . "</td><td>";
        echo  $row['Age'] . "</td><td>";
        echo  $row['Message'] ."</td><td>";
        echo  $row ['Email'] .  "</td>";                 
      print "</tr>";
}
    print "</table>";
    ?>
  </body>  
  Click here to delete/edit  <a href = "Update.php" tite = "Logout">Entry.
  
    <a href = "home.html" tite = "Home">Home.
</html>

