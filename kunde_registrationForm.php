<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="kunde_registrationForm.css">
</head>

<body>

    <div class="row">
        <div class="col"></div>
    </div>
    <div class="container">
        <div class="col-6">
            <div id="ui">
                <h4>Registration Form</h4>
                <form class="form-group" action="insert_kunde.php" method="post">

                    <div class="form-container">
                        <label for="name">Vorname</label>
                        <input type="text" name="vorname" required class="form-control" id="name" placeholder="Vorname eingeben">
                    </div>
                    <div class="form-container">
                        <label for="name">Nachname</label>
                        <input type="text" name="nachname" required class="form-control" id="name" placeholder="Nachname eingeben">
                    </div>
                    <div class="form-container">
                        <label for="password">Passwort</label>
                        <input type="password" name="password" required class="form-control" id="password" placeholder="Passwort eingeben">
                    </div>
                    <div class="form-container">
                        <label for="email">E-Mail eingeben</label>
                        <input type="email" name="email" required class="form-control" id="email" placeholder="E-Mail eingeben">
                    </div>
                    <div class="form-container">
                        <input type="submit" value="Absenden" class="btn btn-primary btn-block mt-4">
                    </div>
                </form>
            </div>
        </div>
        <div class="col"></div>
    </div>
</body>

</html>