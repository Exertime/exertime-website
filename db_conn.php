<?php
    // $mysqli = new mysqli('localhost', 'nhaig', '390023', 'nhaig');
    // $mysqli = new mysqli('localhost', 'cc44', '227665');
    $mysqli = new mysqli('localhost', 'root', 'kit301!CMS');
    
    if(mysqli_connect_errno())
    {
        echo("Connect failed");
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
?>
