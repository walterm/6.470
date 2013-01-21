<?php 
include_once 'footer.php';

$error = $user = $pass = "";

if (isset($_POST['user']))
{
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    if ($user == "" || $pass == "")
    {
        $error = "Not all fields were entered<br />";
    }
    else
    {
        $query = "SELECT user,pass FROM users
            WHERE user='$user' AND pass='$pass'";

        if (mysql_num_rows(queryMysql($query)) == 0)
        {
            $error = "<span class='error'>Username/Password
                      invalid</span><br /><br />";
        }
        else
        {
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            die("You are now logged in. Please <a href='members.php?view=$user'>" .
                "click here</a> to continue.<br /><br />");
        }
    }
}


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