<?php
include_once "connect_db.php";
include_once "kunde_lib.php";
$KundeID = $_POST['KundeID'];

$target_dir = "image_reisende/";
$target_file = $target_dir . basename($_FILES["kunde_photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// get KundeID after sending registration form, use the KundeID here
echo '<br>';
echo 'KundeID: ' . $KundeID;
echo '<br>';
echo $_FILES['kunde_photo']['name'];
echo '<br>';
echo $_FILES["kunde_photo"]["size"];
echo '<br>';
echo $_FILES["kunde_photo"]["tmp_name"];
echo '<br>';
//create a new name for the photo which is already uploaded to a temporary file 
$target_dir = 'image_reisende/';
$target_file = $target_dir . basename($_FILES['kunde_photo']['name']);
echo $target_file;
echo '<br>';
$baseUrl = 'http://172.16.32.201/~lauk/Buchungsplattform/';
$fotoUrl = $baseUrl . $target_file;
echo $fotoUrl;
echo '<br>';

// Check if file is an image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["kunde_photo"]["tmp_name"]);
    if ($check !== false) {
        echo '<br>';
        echo "File is an image : " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Tut mir Leid! Die Datei ist kein Bild.');
        window.location = 'http://172.16.32.201/~lauk/Buchungsplattform/reisende_konto_verwalten.php?KundeID=$KundeID'";
        echo "</script>";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "<script type='text/javascript'>";
    echo "alert('Tut mir Leid! Die Datei existiert schon.');
    window.location = 'http://172.16.32.201/~lauk/Buchungsplattform/reisende_konto_verwalten.php?KundeID=$KundeID'";
    echo "</script>";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<script type='text/javascript'>";
    echo "alert('Tut mir Leid! Die Datei ist zu groß.');
    window.location = 'http://172.16.32.201/~lauk/Buchungsplattform/reisende_konto_verwalten.php?KundeID=$KundeID'";
    echo "</script>";
    $uploadOk = 0;
}

// Allow certain file formats

if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "<script type='text/javascript'>";
    echo "alert('Tut mir Leid! Nur JPG, JPEG, PNG & GIF Datei sind erlaubt.');
    window.location = 'http://172.16.32.201/~lauk/Buchungsplattform/reisende_konto_verwalten.php?KundeID=$KundeID'";
    echo "</script>";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "<script type='text/javascript'>";
    echo "alert('Tut mir Leid! Ihre Foto wurde nicht hochgeladen.');
    window.location = 'http://172.16.32.201/~lauk/Buchungsplattform/reisende_konto_verwalten.php?KundeID=$KundeID'";
    echo "</script>";
    // if everything is ok, try to upload file
} else {
    // move the uploaded photo to a target destination
    if (move_uploaded_file($_FILES['kunde_photo']['tmp_name'], $target_file)) {
        insertPhoto($conn, $target_file, $KundeID);
        echo "<script type='text/javascript'>";
        echo "alert('Das Foto wurde hochgeladen!');
        window.location = 'http://172.16.32.201/~lauk/Buchungsplattform/reisende_konto_verwalten.php?KundeID=$KundeID'";
        echo "</script>";
    } else {
        echo 'upload to DB failed';
    }
}

function alert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}