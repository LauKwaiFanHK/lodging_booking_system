<html>

<head>
    <title>Reisende - Buchungshistorie</title>
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

    <?php
    $KundeID = $_GET["KundeID"];
    $BuchungID = $_GET["BuchungID"];
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
                <li class="dropdown" style="width:auto"><a class="dropdown-toggle" data-toggle="dropdown"
                        href="#"><?php echo getKundeVorname($conn, $KundeID) . "" . getKundeNachname($conn, $KundeID) ?><span
                            class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Profil</a></li>
                        <li><a href="#">Buchungshistorie</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Ausloggen</a></li>
            </ul>
        </div>
    </nav>
    <br>
    <h3 style="text-align:center">Ihre Buchungshistorie</h3>
    <br>
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>BuchungID</th>
                    <th>Reiseziel</th>
                    <th>Anzahl der Reisenden</th>
                    <th>Checkin Datum</th>
                    <th>Checkout Datum</th>
                    <th>Gebuchtes Unterkunftsanbieter</th>
                    <th>Gebuchtes Zimmer</th>
                    <th>Betrag</th>
                    <th>Bewertung</th>
                </tr>
            </thead>
            <tbody>
                <?php echo getAllBuchungData($conn) ?>
            </tbody>
        </table>
    </div>
</body>


</html>
<?php mysqli_close($conn); ?>