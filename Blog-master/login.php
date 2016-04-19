<link rel="stylesheet" href="css/loginCSS.css" type="text/css">
<script text="text/javascript">
function check()
{
var username = inputs.usr.value; //die festgelegten daten des Users, nur mit diesen Datehn kann eingeloggt werden
var password = inputs.pw.value;
var adminusr = "admin";
var adminpw = "password";

if(username == adminusr && password == adminpw)
{

alert('Logged in'); //login erfolgreich
<?php session_start();  $_SESSION['logged_in'] = true;
    $_SESSION['user'] = 'admin'; ?>
    
}
else
{ //login gescheitert
alert('login failed'); 
    
    return false;

}
}
</script>
<?php

if(isset($_GET['usr']))
{
    $username = $_GET['usr'];
}
?>
<!DOCTYPE HTML>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <link rel="stylesheet" href="css/loginCSS.css" type="text/css">
<title>Login</title>
</head>
<body>
<div id="banner">
</div>
<hr>
<div id="content">
<h3>Login</h3>
<form name="inputs" onsubmit="return check();" action="index.php" method="get">
<p><input type="text" name="usr" class="tab" placeholder="USERNAME" required></p>
<p><input type="password" name="pw" class="tab" placeholder="PASSWORD" required></p>
<input type="submit" name="submit" value="Login" class="button">
<input type="button" onclick="window.location.href='index.php'" value="Zurück" class="button">
</form>
</div>
</body>
</html>