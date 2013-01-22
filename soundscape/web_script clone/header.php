<?php // Example 21-2: header.php
session_start();
echo "<!DOCTYPE html>\n<html><head><script src='login.js'></script>";
include 'functions.php';

$userstr = ' (Guest)';

if (isset($_SESSION['user']))
{
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
}
else $loggedin = FALSE;

echo "<title>$appname</title>
     </head><body>";

if ($loggedin)
{
    echo "<br ><ul class='menu'>" .
         "<li><a href='members.php?view=$user'>Home</a></li>" .
         "<li><a href='members.php'>Members</a></li>" .
         "<li><a href='friends.php'>Friends</a></li>" .
         "<li><a href='messages.php'>Messages</a></li>" .
         "<li><a href='profile.php'>Edit Profile</a></li>" .
         "<li><a href='logout.php'>Log out</a></li></ul><br />";
}
?>
