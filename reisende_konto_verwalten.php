<!DOCTYPE html>
<html lang="de">


<head>
    <meta charset="UTF-8">
    <title>Reisende Seite - Konto verwalten</title>
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
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-1"></div>
            <div class="text-left">
                <div class="btn-group">
                    <button type="button" class="btn btn-light"><a href="kunde_suchseite.php?KundeID=<?php echo $KundeID ?>"><span class="glyphicon glyphicon-arrow-left"></span> Zurück zur Suchseite</a></button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h3 style="text-align:center">Ihre Profil</h3>
        <br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <img class="profile_pic" src="<?php echo getKundeFoto($conn, $KundeID) ?>" style="width:200px;height:180px">
                <form action="send_kunde_photo.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name='KundeID' value='<?php echo $KundeID ?>'>
                    <input type="file" name="kunde_photo">
                    <input type="submit" name="submit" value="hochladen">
                    <p><strong><i class="fa fa-camera upload-button"></i>Anmerkung:</strong> Nur .jpg, .jpeg, .gif, .png Format bis zum 5 MB sind erlaubt.</p>
                </form>
            </div>
            <div class="col-md-3">
                <form>
                    <input type="hidden" name='KundeID' value='<?php $KundeID ?>'>
                    <input type="hidden" name='KundeID' value='<?php $BuchungID ?>'>
                    <div class="row">
                        <label class="" for="inlineFormInputGroup">Vorname</label>
                        <input type="text" class="form-control" name="Vorname" value="<?php echo getKundeVorname($conn, $KundeID) ?>" />
                    </div>
                    <div class="row">
                        <label class="" for="inlineFormInputGroup">Nachname</label>
                        <input type="text" class="form-control" name="Nachname" value="<?php echo getKundeNachname($conn, $KundeID) ?>" />
                    </div>
                    <div class="row">
                        <label class="" for="inlineFormInputGroup">Passwort</label>
                        <input type="password" class="form-control" name="Passwor" value="<?php echo getKundePasswort($conn, $KundeID) ?>" />
                    </div>
                    <div class="row">
                        <label class="" for="inlineFormInputGroup">E-Mail</label>
                        <input type="text" class="form-control" name="Email" value="<?php echo getKundeEmail($conn, $KundeID) ?>" />
                    </div>
                    <br>
                    <div class="text-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary"><a href="kunde_form.php?KundeID=<?php echo $KundeID ?>">editieren</a></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

</body>

</html>
<?php mysqli_close($conn); ?>