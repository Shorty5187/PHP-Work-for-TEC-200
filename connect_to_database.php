<?php
$servername = "localhost";
$username = "root";
$password = "denver57";
$dbname = "maramatha";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//connects to users table
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["userid"]. " " . $row["username"]. " " . $row["userpw"]. " " . $row["usertype"]. " " .  $row["entrydate"] . " " . $row["activitydate"]. "<br>";
    }
} else {
    echo "0 results";
}
//$conn->close();

//connects to production table
$sql = "SELECT * FROM production";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["prodID"]. " " . $row["userID"]. " " . $row["prodDate"]. " " . $row["prodTime"]. " " .  $row["itemCount"] . " " .  //overflows onto next line
        $row["entrydate"]. " " .  $row["activitydate"]. " " . $row["comments"]. "<br>";
    }
} else {
    echo "0 results";
}
//$conn->close();

//connects to jobs table
$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["JobID"]. " " . $row["JobName"].  "<br>";
    }
} else {
    echo "0 results";
}
//$conn->close();

//connects to goals table
$sql = "SELECT * FROM goals";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["goalsid"]. " " . $row["goal"]. " " . $row["entrydate"]. " " . $row["jobid"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>