<!DOCTYPE html>
<html lang="de">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


    <link rel="stylesheet" href="css/editCSS.css" type="text/css">
    <meta charset="utf-8">

    <title>Beitrag bearbeiten</title>
</head>

<body>
    <div id="banner">
    </div>
    <div id="edit-container">
        <div id="inhalt">
            <h3>Beitrag bearbeiten</h3>

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
                <input type="button" name="abbrechen" value="Abbrechen" class="buttons" onclick="window.location.href='home.php'">
                <br>
                <br>
                <input type="submit" name="submit" value="Speichern" class="buttons">

            </p>
            <p>

        </div>
    </div>
</body>

</html>