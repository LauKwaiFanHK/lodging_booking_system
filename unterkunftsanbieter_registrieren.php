<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Unterkunftsanbieter Seite - Über uns & unsere Angebote</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body translate="no">
    <?php
    include_once "connect_db.php";
    include_once "anbieter_lib.php";
    $AnbieterID = $_GET["AnbieterID"];
    ?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <!--img id="mylogo" src="untitled.png" width="200" class="center" alt="Logo des Buchungsplattforms"-->
                <<a class="navbar-brand" href="#">FeelsLikeHome</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Währung auswählen<span
                            class="caret "></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Europa – Euro</a></li>
                        <li><a href="#">Hong Kong Dollars – HKD</a></li>
                        <li><a href="#">United Kingdom Pounds – GBP</a></li>
                        <li><a href="#">United States Dollars – USD</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span>Hilfe</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Tierpark Hotel <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Über uns & unsere Angebote</a></li>
                        <li><a href="#">Auftragshistorie</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Ausloggen</a></li>
            </ul>
        </div>
    </nav>
    <main>
        <div class="col-md-7">
            <form method="post" action="insert_anbieter.php">
                <h3>Registrierungsformular</h3>
                <h4>Schritt 1: Hintergrundinformation zu Ihrer Unterkunft eingeben</h2>
                <div class="form-group">
                    <label for="unterkunftsanbietersname">Name der Unterkunftsanbieter</label>
                    <input type="text" class="form-control" name="Name" placeholder="Name der Unterkunftsanbieter">
                </div>
                <div class="form-group">
                    <label for="passwort">Passwort</label>
                    <input type="password" class="form-control" name="Passwort" placeholder="Passwort">
                </div>
                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" class="form-control" name="URL" placeholder="Website">
                </div>
                <div class="form-group">
                    <label>Unterkunftskategorie:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="checkbox[]" value="Hotel">
                        <label class="form-check-label" for="inlineCheckbox1">Hotel</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="checkbox[]" value="Ferienwohnung">
                        <label class="form-check-label" for="inlineCheckbox2">Ferienwohnung</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="checkbox[]" value="Motel">
                        <label class="form-check-label" for="inlineCheckbox3">Motel</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="checkbox[]" value="Hostel">
                        <label class="form-check-label" for="inlineCheckbox3">Hostel</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="checkbox[]" value="Bed & Breakfast">
                        <label class="form-check-label" for="inlineCheckbox3">Bed & Breakfast</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="checkbox[]" value="WG Zimmer">
                        <label class="form-check-label" for="inlineCheckbox3">WG Zimmer</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="checkbox[]" value="private Haus">
                        <label class="form-check-label" for="inlineCheckbox3">private Haus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="checkbox[]" value="private Wohnung">
                        <label class="form-check-label" for="inlineCheckbox3">private Wohnung</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="checkbox[]" value="Resort">
                        <label class="form-check-label" for="inlineCheckbox3">Resort</label>

                    </div>
                </div>
                <div class="text-left">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-secondary" name="submit">Absenden</button>
                    </div>
                    <div class="btn-group">
                        <input type="button" class="btn btn-secondary" value="Zurück!" onclick="history.back()">
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
<?php mysqli_close($conn); ?>