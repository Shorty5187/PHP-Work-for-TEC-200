<?php
//Logical Operators are on page 46-47
$hour=13;

//if ($hour > 12 && $hour < 14) echo "it's time for lunch";

$msgs=5;
$msgs= "you have " . $msgs . " messages.";

$fullmsg="Michael, ";

$fullmsg.=$msgs;

//Michael you have 5 messages.
echo $fullmsg;

?>