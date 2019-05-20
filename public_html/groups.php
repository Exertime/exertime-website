<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "Groups";
            include("include/head.php");
            include("../db_conn.php");

            $query = "SELECT * FROM ORG_GROUP";
            $result = $mysqli->query($query);

            if($row['Emergency Exit'] == 1) {
                $row['Emergency Exit'] = "True";
            }
            else {
                $row['Emergency Exit'] = "False";
            }
        ?>
    </head>
    <body>
        <div class="wrapper">
            <?php include("include/header.php"); ?>
            <div class="main-content">
                <div class="page-title">
                    <h2>Groups</h2>
                </div>
                <button class='btn-add' type='button' name='btn-add'>
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
                            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
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
                                        <button class='btn-edit' type='button' name='btn-edit'>
                                            <a class='btn-icon btn-icon-edit' onclick='showModal(this)'>Edit</a>
                                        </button>
                                        <button class='btn-del' type='button' name='btn-del'>
                                            <a class='btn-icon btn-icon-del'>Delete</a>
                                        </button>
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
                <form method="post">
                        <table class="form">
                            <tr>
                                <td>Organisation</td>
                                <td>
                                    <select>
                                        <option value="" disabled selected>Select an Organisation</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Group Name</td>
                                <td>
                                    <input type="text"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Group Short Name</td>
                                <td>
                                    <input type="text"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Run Exertime every</td>
                                <td>
                                    <input type="number" step="1" name="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Completed by user every</td>
                                <td>
                                    <input type="number" step="1" name="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Default postpone interval</td>
                                <td>
                                    <input type="number" step="1" name="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Walking Exercise</td>
                                <td>
                                    <select>
                                        <option value="">None</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Walking Exercise Delay</td>
                                <td>
                                    <input type="number" step="1" name="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Walking Exercise Prompt</td>
                                <td>
                                    <textarea name="name"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Notification Dialog Prompt</td>
                                <td>
                                    <textarea name="name"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Emergency exit</td>
                                <td>
                                    <input type="checkbox" name="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="Submit" value="Update"/>
                                </td>
                            </tr>
                        </table>
                </form>
            </div>
        </div>
    </body>
</html>
