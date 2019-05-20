<?php
    include("../../../db_conn.php");


    if (isset($_POST['addOrg'])) {
        $shortName = $_POST['shortName'];
        $name = $_POST['name'];
        $cdnDur = $_POST['cdnDur'];
        $walkDelay = $_POST['walkDelay'];

        $query = "INSERT INTO ORGANISATIONS (`Short name`, `Name`, `Countdown Duration`, `Walking Ex Delay`)
            VALUES ('$shortName','$name','$cdnDur','$walkDelay')";
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../organisations.php');
    }

    if (isset($_POST['addGrp'])) {
        $org = $_POST['org'];
        $grpName = $_POST['grpName'];
        $grpShrtName = $_POST['grpShrtName'];
        $runEvery = $_POST['runEvery'];
        $usrEvery = $_POST['usrEvery'];
        $postponeInt = $_POST['postponeInt'];
        $walkExer = $_POST['walkExer'];
        $walkExerDelay = $_POST['walkExerDelay'];
        $walkExerPrmpt = $_POST['walkExerPrmpt'];
        $notifDiag = $_POST['notifDiag'];
        if ($_POST['emergExt'] == "Yes") {$emergExt = 1;} else {$emergExt = 0;}

        $query = "INSERT INTO ORG_GROUP (`Organisation`, `Group_Name`, `Group_Short_Name`, `Run Exertime Every`, `Must Be Completed Every`, `Default Postpone Interval`, `Walking Exercise`, `Walking Ex Delay`, `Walking Exercise Prompt`, `Notification Dialog Prompt`, `Emergency Exit`)
            VALUES ('$org','$grpName','$grpShrtName','$runEvery','$usrEvery','$postponeInt','$walkExer','$walkExerDelay','$walkExerPrmpt','$notifDiag','$emergExt')";
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../groups.php');
    }

    if (isset($_POST['addExer'])) {
        $cpt = $_POST['cpt'];
        $type = $_POST['type'];
        if ($_POST['status'] == "Active") {$status = 1;} else {$status = 0;}
        $kjCo = $_POST['kjCo'];
        $calcType = $_POST['calcType'];

        $query = "INSERT INTO EXERCISES (`type`, `caption`, `status`, `kj_coefficient`, `calculation type`)
            VALUES ('$type','$cpt','$status','$kjCo','$calcType')";
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../exercises.php');
    }

    if (isset($_POST['addRegist'])) {
        // $rgtKey = $_POST['rgtKey'];
        $rgtKey = generateKey();
        $dept = $_POST['dept'];
        $remain = $_POST['remain'];

        $query = "INSERT INTO REGISTRATION (`Registration_Key`, `Department`, `Remaining`)
            VALUES ('$rgtKey','$dept','$remain')";
        echo $query;
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../registrations.php');
    }

    function generateKey() {
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

    if (isset($_POST['saveSettings'])) {
        $cdnDur = $_POST['cdnDur'];
        $hintDelay = $_POST['hintDelay'];
        $delayPrmpt = $_POST['delayPrmpt'];
        $autoPrmpt = $_POST['autoPrmpt'];

        $query = "UPDATE GLOBAL SET `Countdown Duration`='$cdnDur',`Hint Delay`='$hintDelay',`Delay Before Prompt Exercise`='$delayPrmpt',`Auto Prompt Exercise`='$autoPrmpt' WHERE 1";
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../global.php');
    }

    if (isset($_POST['addHint'])) {
        $dept = $_POST['dept'];
        $hint = $_POST['hint'];
        $hintOdr = $_POST['hintOdr'];

        $query = "INSERT INTO HINTS (`Department`, `hint`, `Hint Order`)
            VALUES ('$dept','$hint','$hintOdr')";
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../global.php');
    }


 ?>
