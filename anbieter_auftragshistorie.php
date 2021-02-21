<html>

<head>
    <title>Auftragshistorie</title>
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
    $GebäudeID = $_GET["GebäudeID"]; echo $GebäudeID;
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
                <li><a href="anbieter_hilfe.php?AnbieterID=<?php echo $AnbieterID ?>"><span class="glyphicon glyphicon-question-sign"></span>Hilfe</a></li>
                <li class="dropdown" style="width:auto"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-home"></span> <?php echo getAnbieterName($conn, $AnbieterID) ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="anbieter_über_uns.php?AnbieterID=<?php echo $AnbieterID ?>&GebäudeID=<?php echo $GebäudeID ?>">Über uns & unsere
                                Angebote</a></li>
                        <li><a href="anbieter_auftragshistorie.php?AnbieterID=<?php echo $AnbieterID ?>&GebäudeID=<?php echo $GebäudeID ?>">Auftragshistorie</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Ausloggen</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h3 style="text-align:center">Ihre Auftragshistorie</h3>
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card border-light mb-3" style="width: 28rem;">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="result-list" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#einkommen" role="tab" aria-controls="einkommen" aria-selected="true">Einkommen</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#bewertung" role="tab" aria-controls="bewertung" aria-selected="false">Bewertung</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name='AnbieterID' value='<?php echo $AnbieterID ?>'>
                        <div class="tab-content mt-3">
                            <div class="tab-pane active" id="einkommen" role="tabpanel">
                                <h4 class="card-title">&nbsp;<span class="glyphicon glyphicon-piggy-bank"></span> Gesamtes Einkommen: </h4>
                                <p class="card-text">&nbsp; <?php echo calculateTotalIncome($conn, $AnbieterID) ?> €</p>
                            </div>
                            <div class="tab-pane" id="bewertung" role="tabpanel" aria-labelledby="bewertung-tab">
                                <h4 class="card-title">&nbsp; <span class="glyphicon glyphicon-stats"></span> Durchschnitte Bewertung:</h4>
                                <p class="card-text">&nbsp; <?php echo calculateAverageScore($conn, $AnbieterID) ?> /10 </p>
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
            <div class="col-md-12">

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