<?php 
session_start();
include_once 'footer.php';

if (isset($_SESSION['user']))
{
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
}
else $loggedin = FALSE;


//If not logged in, kill the page
if(!$loggedin)
{
	echo 
	"<div id='profile_info'>
	<img src='soundscape_logo.png'> <br />
	Welcome to Soundscape. You're not logged in!<br />
	More content coming soon!
	</div>";
}

//Print out the div to contain the profile information
else
{
	echo 
	"<div id='profile_info'>
	<img src='soundscape_logo.png'> <br />
	Hey there, $user. Welcome to Soundscape. <br />
	More content coming soon!
	</div>";
}
?>