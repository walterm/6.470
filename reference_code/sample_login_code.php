

<?php
//Connect to the MySQL database
$db = mysql_connect("localhost", "6470user", "6470") or 
die(mysql_error());

//Create the database if it doesn't exist
mysql_query("CREATE DATABASE IF NOT EXISTS 6470example") or 
die(mysql_error());

//Select the database associated with this
mysql_select_db("6470example", $db) or die(mysql_error());

//Grab the account with the passed in username and password
mysql_query("CREATE TABLE IF NOT EXISTS users (USERNAME 
VARCHAR(2000), PASSWORD VARCHAR(2000))") or 
die(mysql_error());

if (isset($_POST["username"]) && isset($_POST["password"])) 
{
	//Establish the database connection
	require("db.php");

	//Pass in the user paramters
	$user = $_POST["username"]; 
	$pass = $_POST["password"];

	//the MySQL query
	$query = "SELECT PASSWORD from users WHERE USERNAME='" .
	mysql_real_escape_string($user) . "'";

	//Isolate the individual result
	$result = mysql_query($query, $db) or die(mysql_error());
	$row = mysql_fetch_assoc($result);

	//If we've correctly found the right user, start their session
	if ($pass == $row["PASSWORD"]) {
	$_SESSION["username"] = $user;
	}
	//Otherwise report a mismatch
	else 
	{
	echo "Invalid username or password <br />";
	}
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
	require("db.php");
	$user = mysql_real_escape_string($_POST["username"]);
	$pass = mysql_real_escape_string($_POST["password"]);
	$query = "INSERT INTO users VALUES ('$user', '$pass')";
	mysql_query($query, $db) or die(mysql_error());
	echo "Registration for $user was successful <br /><br />";
	// HTML login <a href> tag
} 
else {
// HTML form
}
?>

