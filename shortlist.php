<html>
 <head>
   <script>
        function Fire(v){
         if (v == 1) {
          //alert("v=" + v) 
          document.getElementById("EditForm").action = "Edit.php"
          document.getElementById("EditForm").submit()  
          }
        if (v == 2){
          document.getElementById("EditForm").action = "php2.php"
          document.getElementById("EditForm").submit() 
        }
        if (v == 3){
          document.getElementById("EditForm").action = "ShortenList.html"
        document.getElementById("EditForm").submit() 
        }
        if (v == 4) {
          if (confirm("Are you Sure?")) {
            document.getElementById("EditForm").action = "delete.php"
            document.getElementById("EditForm").submit() 
          } else {
              //location.href = "MainUserpage.php"
          }
        }
      }
   </script>
  </head> 
  <body>
  <form action='_blank.php' method='post' id='EditForm' name='MainList'>  

<?php
  $name =  $_POST['lookFor'];
  //echo $IDnum;
  $mysqli = new mysqli("localhost", "root", "", "HW1");
  if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
$res = $mysqli->query("SELECT * FROM Messenger where lastname like '%" . $name . "%' order by LastName,FirstName");
$res->data_seek(0);
print "<table border=1 cellspacing=0 cellpadding=4>";
while ($row = $res->fetch_assoc()) {
  print "<tr>";
  print "<td>";
    print  $row['MessengerID'] . "</td><td>";
    $HW1 = $row['MessengerID'];
    print $row['LastName'] . "</td><td>";
    print  $row['FirstName'] . "</td><td>";
    print  $row['Age'] . "</td>";
    print "<td id='EditCol'> <input type='radio' id='Edit' name='Edit'  value='" . $HW1 . "' onClick='Fire(1)'></td>";
  print "</tr>";
}

?>
  </table>
    </form>
    </body>
  </html>