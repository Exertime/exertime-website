<?php
    include("../../../db_conn.php");

    $shortName = $_POST['shortName'];
    $name = $_POST['name'];
    $cdnDur = $_POST['cdnDur'];
    $walkDelay = $_POST['walkDelay'];

    $query = "INSERT INTO ORGANISATIONS (`Short name`, `Name`, `Countdown Duration`, `Walking Ex Delay`) VALUES ('$shortName','$name','$cdnDur','$walkDelay')";
    $mysqli->query($query);
    $mysqli->close();

    header('Location: ../../organisations.php');
 ?>
