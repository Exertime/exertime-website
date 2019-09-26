<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "Home";
            include("include/head.php");

                include("resources/scripts/session.php");

           if(isset($_SESSION['access'])){}else{
                $fromurl="index.php";
                if( $_SERVER['HTTP_REFERER'] == "" )
                {
                    header("Location:".$fromurl); exit;
                }
           }
        ?>
    </head>
    <body>
        <div class="wrapper">
            <?php include("include/header.php"); ?>
            <div class="main-content">
                <div class="page-title">
                    <h2>Exertime Administration Portal</h2>
                </div>

                <div class="page-content">
                    <h3>From this portal you can configure various functions of the Exertime clients such as:</h3>
                    <ul>
                    <?php
                      switch($_SESSION['access']){
                        case 1:
                          echo "<li>Create new or edit existing organisations</li>
                          <li>Create new or edit existing groups</li>
                          <li>Edit calorie goals and Exertime runtime variables per user, group or organisation</li>
                          <li>View and edit Exertime settings per user or by group or organisation</li>
                          <li>Edit user settings</li>
                          <li>Manage which exercises department have access too or disable exercises for all departments.</li>
                          <li>Adjust coefficients per exercises</li>";
                          break;
                        case 2:
                          echo "<li>Edit existing organisations</li>
                          <li>Create new or edit existing groups</li>
                          <li>View and edit Exertime settings per user or by group or organisation</li>
                          <li>View user settings</li>";
                          break;
                        case 3:
                          echo "<li>Edit existing groups</li>
                          <li>View and edit Exertime settings per user or by group</li>
                          <li>View user settings</li>";
                          break;
						  }
                    ?>
                    </ul>
                </div>
            </div>
            <?php include("include/footer.php"); ?>
        </div>

    </body>
</html>
