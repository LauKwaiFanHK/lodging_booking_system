<html>

<head>
    <title>Buchungshistorie</title>
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
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Währung auswählen<span class="caret "></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Europa – Euro</a></li>
                    </ul>
                </li>
                <li><a href="kunde_hilfe.php?KundeID=<?php echo $KundeID ?>"><span class="glyphicon glyphicon-question-sign"></span>Hilfe</a></li>
                <li class="dropdown" style="width:auto"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span><?php echo getKundeVorname($conn, $KundeID) . " " . getKundeNachname($conn, $KundeID) ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="reisende_konto_verwalten.php?KundeID=<?php echo $KundeID ?>">Profil</a></li>
                        <li><a href="reisende_buchungshistorie.php?KundeID=<?php echo $KundeID ?>">Buchungshistorie</a></li>
                    </ul>
                </li>
                <li><a href="kunde_logout.php"><span class="glyphicon glyphicon-log-in"></span> Ausloggen</a></li>
            </ul>
        </div>
    </nav>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-1"></div>
            <div class="text-left">
                <div class="btn-group">
                    <button type="button" class="btn btn-light" onclick="history.back()"><span class="glyphicon glyphicon-arrow-left"></span> Zurück zur Suchseite</a></button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <h3 style="text-align:center">Ihre Buchungshistorie</h3>
    </div>
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
                <?php echo getAllBuchungData($conn, $KundeID) ?>
            </tbody>
        </table>
    </div>
    </div>
</body>


</html>
<?php mysqli_close($conn); ?>