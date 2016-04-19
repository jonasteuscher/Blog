<?php
$verbindung = new mysqli("localhost","root","","blog");
    mysqli_select_db($verbindung, "blog");

if(isset($_POST['submit'])) // hier werden die Einträge aus der Textdatei und gepostet
 	{
    
    	$username = $_POST['username'];
    	$vorname = $_POST['vorname'];
        $nachname = $_POST['nachname'];
        $alter = $_POST['alter'];
        $passwort = $_POST['passwort'];
        
  
        $register = "INSERT INTO user (Username, Vorname, Nachname, Age, Passwort) VALUES ('$username', '$vorname', '$nachname', '$alter', '$passwort')";
        
        $registrieren = mysqli_query($verbindung, $register);
	}     
?>

    <!DOCTYPE HTML>
    <html>

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript">
            function PasswortPruefung() {
                if (window.document.Test.passwort.value != window.document.Test.passwort_wiederholen.value) {
                    window.alert("Passwörter stimmen nicht überein!");
                } else {
                    window.alert("Erfolgreich registriert.");
                }
            }
        </script>
        <link rel="stylesheet" href="css/loginCSS.css" type="text/css">
        <title>Register</title>
    </head>

    <body>
        <div id="banner">
        </div>
        <hr>
        <div id="content">
            <h3>Register</h3>
            <form name="test" method="post" autocomplete="off" onsubmit="PasswortPruefung();return false;">
                <p>
                    <input type="text" name="username" class="tab" placeholder="USERNAME" required>
                </p>
                <p>
                    <input type="text" name="vorname" class="tab" placeholder="VORNAME">
                </p>
                <p>
                    <input type="text" name="nachname" class="tab" placeholder="NACHNAME">
                </p>
                <p>
                    <input type="text" name="alter" class="tab" placeholder="ALTER">
                </p>
                <p>
                    <input type="password" name="passwort" class="tab" placeholder="PASSWORT">
                </p>
                <p>
                    <input type="password" name="passwort_wiederholen" class="tab" placeholder="PASSWORT WIEDERHOLEN">
                </p>

                <input type="submit" name="submit" value="Registrieren" class="button">
                <input type="button" onclick="window.location.href='index.php'" value="Zurück" class="button">
            </form>
        </div>
    </body>

    </html>