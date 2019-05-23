<!DOCTYPE html>
<?php
$fromurl="signin_form.php";  
if( $_SERVER['HTTP_REFERER'] == "" ) 
{ 
header("Location:".$fromurl); exit; 
}
?>
<html>
    <head>
        <?php
            $title = "Home";
            include("include/head.php");
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
                        <li>Create new or edit existing organisations</li>
                        <li>Create new or edit existing departments</li>
                        <li>Edit calorie goals and Exertime runtime variables per department</li>
                        <li>View user activity</li>
                        <li>Update Exertime user weights</li>
                        <li>Manage which exercises department have access too or disable exercises for all departments.</li>
                        <li>Adjust coefficients per exercises</li>
                        <li>Run Exertime reports</li>
                    </ul>
                </div>
            </div>
            <?php include("include/footer.php"); ?>
        </div>

    </body>
</html>
