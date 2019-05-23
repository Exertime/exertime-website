<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "Users";
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

            $query = "SELECT * FROM USERS";
            $result = $mysqli->query($query);
        ?>
        <title>Exertime | Users</title>
    </head>
    <body>
        <div class="wrapper">
            <?php include("include/header.php"); ?>
            <div class="main-content">
                <div class="page-title">
                    <h2>Users</h2>
                </div>
                <div class="table_wrapper">
                    <table id="datatable" class="display compact hover">
                        <thead>
                            <tr>
                                <th>Group</th>
                                <th>Prefered Name</th>
                                <th>Given Names</th>
                                <th>Surname</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Emergency Exit</th>
                                <th>Status</th>
                                <th>Calory Goal(Override)</th>
                                <th>New User</th>
                                <th>Commands</th>
                            </tr>
                        </thead>
                        <?php
                            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                if($row['emergency exit'] == 1) {
                                    $row['emergency exit'] = "True";
                                }
                                else {
                                    $row['emergency exit'] = "False";
                                }

                                if($row['status'] == 1) {
                                    $row['status'] = "Active";
                                }
                                else {
                                    $row['status'] = "Inactive";
                                }

                                if($row['new user'] == 1) {
                                    $row['new user'] = "True";
                                }
                                else {
                                    $row['new user'] = "False";
                                }
                                echo "<tr id='" . $row['id'] . "'>
                                    <td>" . $row['org_group'] . "</td>
                                    <td>" . $row['preferred name'] . "</td>
                                    <td>" . $row['given name'] . "</td>
                                    <td>" . $row['surname'] . "</td>
                                    <td>" . $row['username'] . "</td>
                                    <td>" . $row['email'] . "</td>
                                    <td>" . $row['emergency exit'] . "</td>
                                    <td>" . $row['status'] . "</td>
                                    <td>" . $row['calorie goal'] . "</td>
                                    <td>" . $row['new user'] . "</td>
                                    <td>
                                        <button class='btn-edit' type='button' name='btn-edit'>
                                            <a class='btn-icon btn-icon-edit'>Edit</a>
                                        </button>
                                        <form action='resources/scripts/delete.php' method='post'>
                                        <input type='hidden' name='id' value=".$row['id'].">
                                            <button type='submit' class='btn-del' name='delete_user'><a class ='btn-icon btn-icon-del'>Delete</a></button>
                                            </form>

                                    </td>
                                </tr>";
                            }
                         ?>
                        <tfoot>
                            <tr>
                                <th>Group</th>
                                <th>Prefered Name</th>
                                <th>Given Names</th>
                                <th>Surname</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Emergency Exit</th>
                                <th>Status</th>
                                <th>Calory Goal(Override)</th>
                                <th>New User</th>
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
                                <td>Department</td>
                                <td>
                                    <select>
                                        <option value="None">None</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Given Names</td>
                                <td>
                                    <input type="text" name="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Surname</td>
                                <td>
                                    <input type="text" name="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Prefered name</td>
                                <td>
                                    <input type="text" name="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>
                                    <input type="text" name="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <input type="email" name="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Emergency Exit</td>
                                <td>
                                    <select>
                                        <option value="department">Department</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <select>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>DOB</td>
                                <td>
                                    <input type="date" name="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>
                                    <input type="text" name="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Height</td>
                                <td>
                                    <input type="number" step="0.01" name="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Job Title</td>
                                <td>
                                    <input type="text" name="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Calorie Goal</td>
                                <td>
                                    <input type="number" step="1" name="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>New User</td>
                                <td>
                                    <input type="checkbox" name="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>User Role</td>
                                <td>
                                    <select>
                                        <option value="std">Standard User</option>
                                        <option value="dep">Department Manager</option>
                                    </select>
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
