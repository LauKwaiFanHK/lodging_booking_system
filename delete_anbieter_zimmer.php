<?php
include_once 'connect_db.php';
include_once 'anbieter_lib.php';

    $AnbieterID = $_REQUEST['AnbieterID'];
    $GebäudeID = $_REQUEST['GebäudeID'];
    $ZimmerID = $_REQUEST['ZimmerID'];

    $sql = "DELETE FROM Zimmer WHERE ZimmerID = $ZimmerID";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . mysqli_error($conn);
      }

    header('Location: anbieter_über_uns.php?AnbieterID=' . $AnbieterID . '&GebäudeID=' . $GebäudeID);
    mysqli_close($conn);
?>