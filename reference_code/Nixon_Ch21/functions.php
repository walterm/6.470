<?php // Example 21-1: functions.php
$dbhost  = 'sql.mit.edu';    // Unlikely to require changing
$dbname  = 'mchlljy+soundscape_users';       // Modify these...
$dbuser  = 'mchlljy';   // ...variables according
$dbpass  = 'bat49xar';   // ...to your installation
$appname = "Soundscape"; // ...and preference

//Establishing database connection
mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());

//Create a table in the database
function createTable($name, $query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br />";
}

//Perform the query
function queryMysql($query)
{
    $result = mysql_query($query) or die(mysql_error());
	 return $result;
}

//End the session on logout
function destroySession()
{
    $_SESSION=array();
    
    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
}

function sanitizeString($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return mysql_real_escape_string($var);
}

//Loading the profile page
function showProfile($user)
{
    if (file_exists("$user.jpg"))
        echo "<img src='$user.jpg' align='left' />";

    $result = queryMysql("SELECT * FROM users WHERE user='$user'");

    if (mysql_num_rows($result))
    {
        $row = mysql_fetch_row($result);
        echo stripslashes($row[1]) . "<br clear=left /><br />";
    }
}
?>
