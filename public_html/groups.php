<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "Groups";
            include("include/head.php");
            include("./db_conn.php");

                include("resources/scripts/session.php");

           if(isset($_SESSION['access'])){}else{
                $fromurl="index.php";
                if( $_SERVER['HTTP_REFERER'] == "" )
                {
                    header("Location:".$fromurl); exit;
                }
           }

            $query = "SELECT * FROM ORG_GROUP";
            $grpResult = $mysqli->query($query);
            $query = "SELECT `Short name` FROM ORGANISATIONS";
            $orgResult = $mysqli->query($query);
            $query = "SELECT caption FROM EXERCISES";
            $exerResult = $mysqli->query($query);
        ?>
    </head>
    <body>
        <div class="wrapper">
            <?php include("include/header.php"); ?>
            <div class="main-content">
                <div class="page-title">
                    <h2>Groups</h2>
                </div>
                <button class='btn-add' type='button' name='btn-add' onclick='showModalAdd(this)'>
                    <a class='btn-icon btn-icon-add'>New Group</a>
                </button>
                <div class="table_wrapper">
                    <table id="datatable" class="display compact hover">
                        <thead>
                            <tr>
                                <th>Organisation</th>
                                <th>Group Name</th>
                                <th>Group Short Name</th>
                                <th>Run Exertime Every</th>
                                <th>Exertime Completion</th>
                                <th>Default Postpone Int</th>
                                <th>Walking Ex</th>
                                <th>Walking Ex Delay</th>
                                <th>Emergency Exit</th>
                                <th>Commands</th>
                            </tr>
                        </thead>
                        <?php
                            while($row = $grpResult->fetch_array(MYSQLI_ASSOC)) {
                                if($row['Emergency Exit'] == 1) {
                                    $row['Emergency Exit'] = "True";
                                }
                                else {
                                    $row['Emergency Exit'] = "False";
                                }
                                echo "<tr>
                                    <td>" . $row['Organisation'] . "</td>
                                    <td>" . $row['Group_Name'] . "</td>
                                    <td>" . $row['Group_Short_Name'] . "</td>
                                    <td>" . $row['Run Exertime Every'] . "</td>
                                    <td>" . $row['Must Be Completed Every'] . "</td>
                                    <td>" . $row['Default Postpone Interval'] . "</td>
                                    <td>" . $row['Walking Exercise'] . "</td>
                                    <td>" . $row['Walking Ex Delay'] . "</td>
                                    <td>" . $row['Emergency Exit'] . "</td>
                                    <td>
                                        <form action='editGroup.php' method='post'>
                                            <input type='hidden' name='id' value=".$row['id'].">
                                            <button type='submit' class='btn-edit' name='edit_GRP'><a class ='btn-icon btn-icon-edit'>Edit</a></button>
                                        </form>
                                        <form action='resources/scripts/delete.php' method='post'>
                                            <input type='hidden' name='id' value=".$row['Group_Name'].">
                                            <button type='submit' class='btn-del' name='delete_GRP'><a class ='btn-icon btn-icon-del'>Delete</a></button>
                                        </form>
                                    </td>
                                </tr>";
                            }
                         ?>
                        <tfoot>
                            <tr>
                                <th>Organisation</th>
                                <th>Group Name</th>
                                <th>Group Short Name</th>
                                <th>Run Exertime Every</th>
                                <th>Exertime Completion</th>
                                <th>Default Postpone Int</th>
                                <th>Walking Ex</th>
                                <th>Walking Ex Delay</th>
                                <th>Emergency Exit</th>
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
                                <td>Organisation</td>
                                <td>
                                    <select name"org">
                                        <option value="" disabled selected>Select an Organisation</option>
                                        <?php
                                            while($row = $orgResult->fetch_array(MYSQLI_ASSOC)) {
                                                echo "<option value='" . $row['Short name'] . "'>" . $row['Short name'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Group Name</td>
                                <td>
                                    <input type="text" name="grpName"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Group Short Name</td>
                                <td>
                                    <input type="text" name="grpShrtName"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Run Exertime every</td>
                                <td>
                                    <input type="number" step="1" name="runEvery" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Completed by user every</td>
                                <td>
                                    <input type="number" step="1" name="usrEvery" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Default postpone interval</td>
                                <td>
                                    <input type="number" step="1" name="postponeInt" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Walking Exercise</td>
                                <td>
                                    <select name="walkExer">
                                        <option value="">None</option>
                                        <?php
                                            while($row = $exerResult->fetch_array(MYSQLI_ASSOC)) {
                                                echo "<option value='" . $row['caption'] . "'>" . $row['caption'] . "</option>";
                                            }

                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Walking Exercise Delay</td>
                                <td>
                                    <input type="number" step="1" name="walkExerDelay" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Walking Exercise Prompt</td>
                                <td>
                                    <textarea name="walkExerPrmpt"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Notification Dialog Prompt</td>
                                <td>
                                    <textarea name="notifDiag"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Emergency exit</td>
                                <td>
                                    <input type="checkbox" name="emergExt" value="Yes">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="Submit" name="addGrp" value="Update"/>
                                </td>
                            </tr>
                        </table>
                </form>
            </div>
        </div>
    </body>
</html>
