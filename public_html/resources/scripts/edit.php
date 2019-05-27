<?php
    include("../../../db_conn.php");

    if(isset($_POST['editOrg'])){
        $id = $_POST['id'];
        $shortName = $_POST['shortName'];
        $name = $_POST['name'];
        $cdnDur = $_POST['cdnDur'];
        $walkDelay = $_POST['walkDelay'];

        $query = "UPDATE ORGANISATIONS SET `Short name`='$shortName', `Name`='$name', `Countdown Duration`='$cdnDur', `Walking Ex Delay`='$walkDelay' WHERE id='$id'";
        $mysqli->query($query);
        $mysqli->close();

        header("Location: ../../organisations.php");
    }

    if (isset($_POST['editGrp'])) {
        $id=$_POST['id'];
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

        $query = "UPDATE ORG_GROUP SET `Organisation`='$org', `Group_Name`='$grpName', `Group_Short_Name`='$grpShrtName', `Run Exertime Every`='$runEvery', `Must Be Completed Every`='$userEvery',
                  `Default Postpone Interval`='$postponeInt', `Walking Exercise`='$walkExer', `Walking Ex Delay`='$walkExerDelay', `Walking Exercise Prompt`='$walkExerPrmpt', `Notification Dialog Prompt`='$notifDiag',
                  `Emergency Exit`='$emergExt' WHERE `id`='$id'";
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../groups.php');
    }

    if(isset($_POST['editUser'])){
        $id = $_POTS['id'];
        $department = $_POST['department'];
        $gname = $_POST['given name'];
        $surname = $_POST['surname'];
        $pname = $_POST['prefered name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $exit = $_POST['exit'];
        $status = $_POST['status'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $height = $_POST['height'];
        $title = $_POST['job title'];
        $goal = $_POST['goal'];
        $newUser = $_POST['new user'];
        $role = $_POST['role'];

        if($exit == "yes"){
          $exit = 1;
        } else{
          $exit = 0;
        }

        if($status == "active"){
          $status = 1;
        } else {
          $status = 0;
        }

        if($newUser == "true"){
          $newUser = 1;
        }else{
          $newUser = 0;
        }

        if($role == "dep"){
          $role = 1;
        }else{
          $role = 2;
        }

        $query = "UPDATE `USERS` SET `username`='$username',`given name`='$gname',`surname`='$surname',
                  `prefered name`='$pname',`email`='$email',`emergency exit`='$exit',`status`='$status',
                  `DOB`='$dob',`gender`='$gender',`job title`='$title',`calorie goal`='$goal',
                  `new user`='$newUser',`management level`='$role',`organisation`='$department', WHERE `id`='$id'";
        $mysqli->query($query);
        $mysqli->close();

        header("Location: ../../users.php");

    }

    if (isset($_POST['editExer'])) {
        $cpt = $_POST['cpt'];
        $type = $_POST['type'];
        if ($_POST['status'] == "Active") {$status = 1;} else {$status = 0;}
        $kjCo = $_POST['kjCo'];
        $calcType = $_POST['calcType'];
        $img = $cpt.".png";
        $vid = $cpt.".mp4";

        $query = "INSERT INTO EXERCISES (`type`, `caption`, `status`, `kj_coefficient`, `calculation type`, `img thumbnail`, `video file`)
            VALUES ('$type','$cpt','$status','$kjCo','$calcType','$img', '$vid')";
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../exercises.php');
    }

    if (isset($_POST['editRegist'])) {
        $id = $_POST['id'];
        $dept = $_POST['dept'];
        $remain = $_POST['remain'];

        $query = "UPDATE REGISTRATION SET `Department`=$dept, `Remaining`=$remain WHERE id='$id'";
        echo $query;
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../registrations.php');
    }
//
//    function generateKey() {
//        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
//        $randomString = '';
//
//        for ($i = 0; $i < 8; $i++) {
//            $index = rand(0, strlen($characters) - 1);
//            $randomString .= $characters[$index];
//        }
//        $randomString .= "-";
//        for ($i = 0; $i < 4; $i++) {
//            $index = rand(0, strlen($characters) - 1);
//            $randomString .= $characters[$index];
//        }
//        $randomString .= "-";
//        for ($i = 0; $i < 4; $i++) {
//            $index = rand(0, strlen($characters) - 1);
//            $randomString .= $characters[$index];
//        }
//        $randomString .= "-";
//        for ($i = 0; $i < 4; $i++) {
//            $index = rand(0, strlen($characters) - 1);
//            $randomString .= $characters[$index];
//        }
//        $randomString .= "-";
//        for ($i = 0; $i < 12; $i++) {
//            $index = rand(0, strlen($characters) - 1);
//            $randomString .= $characters[$index];
//        }
//
//        return $randomString;
//    }
//
//
    if (isset($_POST['editHint'])) {
        $id=$_POST['id'];
        $dept = $_POST['dept'];
        $hint = $_POST['hint'];
        $hintOdr = $_POST['hintOdr'];

        $query = "UPDATE HINTS `Department`='$dept', `hint`='$hint', `Hint Order`='$hintOdr' WHERE `id`='$id'";
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../global.php');
    }
?>
