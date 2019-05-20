<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "Global";
            include("include/head.php");
            include("../db_conn.php");

            $query = "SELECT * FROM GLOBAL";
            $globalResult = $mysqli->query($query);
            $query = "SELECT caption FROM EXERCISES";
            $exercisesResult = $mysqli->query($query);
            $query = "SELECT * FROM HINTS";
            $hintsResult = $mysqli->query($query);
        ?>
    </head>
    <body>


        <div class="wrapper">
            <?php include("include/header.php"); ?>
            <div class="main-content">
                <div class="page-title">
                    <h2>Settings</h2>
                </div>
                <form method="post" action="resources/scripts/inserts.php">
                        <table class="form">
                            <?php
                                while($gRow = $globalResult->fetch_array(MYSQLI_ASSOC)) {
                             ?>
                            <tr>
                                <td>Countdown Duration</td>
                                <td><input type="number" name="cdnDur" value="<?php echo $gRow['Countdown Duration'] ?>"/></td>
                            </tr>
                            <tr>
                                <td>Helpful Hints Delay</td>
                                <td><input type="number" name="hintDelay" value="<?php echo $gRow['Hint Delay'] ?>"/></td>
                            </tr>
                            <tr>
                                <td>Delay Before Prompt</td>
                                <td><input type="number" name="delayPrmpt" value="<?php echo $gRow['Delay Before Prompt Exercise'] ?>"/></td>
                            </tr>
                            <tr>
                                <td>Auto Prompt Exercise</td>
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
                <button class='btn-add' type='button' name='btn-add'>
                    <a class='btn-icon btn-icon-add' onclick='showModalAdd(this)'>New Hint</a>
                </button>
                <div class="table_wrapper">
                    <table id="datatable" class="display compact hover">
                        <thead>
                            <tr>
                                <th>Department</th>
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
                                        <button class='btn-edit' type='button' name='btn-edit'>
                                            <a class='btn-icon btn-icon-edit'>Edit</a>
                                        </button>
                                        <form action='resources/scripts/delete.php' method='post'>
                                        <input type='hidden' name='id' value=".$row['id'].">
                                            <input type='submit' name='delete_GLB' class ='btn-icon btn-icon-del' value='Delete'>
                                            </form>
                                    </td>
                                </tr>";
                            }
                         ?>
                        <thead>
                            <tr>
                             <th>Department</th>
                                <th>Hint</th>
                                <th>Hint Order</th>
                                <th>Commands</th>
                            </tr>
                        </thead>
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
                                <td>Department</td>
                                <td>
                                    <select name="dept">
                                        <option value="None">None</option>
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
