<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "Registrations";
            include("include/head.php");
            include("../db_conn.php");

            $query = "SELECT * FROM REGISTRATION";
            $result = $mysqli->query($query);
        ?>
    </head>
    <body>
        <div class="wrapper">
            <?php include("include/header.php"); ?>
            <div class="main-content">
                <div class="page-title">
                    <h2>Registrations</h2>
                </div>
                <button class='btn-add' type='button' name='btn-add'>
                    <a class='btn-icon btn-icon-add' onclick='showModalAdd(this)'>New Registration</a>
                </button>
                <div class="table_wrapper">
                    <table id="datatable" class="display compact hover">
                        <thead>
                            <tr>
                                <th>Registration Key</th>
                                <th>Department</th>
                                <th>Remaining</th>
                                <th>Used</th>
                                <th>Total</th>
                                <th>Commands</th>
                            </tr>
                        </thead>
                        <?php
                            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                echo "<tr>
                                    <td>" . $row['Registration_Key'] . "</td>
                                    <td>" . $row['Department'] . "</td>
                                    <td>" . $row['Remaining'] . "</td>
                                    <td>" . $row['Used'] . "</td>
                                    <td>" . ($row['Remaining']+$row['Used']) . "</td>
                                    <td>
                                        <button class='btn-edit' type='button' name='btn-edit'>
                                            <a class='btn-icon btn-icon-edit'>Edit</a>
                                        </button>
                                        <form action='resources/scripts/delete.php' method='post'>
                                        <input type='hidden' name='id' value=".$row['Registration_Key'].">
                                            <input type='submit' name='delete_REG' class ='btn-icon btn-icon-del' value='Delete'>
                                            </form>
                                    </td>
                                </tr>";
                            }
                         ?>
                        <tfoot>
                            <tr>
                                <th>Registration Key</th>
                                <th>Department</th>
                                <th>Remaining</th>
                                <th>Used</th>
                                <th>Total</th>
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
                                <td>Short Name</td>
                                <td>
                                    <input type="text" name="rgtKey" value="4a009b01-46ed-433a-90e9-f1c0eaf12bcb" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Department</td>
                                <td>
                                    <select name="dept">
                                        <option value="None">None</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Remaining</td>
                                <td>
                                    <input type="number" step="0.01" name="remain" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Used</td>
                                <td>
                                    <input type="number" name="used" value="0" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>
                                    <input type="number" name="total" value="0" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="Submit" name="addRegist" value="Update"/>
                                </td>
                            </tr>
                        </table>
                </form>
            </div>
        </div>
    </body>
</html>
