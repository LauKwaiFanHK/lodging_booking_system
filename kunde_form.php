<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Unterkunftsanbieter - Gebäude Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body translate="no">
    <?php
    include_once "connect_db.php";
    include_once "kunde_lib.php";

    ?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <!--img id="mylogo" src="untitled.png" width="200" class="center" alt="Logo des Buchungsplattforms"-->
                <<a class="navbar-brand" href="#">FeelsLikeHome</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Währung auswählen<span class="caret "></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Europa – Euro</a></li>
                        <li><a href="#">Hong Kong Dollars – HKD</a></li>
                        <li><a href="#">United Kingdom Pounds – GBP</a></li>
                        <li><a href="#">United States Dollars – USD</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span>Hilfe</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Tierpark Hotel <span class="caret"></span></a>
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
        <div class="col-md-4">
            <?php
            $KundeID = $_GET["KundeID"];
            ?>
            <form method="POST" action="update_kunde.php">
                <input type="hidden" name='KundeID' value='<?php echo $_GET["KundeID"] ?>'>
                <div class="form-group">
                    <label class="" for="inlineFormInputGroup">Vorname</label>
                    <input type="text" class="form-control" name="Vorname" value="<?php echo getKundeVorname($conn, $KundeID) ?>" />
                    <label class="" for="inlineFormInputGroup">Nachname</label>
                    <input type="text" class="form-control" name="Nachname" value="<?php echo getKundeNachname($conn, $KundeID) ?>" />
                    <label class="" for="inlineFormInputGroup">Passwort</label>
                    <input type="password" class="form-control" name="Passwort" value="<?php echo getKundePasswort($conn, $KundeID) ?>" />
                    <label class="" for="inlineFormInputGroup">E-Mail</label>
                    <input type="text" class="form-control" name="Email" value="<?php echo getKundeEmail($conn, $KundeID) ?>" />
                    <br>
                </div>
                <div class="text-right">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-secondary">speichern</button>
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