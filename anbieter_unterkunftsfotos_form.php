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
        <div class="col-md-7">
            <h3>Registrierungsformular</h3>
            <h4>Schritt 3: <b><i><u>Fotos Ihrer Unterkunft</b></i></u> hochladen</h2>
                <form action="send_unterkunft_photo.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name='AnbieterID' value='<?php echo $AnbieterID ?>'>
                    <label><b>Erste Foto</b></label>
                    <input type="file" name="unterkunft_photo">
                    <input type="submit" name="submit" value="hochladen">
                </form>
                <p><strong>Anmerkung:</strong> Nur .jpg, .jpeg, .gif, .png Format bis zum 5 MB sind erlaubt.</p>
                <div class="text-right">
                    <div class="btn-group">
                        <input type="button" class="btn btn-secondary" value="Zurück zum Homepage" onclick="location.href='frontpage.php'">
                    </div>
                </div>

    </main>
</body>

</html>
<?php mysqli_close($conn); ?>