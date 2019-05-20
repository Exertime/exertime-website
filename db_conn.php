<?php
    $mysqli = new mysqli('localhost', 'nhaig', '390023', 'nhaig');
    // $mysqli = new mysqli('localhost', 'cc44', '227665', 'cc44');

    if(mysqli_connect_errno())
    {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
?>
