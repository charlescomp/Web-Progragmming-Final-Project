<html>
  <head>
    <title>M - RSVP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
    <script>
      var NumRows = 0
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
      //function Shorten(){
      //  document.getElementById("EditForm").action = "ShortenList.html"
      //  document.getElementById("EditForm").submit() 
       // WorkingPage.location.href = "ShortenList.html"
      //}
    </script>
    <style>
      body{
        background-color:limegreen;
        
      }
      table{
        width:700px;
        
      }
      .Title{
        font-size:18pt; 
      }
      #EditCol{
        //visibility:hidden;
        text-align:center;
      }
      iframe{
        border:none;
      }
    </style>
  </head>
  <body>
    <div class="Title"> <header>
       <h1  class="animated slideInDown">  ! M-RSVP ! </h1>
      <h2>
         If Error Occurs When Deleting a Record Please Refresh The Page
      </h2>
    </div>
<form action='_blank.php' method='post' id='EditForm' name='MainList' target='WorkingPage'>
<input type='hidden' name='tabname' value='Messenger'>
<input type='hidden' name='fldname' value='MessengerID'>
<table border=1 id='MessengerID'>
<tr><th>ID</th><th>Last</th><th>First</th><th>Age</th><th>Email</th><th id='Editcol'> Edit?</th><th>Time</th><th>Delete</th></tr>    

<?php
$mysqli = new mysqli("localhost", "root", "", "HW1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$res = $mysqli->query("SELECT * FROM Messenger order by LastName,FirstName");
$res->data_seek(0);

while ($row = $res->fetch_assoc()) {
  print "<tr>";
  print "<td>";
    print  $row['MessengerID'] . "</td><td>";
    $HW1 = $row['MessengerID'];
    print $row['LastName'] . "</td><td>";
    print  $row['FirstName'] . "</td><td>";
    print  $row['Age'] . "</td><td>";
  print  $row['Email'] . "</td>";

    print "<td id='EditCol'> <Button id='Edit' name='Edit'  value='" . $HW1 . "' onClick='Fire(1)'>Edit</button></td>"; 
  print  "<td>" . $row['register_date']. "</td>";
    print "<td id='EditCol'> <input type='radio' id='Remove' name='Remove'  value='" . $HW1 . "' onClick='Fire(4)'></td>";
    //print "<td id='EditCol'> <input type='radio' id='Remove' name='Remove'  value='" . $Skid . "' onClick='Fire(4)'></td>";
  print "</tr>";
}

echo '<script type="text/javascript">

          window.onload = function () { alert("The Info on This Screen Is Meant To Be Private."); }

</script>';


?>
  <tr>
    <td colspan=2>
      <Button name="INS" Id="NewR" onClick='Fire(2)'>
        Insert New Record
      </Button></td>
      <td colspan=3>
        <button name="Nid" Id='NarItDown' onClick='Fire(3)'>
          Seach by Last Name
        </button>
    </td>
    <td>
      <input type="reset" value="Clear Selections">
    </td>
  </tr>
  </table>
    </form>
<iframe name="WorkingPage" width=700px height=700px>
  
    </iframe>
      <p>
          <a href = "home.html" tite = "Home">Home.
        </p> 
  </body>
</html>