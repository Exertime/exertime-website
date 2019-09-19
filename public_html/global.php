<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "Global";
            include("include/head.php");
            include("../db_conn.php");

                include("resources/scripts/session.php");

           if(isset($_SESSION['access'])){}else{
                $fromurl="index.php";
                if( $_SERVER['HTTP_REFERER'] == "" )
                {
                    header("Location:".$fromurl); exit;
                }
           }

            $query = "SELECT * FROM GLOBAL";
            $globalResult = $mysqli->query($query);
            $query = "SELECT `caption` FROM EXERCISES";
            $exercisesResult = $mysqli->query($query);
            $query = "SELECT * FROM HINTS";
            $hintsResult = $mysqli->query($query);
            $query = "SELECT `Group_Short_Name` FROM ORG_GROUP";
            $grpResult = $mysqli->query($query);
        ?>
    </head>
    <body>


        <div class="wrapper">
            <?php include("include/header.php"); ?>
            <div class="main-content">
                <?php
                    if ($_GET['gs'] == "update") {
                        echo "
                            <div class='confirmMsg'>
                                <h3>Settings Updated</h3>
                                <p>Your changes have now been saved</p>
                            </div>
                        ";
                    }
                 ?>
                <div class="page-title">
                    <h2>Settings</h2>
                </div>
                <form method="post" action="resources/scripts/inserts.php">
                        <table class="form">
                            <?php
                                while($gRow = $globalResult->fetch_array(MYSQLI_ASSOC)) {
                             ?>
                            <tr>
                                <td>Countdown duration</td>
                                <td><input type="number" name="cdnDur" value="<?php echo $gRow['Countdown Duration'] ?>"/></td>
                            </tr>
                            <tr>
                                <td>Helpful hints delay</td>
                                <td><input type="number" name="hintDelay" value="<?php echo $gRow['Hint Delay'] ?>"/></td>
                            </tr>
                            <tr>
                                <td>Default exercise delay</td>
                                <td><input type="number" name="delayPrmpt" value="<?php echo $gRow['Delay Before Prompt Exercise'] ?>"/></td>
                            </tr>
                            <tr>
                                <td>Default exercise</td>
                                <td>
                                    <select name="autoPrmpt">
                                    <?php
                                        while($eRow = $exercisesResult->fetch_array(MYSQLI_ASSOC)) {
                                            if ($eRow['caption'] == $gRow['Auto Prompt Exercise']) {
                                                echo "<option value='" . $eRow['caption'] . "' selected>" . $eRow['caption'] . "</option>";
                                            } else {
                                                echo "<option value='" . $eRow['caption'] . "'>" . $eRow['caption'] . "</option>";
                                            }
                                        }
                                     ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="Submit" name="saveSettings" value="Save Settings"/></td>
                            </tr>
                            <?php } ?>
                        </table>
                </form>
                <div class="page-title">
                    <h2>Helpful Hints</h2>
                </div>
                <button class='btn-add' type='button' name='btn-add' onclick='showModalAdd(this)'>
                    <a class='btn-icon btn-icon-add'>New Hint</a>
                </button>
                <div class="table_wrapper">
                    <table id="datatable" class="display compact hover">
                        <thead>
                            <tr>
                                <th>Group</th>
                                <th>Hint</th>
                                <th>Hint Order</th>
                                <th>Commands</th>
                            </tr>
                        </thead>
                        <?php
                            while($row = $hintsResult->fetch_array(MYSQLI_ASSOC)) {
                                echo "<tr>
                                    <td>" . $row['Department'] . "</td>
                                    <td>" . $row['hint'] . "</td>
                                    <td>" . $row['Hint Order'] . "</td>
                                    <td>
                                        <form action='editHint.php' method='post'>
                                            <input type='hidden' name='id' value=".$row['id'].">
                                            <button type='submit' class='btn-edit' name='edit_GLB'><a class ='btn-icon btn-icon-edit'>Edit</a></button>
                                        </form>
                                        <form action='resources/scripts/delete.php' method='post'>
                                        <input type='hidden' name='id' value=".$row['id'].">
                                            <button type='submit' class='btn-del' name='delete_GLB'><a class ='btn-icon btn-icon-del'>Delete</a></button>
                                            </form>
                                    </td>
                                </tr>";
                            }
                         ?>
                        <tfoot>
                            <tr>
                             <th>Group</th>
                                <th>Hint</th>
                                <th>Hint Order</th>
                                <th>Commands</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <?php include("include/footer.php"); ?>
        </div>
        <div id="modal" class="modal-bg">
            <div class="modal-content">
                <button id="btn-close" class="close" type="button" name="">X</button>
                <h2>Edit</h2>
                <form method="post" action="resources/scripts/inserts.php">
                        <table class="form">
                            <tr>
                                <td>Group</td>
                                <td>
                                    <select name="dept">
                                        <option value="None">None</option>
                                        <?php
                                            while($row = $grpResult->fetch_array(MYSQLI_ASSOC)) {
                                                echo "<option value='" . $row['Group_Short_Name'] . "'>" . $row['Group_Short_Name'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Hint</td>
                                <td>
                                    <input type="text" name="hint" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Hint Order</td>
                                <td>
                                    <input type="number" step="1" name="hintOdr" value="">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="Submit" name="addHint" value="Update"/>
                                </td>
                            </tr>
                        </table>
                </form>
            </div>
        </div>
    </body>
</html>
