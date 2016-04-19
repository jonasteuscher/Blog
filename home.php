<?php session_start();  if (!$_SESSION['logged_in'] = false)

?>
    <!DOCTYPE html>
    <html lang="de">

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <script>
            function myFunction() {
                confirm("Wirklich löschen?);
                }
        </script>
        <link rel="stylesheet" href="css/indexCSS.css" type="text/css">
        <meta charset="utf-8">

        <title>Blog</title>
    </head>

    <body>
        <div id="banner">

        </div>
        <hr>
        <div id="container">
            <div id="Header">

                <p class="linksposition">
                    <t style="float: left;">
                        <?php  if (isset($_SESSION['user'])) { echo 'Logged in as: ' .$_SESSION['user'];} else { //login und logout, Rechte der User
    echo 'You are not logged in';}?>
                    </t>
                    <br>
                    <a href="logout.php" class="links">Logout</a>



                    <div class="postbutton">

                        <?php if (isset($_SESSION['user'])) {
    echo '<button type="button" onclick="showNew()" class ="buttons" >Neuer Post</button>';
}   
?>
                            <script>
                                function showNew() {
                                    $("#posten").slideToggle();
                                }
                            </script>


                            <?php

    $verbindung = new mysqli("localhost","root","","blog");
    mysqli_select_db($verbindung, "blog");
    
      
 	if(isset($_POST['submit'])) // hier werden die Einträge aus der Textdatei und gepostet
 	{
    	$title = $_POST['title'];
    	$subtitle = $_POST['subtitle'];
        $date = $_POST['date'];
        $category = $_POST['category'];
        $content = $_POST['content'];
        
  
        $eintrag = "INSERT INTO eintraege (Title, Subtitle, Content, Date, Category) VALUES ('$title', '$subtitle', '$content', '$date', '$category')";
        
        $eintragen = mysqli_query($verbindung, $eintrag);
	}          
?>
                    </div>

            </div>
            <div id="posten" hidden>
                <!-- wenn der Admin angemeldet ist kann er hier den Blogeintrag erstellen und Kategorie etc. eintragen -->
                <form action="home.php" method="POST">
                    <p>
                        <input type="text" name="title" class="tab" placeholder="TITLE" required>
                    </p>
                    <p>
                        <input type="text" name="subtitle" class="tab" placeholder="SUBTITLE">
                    </p>
                    <p>
                        <input type="date" name="date" class="tab" placeholder="DATE">
                    </p>
                    <p>
                        <textarea rows="4" cols="55" name="content" class="textarea" placeholder="CONTENT" required></textarea>
                    </p>
                    <p>
                        <label id="Category" class="Category"></label>
                        <select name="category" class="category">
                            <option title="--" value="keiner Kategorie zugeteilt"> BITTE KATEGORIE WÄHLEN </option>
                            <option title="Sport" value="Sport">SPORT</option>
                            <option title="Musik" value="Musik">MUSIK</option>
                            <option title="Freizeit" value="Freizeit">FREIZEIT</option>
                            <option title="Arbeit" value="Arbeit">ARBEIT</option>
                            <option title="Musik" value="Gamen">GAMEN</option>
                            <option title="Computer" value="Computer">COMPUTER</option>
                            <option title="Welt" value="WeltWelt">WELT</option>
                            <br>
                        </select>
                    </p>
                    <p>
                        <input type="submit" name="submit" value="Posten" class="buttons">
                    </p>
                </form>
            </div>
            <form action="statements.php">
                <p>
                    <label id="sort" class="sort">
                        <!-- Auswahlliste um nach Kategorie zu sortieren -->
                        <select name="category" class="category">
                            <option title="all" value="All">ALLE KATEGORIEN</option>
                            <option title="Sport" value="Sport">SPORT</option>
                            <option title="Musik" value="Musik">MUSIK</option>
                            <option title="Freizeit" value="Freizeit">FREIZEIT</option>
                            <option title="Arbeit" value="Arbeit">ARBEIT</option>
                            <option title="Musik" value="Gamen">GAMEN</option>
                            <option title="Computer" value="Computer">COMPUTER</option>
                            <option title="Welt" value="WeltWelt">WELT</option>
                        </select>
                    </label>
                    <br>
                    <br>
                    <input type="submit" value="Sortieren" class="buttonSort">
            </form>

            <?php
  
  include_once("connection.php");
  $sql = "SELECT * FROM eintraege ORDER BY Date DESC";
  
  $result = mysqli_query($dbConnect, $sql);
            

  while($zeile = mysqli_fetch_array($result)) //die eingetragenen Daten(Arrays) werden in die Textdatei 'blogs.txt' geschrieben und mit einem ',' getrennt
  {
    $title = $zeile["Title"];
    $subtitle = $zeile["Subtitle"];
    $date = $zeile["Date"];
    $category = $zeile["Category"];
    $content = $zeile["Content"];
  
?>

                <br>
                <div id="tweet">
                    <h2> <?php  echo $title  ?><small></small></h2>
                    <hr />
                    <p class="untertitel">
                        <?php echo $subtitle ?>
                    </p>
                    <p class="date">
                        <?php echo $date ?>
                    </p>
                    <p class="category">
                        <?php echo $category ?>
                    </p>
                    <p class="content">
                        <?php echo $content ?>
                    </p>
                    <form action="db_functions.php" method="post">
                        <t style="float: center">
                            <input type="submit" value="Beitrag loeschen" class="buttons">

                            <input type="button" onclick="window.location.href='edit.php'" value="Beitrag bearbeiten" class="buttons">
                        </t>
                    </form>



                </div>
                <?php          
  }
                ?>





        </div>
        <div id="footer">
            <br> &copy Jonas Teuscher - 2016 - Cédric Glaus
        </div>
    </body>

    </html>