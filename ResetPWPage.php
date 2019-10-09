<!DOCTYPE html>
<head>
   <title>Reset Password Page </title> 
</head>

<body>
    <form action="ResetPWPage.php">
        
<?php

//retrieve the UUID from the Reset Password link that was sent in the email
//example link:  http://localhost/ResetPWPage.php?uuid=q3458adfknjjlkasdf&u=1
//uuid = users.ResetKey
//u = users.userid

$hn = 'localhost';
    $db = 'maranatha';
    $un = 'root';
    //$pw = 'AJG3599tractor45840';
    $pw="Rachel320!";


    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

//run a query to validate that uuid matches the userid in the database AND that it has not been more than 24 hours since users.ResetDateTime
//select * from users where resetkey='3e163eef-35e3-11e9-9b4f-a08cfdfc3651' and userid=3
    //and now() < date_add(resetdatetime, interval 1 day) 

//did I get a record?
//if yes... continue and allow to change password
//if no, stop and disallow (redirect back to login

echo '<input type="hidden" value="' . userid . '">"';

?>


        New Password:<br>
        <input type="password" name="New Password">
        <br>
        <br>
        Confirm New Password:<br>
        <input type="password" name="Confirm">

        <input type="hidden" value="userid">
        <br><br>
        <input type="submit" value="Submit">
    </form>    
<?php
    
    if ($_POST["New Password"] === $_POST["Confirm"]) {
        $sql = "UPDATE users SET userpw ='New Password', ResetKey = uuid() , ResetDateTime = DateTime() WHERE userid=" ;
    }
    else {
        echo "ERROR!! Passwords don't match";
    }

$conn->close();
?>
</body>
</html>