<?php

//did someone submit the form?
if($_SERVER["REQUEST_METHOD"] == "POST") {

    //yes, they did

    //retrieve form data
    
    $error="";
    $userEmail="";
    $updatequery="";
    $useremail = $_REQUEST['useremail'];

    $servername = "localhost";
    $username = "u226223037_anan";
    $password = "12Nerraw12";
    $dbname = "u226223037_anan";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //retrieve the email form the form

//u = users.userid

    //connects to users table and selects userEmail and usertype
    $sql = "select usertype, userid from users where userEmail = '" . $userEmail . "'";
    
    $result = mysqli_query($conn, $sql);
  
  if ($result == TRUE) {
      
    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()) {
           $userid= $row["userid"];
           $updatequery = "update users set ResetDateTime=Now(), ResetKey=UUID() where userid= $userid";
           
           UPDATE `ResetDateTime=Now()` SET `ResetKey=UUID()` = `new_value' [WHERE userid = $userid
           ]; 
           //Update query
           
           $sql = "select password from users where userid = '" . $userid . "'";
           // run another select query using WHERE userid = $userid to find the new ResetKey
           
           
if((isset($_POST['name']) && !empty($_POST['name']))
&& (isset($_POST['email']) && !empty($_POST['email']))
&& (isset($_POST['subject']) && !empty($_POST['subject']))){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	$to = "vivek@codingcyber.com";
	$headers = "From : " . $email;
	
	if( mail($to, $subject, $message, $headers)){
		echo "The email was sent. Please check your inbox.";
	}
}
           
           // build the link that goes into the email
           // example: https://maranathaapp.000webhostapp.com/ResetPWPage.php?uuid=d58d1940-465d-11e9-bf3d-feed01140006&u=3
           // uuid = ResetKey and u = userID
           
           
           // send the email w/ the message in it
           
           // display the message to the user with a link to the login page
           
           // end
           
          
        $error = "Your Login Name or Password is invalid";
    }
  }
}
  else { 
      $error = "0 Results."; 
  }
  
  $conn->close();
    
}
    //Need update query 

    //Send an email to the user
// Pear Mail Library
require_once "Mail.php";

$from = '<mshort104@gmail.com>';
$to = '<wileab@bluffton.edu>';
$subject = 'Maranatha Password Reset';
$body = 'Follow the link to reset your password: https://maranathaapp.000webhostapp.com/ResetPWPage.php?uuid=d58d1940-465d-11e9-bf3d-feed01140006&u=3';
echo $body;
//Email attached to active users where email == [] if yes update uuid = new value reset datetime = now()

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'maranathatracker@gmail.com',
        'password' => 'TEC200_maranatha'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
 } //else {
//     echo('<p>Email successfully sent! Please check your email.</p>');
// }

    $retval = mail ($to,$subject,$mail);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
</head>

<body bgcolor = "#FFFFFF">
 
   <div align = "center">
      <div style = "width:300px; border: solid 1px #333333; " align = "left">
         <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Change Password</b></div>
             
         <div style = "margin:30px">
           
            <form action = "Recover.php" method = "post">
               <label>Email  :</label><input type = "text" name = "useremail" class = "box"/><br /><br />
               
               <input type = "submit" value = " Submit "/><br />
            </form>
           
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
                 
         </div>
             
      </div>
         
   </div>

</body>

</html>