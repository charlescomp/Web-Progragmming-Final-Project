<html>
  <head>
    <title>Select for Edit</title>
    <script>
      function Fire(){
        document.getElementById("EditForm").submit()  
      }
    </script>
    <style>
      body{
        background-color:lime;
        
      }
      table{
        width:700px;
        
      }
    </style>
  </head>
  <body>
    
   
<?php
$mysqli = new mysqli("localhost", "root", "", "HW1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
    
$res = $mysqli->query("SELECT * FROM Messenger where HW1=". $HW1." order by LastName,FirstName");
$res->data_seek(0);
print "<form action='Edit.php' method='post' id='EditForm'>";
print "<input type='hidden' name='tabname' value='Messenger'>";
print "<input type='hidden' name='fldname' value='MessengerID'>";
print "<table border=1>";
print "<tr><th>ID</th><th>Last</th><th>First</th><th>Age</th><th> Edit?</th><th>Delete?</th></tr>";
while ($row = $res->fetch_assoc()) {
  print "<tr>";
  print "<td>";
    print  $row['MessengerID'] . "</td><td>";
    $HW1 = $row['MessengerID'];
    print $row['LastName'] . "</td><td>";
    print  $row['FirstName'] . "</td><td>";
    print  $row['Age'] . "</td>";
    print "<td> <input type='radio' name='Edit'  value='" . $HW1 . "' onClick='Fire()'></td>";
    print "<td> <input type='radio' id ='Remove' name='Remove'  value='" . $HW1 . "' onClick='Fire()'></td>";
  
  print "</tr>";
}
print "</table>";
print "<input type='Submit' value='Edit this record'>";
print "</form>";
?>
    
  </body>
</html>