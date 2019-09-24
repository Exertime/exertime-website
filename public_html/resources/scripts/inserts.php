<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);

    // Connect to database
    include("../../../db_conn.php");

    // ADD ORGANISATION
    if (isset($_POST['addOrg'])) {
        // Get form data
        $shortName = $_POST['name'];
        $name = $_POST['name'];

        // Query database
        $query = "INSERT INTO ORGANISATIONS (`Short name`, `Name`)
            VALUES ('$shortName','$name')";
        $mysqli->query($query);

        // Return to previous page
        header('Location: ../../organisations.php');
    }

    // ADD GROUP
    if (isset($_POST['addGrp'])) {
        // Get form data
        $org = $_POST['org'];
        $grpName = $_POST['grpName'];
        $grpShrtName = $_POST['grpName'];
        $runEvery = $_POST['runEvery'];
        $usrEvery = $_POST['usrEvery'];
        $postponeInt = $_POST['postponeInt'];
       
        if ($_POST['emergExt'] == "Yes") {$emergExt = 1;} else {$emergExt = 0;}

        // Query database
        $query = "INSERT INTO ORG_GROUP (`Organisation`, `Group_Name`, `Group_Short_Name`, `Run Exertime Every`, `Must Be Completed Every`, `Default Postpone Interval`, `Emergency Exit`)
            VALUES ('$org','$grpName','$grpShrtName','$runEvery','$usrEvery','$postponeInt','$emergExt')";
        $mysqli->query($query);

        // Return to previous page
        header('Location: ../../groups.php');
    }

    // ADD EXERCISE
    if (isset($_POST['addExer'])) {
        // Get form data
        $cpt = $_POST['cpt'];
        $type = $_POST['type'];
        if ($_POST['status'] == "Active") {$status = 1;} else {$status = 0;}
        $kjCo = $_POST['kjCo'];
        $calcType = $_POST['calcType'];

        // Query database
        $query = "INSERT INTO EXERCISES (`type`, `caption`, `status`, `kj_coefficient`, `calculation type`)
            VALUES ('$type','$cpt','$status','$kjCo','$calcType')";
        $mysqli->query($query);

        // Return to previous page
        header('Location: ../../exercises.php');
    }

    // ADD REGISTRATION
    if (isset($_POST['addRegist'])) {
        // Get form data
        $rgtKey = generateKey();
        $dept = $_POST['dept'];
        $remain = $_POST['remain'];

        // Query database
        $query = "INSERT INTO REGISTRATION (`Registration_Key`, `Department`, `Remaining`)
            VALUES ('$rgtKey','$dept','$remain')";
        $mysqli->query($query);

        // Return to previous page
        header('Location: ../../registrations.php');
    }

    function generateKey() {
        // Random key generator
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $randomString = '';

        for ($i = 0; $i < 8; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        $randomString .= "-";
        for ($i = 0; $i < 4; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        $randomString .= "-";
        for ($i = 0; $i < 4; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        $randomString .= "-";
        for ($i = 0; $i < 4; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        $randomString .= "-";
        for ($i = 0; $i < 12; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    // ADD HINT
    if (isset($_POST['addHint'])) {
        // Get form data
        $dept = $_POST['dept'];
        $hint = $_POST['hint'];

        // Query database
        $query = "INSERT INTO HINTS (`Department`, `hint`)
            VALUES ('$dept','$hint')";
        $mysqli->query($query);

        // Return to previous page
        header('Location: ../../global.php');
    }

    // Close database connection
    $mysqli->close();
 ?>
