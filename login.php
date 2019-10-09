<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title> My Login Page </title>
    </head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "denver57";
$database = "maramatha";

//connect to the database
$conn = new mysqli($servername, $username, $password, $database);
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
     header("location: dashboard.php");
     die();
  }else {
     $error = "Your User Name or Password is invalid";
  }
}
?>

<!--                                        JavaScript goes here                               -->
<script>

function show1(){
  document.getElementById('div1').style.display ='none';
}

function show2(){
  document.getElementById('div1').style.display = 'block';
}

</script>

  <title>Login Page</title>
 
 <!--                                        CSS Begins Here                                   -->
<style > /*type = "text/css"*/

</style>
<body> 
  <div align = "left" >
     <!--<div style = "width:700; border: solid 1px #333333; " align = "left">-->
        <!--<div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>-->
           
        <div style = "margin:300px">
           <form action = "index.php" method = "post">
               <label>Username: </label><input type = "text" name = "username" class = "box"/><br /><br />
               <label>Password: </label><input type = "password" name = "password" class = "bin" /><br/><br />
               <div align="center">
                  <input type = "submit" value = " Log In " color = "#000000" /> <br/><br>
               </div> 
            <div align="center"> 
               <input type="radio" name="tab" value="igotnone" onclick="show1();" />
                     Worker
               <input type="radio" name="tab" value="igottwo" onclick="show2();" />
                     Manager <br><br>
            </div>
               <div id="div1" class="hide" align="center">
               <span class="psw" > 
                  <a href="Recover.php">Forgot Password?</a>
               </span>
            </form>
            </div>
         </div>   
      </div> 
   </div>
   </body>
</html>