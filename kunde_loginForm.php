<?php
require_once('kunde_lib.php');
require_once('connect_db.php');
require_once('validate_kunde.php');

if (count($_POST) > 0) {
    $kundename = strip_tags(trim($_POST['kundename']));
    $passwort = strip_tags(trim($_POST['password']));
    echo $kundename;
    echo $passwort;
    if (checkUserExists($conn, $kundename, $passwort)) {
        $sess = $_SERVER['HTTP_USER_AGENT'];
        $query = "update Kunde set Auth = 1, Sess = '{$sess}' where Vorname = '{$kundename}' and Passwort = '{$passwort}'";
        $result = mysqli_query($conn, $query);
        $KundeID = getKundeID_login($conn, $kundename);
        header('Location: http://172.16.32.201/~lauk/Buchungsplattform/kunde_suchseite.php?KundeID=' . $KundeID);
        exit();
    } else{
        echo "Invalid name/password";
        header('Location: http://172.16.32.201/~lauk/Buchungsplattform/kunde_registrationForm.php');
        exit();
        }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Einloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="kunde_loginForm.css">
</head>

<body>

    <div class="container">
        <section class="row justify-content-center">
            <section class="col-md-6">
                <form action="kunde_loginForm.php" method="post" class="form-container">

                    <div class="form-group">
                        <label for="kundename">Nachname</label>
                        <input type="text" name="kundename" class="form-control" id="kundename" placeholder="Vorname eingeben" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Passwort</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="Passwort eingeben" required>
                        <small id="password" class="form-text text-muted">We'll never share your Password with
                            anyone else.</small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">einloggen</button>
                    <center><a href="">Passwort vergessen?</a></center>

                    <h1></h1>
                    <div class="form">
                        <a href="kunde_registrationForm.php" class="btn btn-success btn-block" role="button">registrieren</a>
                    </div>

                </form>
            </section>
        </section>
    </div>

</body>

</html>
<?php mysqli_close($conn); ?>