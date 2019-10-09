<html>
 <head>
   <title> My Login Page </title>
 </head>
<body>


<?php
$hn = 'localhost';
$db = 'maramatha';
$un = 'root';
$pw = 'denver57';


//connect to the database
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) { die("Fatal Error");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

  //retrieve form data
  $myusername = $_REQUEST['username'];
  $mypassword = $_REQUEST['password'];
  $usertype = $_REQUEST['usertype'];
  //add retrieving the radio button user type


  //run a query to see if the user name and password are valid using the users table
  //add the user type into the where clause
  $sql = "SELECT userid FROM users WHERE username = '$myusername' and userpw = '$mypassword'";
 
  //pass the query to the database to get the results
  $result = $conn->query($sql);
  $count=$result->num_rows;
   //check the number of records returned. should be 1.
  if($count == 1) {     
     header("location: helloworld.php");
     die();
  }else {
     $error = "Your Login Name or Password is invalid";
  }
}

    //update the user record to reset the ResetKey and the ResetDatetime
    //update users set resetkey=uuid(), resetdatetime=now() where userid=3


    //select the resetkey back out of the table

    //build the link
    $emaillink="http://localhost/resetpwpage.php?key=" . $key . "&u=" . $userid;

    //Send an email to the user
    $to = "shomrb@bluffton.edu";
    $subject = "Maramatha Password Reset";

?>
  <title>Login Page</title>
 
  <style type = "text/css">
     body {
        font-family:Arial, Helvetica, sans-serif;
        font-size:14px;
     }
     label {
        font-weight:bold;
        width:100px;
        font-size:14px;
     }
     .box {
        border:#666666 solid 1px;
     }
  </style>
 

<body bgcolor = "#FFFFFF">
  <div align = "center">
     <div style = "width:300px; border: solid 1px #333333; " align = "left">
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
           
        <div style = "margin:30px">
         
           <form action = "loginfix.php" method = "post">


              <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
              <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
              <input type = "submit" value = " Submit "/><br />
              <input type="radio" name="usertype" value="Worker">Worker
              <input type="radio" name="usertype" value="Manager">Manager
             
           </form>
         
           <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
               
        </div>
           
     </div>
       
  </div>

</body>
</html>

