<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);

    // Connect to database
    include("../../../db_conn.php");

    // EDIT ORGANISATION
    if(isset($_POST['editOrg'])){
        // Get form data
        $id = $_POST['id'];
        $name = $_POST['name'];

        // Query database
        $query = "UPDATE ORGANISATIONS 
            SET `Name`='$name'
            WHERE id='$id'";
        $mysqli->query($query);
        
        // Return to previous page
        header("Location: ../../organisations.php");
    }

    // EDIT GROUP
    if (isset($_POST['editGrp'])) {
        // Get form data
        $id = $_POST['id'];
        $org = $_POST['org'];
        $grpName = $_POST['grpName'];
        $runEvery = $_POST['runEvery'];
        $usrEvery = $_POST['usrEvery'];
        $postponeInt = $_POST['postponeInt'];
        if ($_POST['emergExt'] == "Yes") {$emergExt = 1;} else { $emergExt = 0; }

        // Query database
        $query = "UPDATE ORG_GROUP 
            SET `Organisation`='$org', `Group_Name`='$grpName', `Run Exertime Every`='$runEvery', `Must Be Completed Every`='$userEvery', `Default Postpone Interval`='$postponeInt', `Emergency Exit`='$emergExt' 
            WHERE `id`='$id'";
        $mysqli->query($query);

        // Return to previous page
        header('Location: ../../groups.php');
    }

    // EDIT USER
    if(isset($_POST['editUser'])){
        // Get form data
        $id = $_POST['id'];
        $department = $_POST['department'];
        $gname = $_POST['given_name'];
        $surname = $_POST['surname'];
        $pname = $_POST['prefered_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $exit = $_POST['exit'];
        if($exit == "yes"){ $exit = 1; } else{ $exit = 0; }
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $height = $_POST['height'];
        $title = $_POST['job title'];
        $goal = $_POST['goal'];
        $role = $_POST['role'];
        if($role == "dep"){ $role = 1; } else{ $role = 2; }

        // Query database
        $query = "UPDATE `USERS` 
            SET `username`='$username',`given name`='$gname',`surname`='$surname', `prefered name`='$pname',`email`='$email',`emergency exit`='$exit', `DOB`='$dob',`gender`='$gender',`job title`='$title',`calorie goal`='$goal',`management level`='$role',`org_group`='$department' 
            WHERE `id`='$id'";
        $mysqli->query($query);

        // Return to previous page
        header("Location: ../../users.php");
    }

    // EDIT EXERCISE
    if (isset($_POST['editExer'])) {
        // Get form data
        $id = $_POST['id'];
        $type = $_POST['type'];
        $cpt = $_POST['cpt'];
        if ($_POST['status'] == "Active") { $status = 1; } else { $status = 0; }
        $kjCo = $_POST['kjCo'];
        $calcType = $_POST['calcType'];

        // IMAGE UPLOAD
        // Get image data
        $img = $_FILES['thumbnail'];
        $imgName = $_FILES['thumbnail']['name'];
        $imgTmpName = $_FILES['thumbnail']['tmp_name'];
        $imgSize = $_FILES['thumbnail']['tmp_size'];
        $imgError = $_FILES['thumbnail']['tmp_error'];
        $imgType = $_FILES['thumbnail']['tmp_type'];

        // Set image name
        $imgExt = explode('.', $imgName);
        $imgActualExt = strtolower(end($imgExt));
        $imgNameNew = $cpt.".".$imgActualExt;

        // Error check and upload image
        $allowed = array('jpg', 'jpeg', 'png');
        if(in_array($imgActualExt, $allowed)) {
          if($imgError == 0) {
            if($imgSize < 1000000) {
              $imgDest = '../img/exercises/'.$imgNameNew;
              print_r($imgDest);
              move_uploaded_file($imgTmpName, $imgDest);
              echo("Uploaded!");
            } else {
              echo("Your image is too big!");
            }
          } else {
            echo("There was an error uploading your image!");
          }
        } else {
          echo("You can't upload images of this type!");
        }

        // VIDEO UPLOAD
        // Get video data
        $vid = $_FILES['video'];
        $vidName = $_FILES['video']['name'];
        $vidName = $_FILES['video']['name'];
        $vidTmpName = $_FILES['video']['tmp_name'];
        $vidSize = $_FILES['video']['tmp_size'];
        $vidError = $_FILES['video']['tmp_error'];
        $vidType = $_FILES['video']['tmp_type'];

        // Set video name 
        $vidExt = explode('.', $vidName);
        $vidActualExt = strtolower(end($vidExt));
        $vidNameNew = $cpt.".".$vidActualExt;

        // Error check and video image
        $allowed = array('mp4');
        if(in_array($vidActualExt, $allowed)) {
          if($vidError == 0) {
            if($vidSize < 1000000) {
              $vidDest = '../vid/exercises/'.$vidNameNew;
              print_r($vidDest);
              move_uploaded_file($imgTmpName, $vidDest);
              echo("Uploaded!");
            } else {
              echo("Your video is too big!");
            }
          } else {
            echo("There was an error uploading your video!");
          }
        } else {
          echo("You can't upload videos of this type!");
        }
      
        // Query database
        $query = "UPDATE EXERCISES 
            SET `type`='$type', `caption`='$cpt', `status`='$status', `kj_coefficient`='$kjCo', `calculation type`='$calcType', `img thumbnail`='$imgNameNew', `video file`='$vidNameNew'
            WHERE `id`='$id'";
        $mysqli->query($query);

        // Return to previous page
        header('Location: ../../exercises.php');
    }

    // EDIT REGISTRATION
    if (isset($_POST['editRegist'])) {
        // Get form data
        $id = $_POST['id'];
        $dept = $_POST['dept'];
        $remain = $_POST['remain'];

        // Query database
        $query = "UPDATE REGISTRATION 
            SET `Department`='$dept', `Remaining`='$remain' 
            WHERE id='$id'";
        $mysqli->query($query);

        // Return to previous page
        header('Location: ../../registrations.php');
    }

    // EDIT HINT
    if (isset($_POST['editHint'])) {
        // Get form data
        $id = $_POST['id'];
        $dept = $_POST['dept'];
        $hint = $_POST['hint'];

        // Query database
        $query = "UPDATE HINTS 
            SET `Department`='$dept', `hint`='$hint'
            WHERE `id`='$id'";
        $mysqli->query($query);

        // Return to previous page
        header('Location: ../../global.php');
    }

    // Close database connection
    $mysqli->close();
?>
