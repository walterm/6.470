<?php

include_once 'footer.php';

//Initializing parameters for logging in
$error = $user = $pass = "";


//If the server has received user imput
if (isset($_POST['user']))
{

    //Clean for injections
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    //If empty fields
    if ($user == "" || $pass == "")
    {
        $error = "Not all fields were entered<br />";
    }
    else //Perform the query and retrieve their information
    {
        $query = "SELECT user,pass FROM users WHERE user='$user' AND pass='$pass'";

        //If there are no rows returned, then something was wrong.
        if (mysql_num_rows(queryMysql($query)) == 0)
        {
            $error = "<span class='error'>Username/Password
                      invalid</span><br /><br />";
        }
        else //Setting a session
        {
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            echo "<html><head></head><body><p>test</p>";
            header('Location: http://soundscape.mchlljy.scripts.mit.edu/profile.php');

        }
    }
}

?>