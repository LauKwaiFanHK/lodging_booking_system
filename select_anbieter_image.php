<?php
include_once 'connect_db.php';

$result = mysqli_connect($host, $uname, $pwd) or die("Could not connect to database." . mysqli_error($conn));
mysqli_select_db($result, $db_name) or die("Could not select the databse." . mysqli_error($conn));
$image_query = mysqli_query($result, "select img_name,img_path from image_table");
while ($rows = mysqli_fetch_array($image_query)) {
    $Foto = $rows['Foto'];
}
return $Foto;
?>