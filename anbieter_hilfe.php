<!DOCTYPE html>
<html lang="de">


<head>
    <meta charset="UTF-8">
    <title>Hilfe</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontpage.css">
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
    $GebäudeID = getGebäudeIDHomepage($conn, $AnbieterID);
    ?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <!--img id="mylogo" src="untitled.png" width="200" class="center" alt="Logo des Buchungsplattforms"-->
                <a class="navbar-brand" href="#">FeelsLikeHome</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Währung auswählen<span class="caret "></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Europa – Euro</a></li>
                    </ul>
                </li>
                <li><a href="anbieter_hilfe.php?AnbieterID=<?php echo $AnbieterID ?>"><span class="glyphicon glyphicon-question-sign"></span>Hilfe</a></li>
                <li class="dropdown" style="width:auto"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span><?php echo getAnbieterName($conn, $AnbieterID) ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="anbieter_über_uns.php?AnbieterID=<?php echo $AnbieterID ?>&GebäudeID=<?php echo $GebäudeID?>"> Über uns & unsere
                                Angebote</a></li>
                        <li><a href="anbieter_auftragshistorie.php?AnbieterID=<?php echo $AnbieterID ?>">Auftragshistorie</a></li>
                    </ul>
                </li>
                <li><a href="kunde_logout.php"><span class="glyphicon glyphicon-log-in"></span> Ausloggen</a></li>
            </ul>
        </div>
    </nav>
    <main>
        <div class="container-fluid" style="text-align:center">

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h4>Falls Sie noch Fragen haben, Anregungen für Verbesserungen geben wollen oder Fehler entdeckt haben, sprechen Sie bitte an unseren Gründer und Gründerin.</h5>
                </div>
            </div>

            <div class="frontpage-row">
                <div class="frontpage-column"></div>
                <div class="frontpage-column">
                    <div class="frontpage-container" data-placement="bottom">
                        <a href="mailto:lyahk1993@gmail.com">
                            <img src="kostya.jpg" alt="Kanstantsin Liakh" width="200" height=auto>
                            <p>Kanstantsin Liakh</p>
                        </a>
                    </div>
                </div>
                <div class="frontpage-column">
                    <div class="frontpage-container" data-placement="bottom">
                        <a href="mailto:laukwaifande@gmail.com">
                            <img src="fan.png" alt="Lau Kwai Fan" width="270" height=auto>
                            <p>Lau Kwai Fan</p>
                        </a>
                    </div>
                </div>
                <div class="frontpage-column"></div>
            </div>
            <div class="row">
                <div>
                    <img src="image_anbieter/logo.png" style="width:150px;float: center;" alt="mylogo">
                    <p>FeelsLikeHome GmbH
                        <br>Email: <a href="mailto:info@feelslikehome.com">feelslikehome@gmail.com</a>
                        <br>Tel: +49 1527362859
                    </p>
                </div>
            </div>
        </div>
    </main>


</body>

</html>
<?php mysqli_close($conn); ?>