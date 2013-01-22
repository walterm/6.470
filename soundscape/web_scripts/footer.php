<?php
session_start();
echo "<!DOCTYPE html>\n<html><head>";
echo "<link rel='stylesheet' src='footer.css'";
include 'functions.php';

$userstr = ' (Guest)';

if (isset($_SESSION['user']))
{
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
}
else $loggedin = FALSE;

echo "<title></title>
     </head><body>";

if ($loggedin)
{
    echo "<br ><ul id='navigation_bar'>
            <li><a href='#home'>Home</a></li>
            <li><a href='#news'>Profile</a></li>
            <li><a href='#article'>Friends</a></li>
        </ul>";
}
?>
