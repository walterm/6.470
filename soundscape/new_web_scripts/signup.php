<?php
include_once 'footer.php';

echo <<<_END
<script>
function checkUser(user)
{
    if (user.value == '')
    {
        O('info').innerHTML = ''
        return
    }

    params  = "user=" + user.value
    request = new ajaxRequest()
    request.open("POST", "checkuser.php", true)
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    request.setRequestHeader("Content-length", params.length)
    request.setRequestHeader("Connection", "close")
    
    request.onreadystatechange = function()
    {
        if (this.readyState == 4)
            if (this.status == 200)
                if (this.responseText != null)
                    O('info').innerHTML = this.responseText
    }
    request.send(params)
}

function ajaxRequest()
{
    try { var request = new XMLHttpRequest() }
    catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
            try { request = new ActiveXObject("Microsoft.XMLHTTP") }
            catch(e3) {
                request = false
    }   }   }
    return request
}
</script>
_END;

//Initializing variables
$error = $user = $pass = "";

//If the user has been set, reset the session so that we can register a new user
if (isset($_SESSION['user'])) destroySession();

//If we have a user parameter
if (isset($_POST['user']))
{
    //Clean for injections
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    //If there are empty fields
    if ($user == "" || $pass == "")
        //Ask for them again
        $error = "Not all fields were entered<br /><br />";
    else
    {
        //If we get a non-zero number of rows
        if (mysql_num_rows(queryMysql("SELECT * FROM users WHERE user='$user'")))
            $error = "That username already exists<br /><br />";
        else
		  {
            //Account was created!
            queryMysql("INSERT INTO users(user, pass) VALUES('$user', '$pass')");
            header('Location: http://soundscape.mchlljy.scripts.mit.edu/profile.php');
        }
    }
}

?>
