
<?php
//connect to the databasee
$servername = "localhost";
$username = "root";
$password = "denver57";
$database = "maramatha";

//connect to the database
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) { die("Fatal Error");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
}
// Check connection
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
//build your query and putting into a string variable
$sql = "SELECT JobName FROM jobs";

//pass the query to the database and put the query into a results variable
$result = mysqli_query($conn, $sql);

//did the query work
if ($result == TRUE) {

    //are there any results
    if (mysqli_num_rows($result) > 0) {
     echo '<div class="dropdown" align=center>';
      echo '<button class="dropbtn">Jobs by Name</button>';
      echo '<div class="dropdown-content">';   
      
        //put results into variables
        while($row = $result->fetch_assoc()) {
           $userid= "<a href='#'>" . $row["JobName"] . "</a>";
           echo $userid;
        }
        echo '</div>';
  echo '</div>';
    
        //processing the data from the database
        // there may be a lot of steps here
    }
    else {

        //no results found
        $UserMsg = "Results not Found.";
        }
    }   
else {
  //query didn't work
  $UserMsg = "Results not Found.";
}

//next, display the html

?>

<html>

<head>
    <!--<link rel="stylesheet" type="text/css" href="styles.css">-->
    <title>Add Progress</title>
</head>

<style>
/* Dropdown Button */
.dropbtn {
  background-color: #000000;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  position: center;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: center;
  display: inline-block;
  align: center;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #C3C3C3;}
</style>


<body>
  <p> Proof that it connects and retireves data from the database shown above</p>
  <p> Below is the drop down, but that content was added in by me and not from the database</p>  
  <div class="dropdown" align=center>
        <button class="dropbtn">Jobs by Name</button>
        <div class="dropdown-content">
            <a href="#">Build</a>
            <a href="#">Wrap</a>
            <a href="#">Mylars</a>
            <a href="#">Winding</a>
            <a href="#">Ear & Mic Install</a>
            <a href="#">Fill Tubes</a>
            
        </div>
    </div>

</body>

</html>