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
                            echo "<li>Create new or update existing organisations</li>
                            <li>Create new or update existing groups for different organisations</li>
                            <li>Update details and settings for each user, group or organisation</li>
                            <li>Manage and add exercises for all users</li>
                            <li>Create and update registration keys for groups</li>
                            <li>Create new or update hints</li>";
                            break;
                        case 2:
                            echo "<li>Update existing organisations</li>
                            <li>Create new or update existing groups within your organisation</li>
                            <li>View and update details and settings for each user, group or organisation</li>";
                            break;
                        case 3:
                            echo "<li>Update existing groups</li>
                            <li>View and update details and settings for each user, group or organisation</li>";
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
