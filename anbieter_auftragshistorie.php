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
    include_once "anbieter_lib.php";

    ?>

    <?php
    $AnbieterID = $_GET["AnbieterID"];
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
                        href="#"><?php echo getAnbieterName($conn, $AnbieterID) ?><span class="caret"></span></a>
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
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card border-primary mb-3" style="width: 22rem;">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="result-list" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#einkommen" role="tab" aria-controls="einkommen"
                                    aria-selected="true">Einkommen</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#bewertung" role="tab" aria-controls="bewertung"
                                    aria-selected="false">Bewertung</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                    <input type="hidden" name='AnbieterID' value='<?php echo $AnbieterID ?>'>
                        <div class="tab-content mt-3">
                            <div class="tab-pane active" id="einkommen" role="tabpanel">
                                <h4 class="card-title">Gesamtes Einkommen: </h4>
                                <p class="card-text"><?php echo calculateTotalIncome($conn, $AnbieterID)?> </p>
                            </div>
                            <div class="tab-pane" id="bewertung" role="tabpanel" aria-labelledby="bewertung-tab">
                                <h4 class="card-title">Durchschnitte Bewertung:</h4>
                                <p class="card-text"><?php echo calculateAverageScore($conn, $AnbieterID) ?> /10 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            $('#result-list a').on('click', function(e) {
                e.preventDefault()
                $(this).tab('show')
            })
            </script>
            <div class="col-md-10">
                <h3 style="text-align:center">Ihre Auftragshistorie</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="text-align: center">Checkin Datum</th>
                            <th style="text-align: center">Checkout Datum</th>
                            <th style="text-align: center">Vorname</th>
                            <th style="text-align: center">Nachname</th>
                            <th style="text-align: center">Anzahl der Reisenden</th>
                            <th style="text-align: center">Zimmerkategorie</th>
                            <th style="text-align: center">Betrag</th>
                            <th style="text-align: center">Bewertung</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo getAllAuftragData($conn, $AnbieterID) ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>


</html>
<?php mysqli_close($conn); ?>