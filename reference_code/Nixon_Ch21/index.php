<?php // Example 21-4: index.php
include_once 'header.php';

echo "<link rel='stylesheet' href='login.css' type='text/css'/>";
echo "<script src='login.js' type='text/javascript'></script>";

if ($loggedin) echo " $user, you are logged in.";
else //Copying the entire webpage
{
	echo "

		<div id='logo'><img src='soundscape_logo.png'/></div>
		<div id='signin'>
		
			<form method='post' action='>
				<p id='email'>
					<input class='design' type='text' name='username' value='Email' />
				</p>
				<p id='password'>
					<input class='design' type='password' name='pwd' value='Password' />
					<input type='submit' id='logbutton' value='Login' name='login' >
				</p>
				<p id='username'>
					<input class='design' type='text' name='username' value='Username' />
					<input type='submit' id='submit' value='Submit' name='submit' >
				</p>
			</form>
			
		</div>
		
		<div class='footer'>
			<button id='login'>Login</button> <button id='register'>Register</button>
			<div id='tagline'><p>Where musicians come to jam</p></div>
		</div>";
}

?>

</span><br /><br /></body></html>
