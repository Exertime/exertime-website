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
        $id = $_POST['id'];

        $department = $_POST['department'];
        $gname = $_POST['given_name'];
        $surname = $_POST['surname'];
        $pname = $_POST['prefered_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $exit = $_POST['exit'];
        $status = $_POST['status'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $height = $_POST['height'];
        $title = $_POST['job title'];
        $goal = $_POST['goal'];
        $newUser = $_POST['new_user'];
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
                  `new user`='$newUser',`management level`='$role',`organisation`='$department' WHERE `id`='$id'";
        $mysqli->query($query);
        $mysqli->close();

        header("Location: ../../users.php");

    }

    if (isset($_POST['editExer'])) {
        $id = $_POST['id'];
        $type = $_POST['type'];
        $cpt = $_POST['cpt'];
        if ($_POST['status'] == "Active") {$status = 1;} else {$status = 0;}
        $kjCo = $_POST['kjCo'];
        $calcType = $_POST['calcType'];
        $img = $_POST['thumbnail'];
        $vid = $_POST['video'];
        
        // File Upload
        $target_dir = "resources/img/exercises";
        $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $query = "UPDATE EXERCISES SET `type`='$type', `caption`='$cpt', `status`='$status', `kj_coefficient`='$kjCo', `calculation type`='$calcType', `img thumbnail`='$img', `video file`='$vid'
                  WHERE `id`='$id'";
        
        echo($query);
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../exercises.php');
    }

    if (isset($_POST['editRegist'])) {
        $id = $_POST['id'];
        $dept = $_POST['dept'];
        $remain = $_POST['remain'];

        $query = "UPDATE REGISTRATION SET `Department`='$dept', `Remaining`='$remain' WHERE id='$id'";
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
        $id = $_POST['id'];
        $dept = $_POST['dept'];
        $hint = $_POST['hint'];
        $hintOdr = $_POST['hintOdr'];

        $query = "UPDATE HINTS SET `Department`='$dept', `hint`='$hint', `Hint Order`='$hintOdr' WHERE `id`='$id'";
        $mysqli->query($query);
        $mysqli->close();

        header('Location: ../../global.php');
    }
?>
