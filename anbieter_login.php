<?php
require_once('anbieter_lib.php');
require_once('connect_db.php');
require_once('validate_anbieter.php');

if (count($_POST) > 0) {
    $anbietername = strip_tags(trim($_POST['anbietername']));
    $passwort = strip_tags(trim($_POST['password']));
    echo $anbietername;
    echo $passwort;
    if (checkUserExists($conn, $anbietername, $passwort)) {
        $sess = $_SERVER['HTTP_USER_AGENT'];
        $query = "update Unterkunftsanbieter set Auth = 1, Sess = '{$sess}' where Name = '{$anbietername}' and Passwort = '{$passwort}'";
        $result = mysqli_query($conn, $query);
        $AnbieterID = getAnbieterID_login($conn, $anbietername);
        $GebäudeID = getGebauedeID_login($conn, $anbietername);
        header('Location: http://172.16.32.201/~lauk/Buchungsplattform/anbieter_über_uns.php?AnbieterID=' . $AnbieterID . "&GebäudeID=" .$GebäudeID);
        exit();
    } else{
        echo "Invalid name/password";
        header('Location: http://172.16.32.201/~lauk/Buchungsplattform/unterkunftsanbieter_registrieren.php');
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
                <form action="anbieter_login.php" method="post" class="form-container">
                    <div class="form-group">
                        <label for="name">Name der Unterkunftsanbieter </label>
                        <input type="text" name="anbietername" class="form-control" id="name" placeholder="Name eingeben" required>
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
                        <a href="unterkunftsanbieter_registrieren.php" class="btn btn-success btn-block" role="button">registrieren</a>
                    </div>

                </form>
            </section>
        </section>
    </div>

</body>

</html>
<?php mysqli_close($conn); ?>