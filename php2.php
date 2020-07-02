 <?php
$mysqli = new mysqli("localhost", "root", "", "HW1");
if ($mysqli->connect_errno) {
echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$res = $mysqli->query("SELECT max(MessengerID)as ID FROM Messenger");
echo "We found " . $res->num_rows . " records for maxid.</br>";
$res->data_seek(0);
while ($row = $res->fetch_assoc()) {
    echo "ID num. = " . $row['ID'] . "<br>";
    $MaxID = $row['ID'];
    /*echo " Name = " . $row['LastName'] . "<br>";
    echo " Name = " . $row['FirstName'] . "<br>";*/
}
echo "old MaxID=". $MaxID;
$maxID = $MaxID +1;
echo "<br>new MaxID=" . $maxID;
    ?> 
<html>
   <head>
      <title>Add New Record in Messenger</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
      <h1  class="animated slideInDown">  !! Welcome to Charles's Info Page Please Insert Info Properly !! </h1>
     <p class="animated slideInDown">
     ! M-RSVP !
     </p>
     
   </head>

   <body>    
     <body style="background-color:limegreen;">
     
      <div id = "main">
         <form action = "php1.php" method = "post">
            <input type="text" name="MessengerID" value=" <?php echo $maxID; ?>">
            <label>First Name :</label>
            <input type = "text" name = "FirstName" id = "name" />
            <br/>
            <label>Last Name:</label>
            <input type="text" name="LastName">
            <br/>
           <label>Age:</label>
            <input type="text" name="Age">
            <br/>
           <label>Message:</label>
            <input type="text" name="Message">
            <br/>
            <label>Email:</label>
            <input type="text" name="Email">
            <br/>
            <input type = "submit" value ="Submit" name = "submit"/>
            <br/>
         </form>
         Click here to delete/edit  <a href = "Update.php" tite = "Logout">Entry.
        <p>
          <a href = "home.html" tite = "Home">Home.
        </p> 
      </div>
     </html>