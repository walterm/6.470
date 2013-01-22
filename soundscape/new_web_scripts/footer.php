<?php

session_start();
include 'functions.php';

if(isset($_SESSION['user']))
{
	$user = $_SESSION['user'];
	$loggedin = TRUE;
}
else $loggedin = FALSE;

//TODO Format nav bar
if($loggedin)
{
	//Printing out navigation buttons
	echo "<br ><ul id='navigation_bar'>
            <li><a href='#home'>Home</a></li>
            <li><a href='#news'>Profile</a></li>
            <li><a href='#article'>Friends</a></li>
        </ul></br>";
}
else //If they're not logged in
{
	//echo "<br ><ul id='navigation_bar'>
    //        <li><a href='#home'>Home</a></li>
    //        </ul></br>";
}


?>