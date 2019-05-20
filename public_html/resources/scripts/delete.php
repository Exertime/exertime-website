<?php
    include("../../../db_conn.php");



    if (isset($_POST['delete_user'])) {
        $id = $_POST['id'];
       

        $query = "DELETE FROM USERS WHERE ID='$id'";
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../users.php');
    }
   if (isset($_POST['delete_ORG'])) {
        $id = $_POST['id'];
       

        $query = "DELETE FROM ORGANISATIONS WHERE Name='$id'";
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../organisations.php');
    }
   if (isset($_POST['delete_REG'])) {
        $id = $_POST['id'];
       

        $query = "DELETE FROM REGISTRATION WHERE Registration_Key='$id'";
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../registrations.php');
    }
   if (isset($_POST['delete_GRP'])) {
        $id = $_POST['id'];
       

        $query = "DELETE FROM ORG_GROUP WHERE Group_Name='$id'";
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../groups.php');
    }
   if (isset($_POST['delete_GLB'])) {
        $id = $_POST['id'];
       

        $query = "DELETE FROM HINTS WHERE ID='$id'";
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../global.php');
    }
 if (isset($_POST['delete_EXE'])) {
        $id = $_POST['id'];
       

        $query = "DELETE FROM EXERCISES WHERE ID='$id'";
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../exercises.php');
    }





 ?>
