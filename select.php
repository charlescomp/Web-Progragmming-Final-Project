<?php
$mysqli = new mysqli("localhost", "root", "", "HW1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$res = $mysqli->query("SELECT * FROM Messenger order by age");
$res->data_seek(0);
print "<form action='delete.php' method='post'>";
print "<input type='hidden' name='tabname' value='HW1'>";
print "<input type='hidden' name='fldname' value='MessengerID'>";
print "<table border=1>";
print print "<tr><th>ID</th><th>Last</th><th>First</th><th>Age</th><th>Message</th>Delete?</th></tr>";
while ($row = $res->fetch_assoc()) {
  print "<tr>";
  print "<td>";
    print  $row['MessengerID'] . "</td><td>";
    $Messenger = $row['MessengerID'];
    print $row['LastName'] . "</td><td>";
    print  $row['FirstName'] . "</td><td>";
    print  $row['Age'] . "</td><td>";
    print  $row['Message'] . "</td>";
  
    print "<td><input type='radio' name='Remove'  value='" . $Messenger . "'></td>";
  print "</tr>";
}
print "</table>";
print "<input type='Submit' value='Delete this record'>";
print "</form>";
?>