<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);

    // Connect to database
    include("../../../db_conn.php");

    // DELETE USER
    if (isset($_POST['delete_user'])) {
        // Get user id
        $id = $_POST['id'];

        // Query database
        $query = "DELETE FROM USERS 
            WHERE ID='$id'";
        $mysqli->query($query);

        // Return to previous page
        header('Location: ../../users.php');
    }

    // DELETE ORGANISATION
    if (isset($_POST['delete_ORG'])) {
        // Get organisation id
        $id = $_POST['id'];

        // Query database
        $query = "DELETE FROM ORGANISATIONS 
            WHERE id='$id'";
        $mysqli->query($query);

        // Return to previous page
        header('Location: ../../organisations.php');
    }

    // DELETE REGISTRATION
    if (isset($_POST['delete_REG'])) {
        // Get registration id
        $id = $_POST['id'];

        // Query database
        $query = "DELETE FROM REGISTRATION 
            WHERE Registration_Key='$id'";
        $mysqli->query($query);

        // Return to previous page
        header('Location: ../../registrations.php');
    }

    // DELETE GROUP
    if (isset($_POST['delete_GRP'])) {
        // Get group id
        $id = $_POST['id'];

        // Query database
        $query = "DELETE FROM ORG_GROUP 
            WHERE Group_Name='$id'";
        $mysqli->query($query);

        // Return to previous page
        header('Location: ../../groups.php');
    }

    //DELETE HINTS
    if (isset($_POST['delete_GLB'])) {
        // Get hint id
        $id = $_POST['id'];

        // Query database
        $query = "DELETE FROM HINTS 
            WHERE ID='$id'";
        $mysqli->query($query);

        // Return to previous page
        header('Location: ../../global.php');
    }

    // DELETE EXERCISE
    if (isset($_POST['delete_EXE'])) {
        // Get exercise id
        $id = $_POST['id'];

        // Query database
        $query = "DELETE FROM EXERCISES 
            WHERE ID='$id'";
        $mysqli->query($query);

        // Return to previous page
        header('Location: ../../exercises.php');
    }

    // Close database connection
    $mysqli->close();

?>
