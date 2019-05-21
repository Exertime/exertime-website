<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "Exercises";
            include("include/head.php");
            include("../db_conn.php");

            $query = "SELECT * FROM EXERCISES";
            $result = $mysqli->query($query);
        ?>
    </head>
    <body>
        <div class="wrapper">
            <?php include("include/header.php"); ?>
            <div class="main-content">
                <div class="page-title">
                    <h2>Exercises</h2>
                </div>
                <button class='btn-add' type='button' name='btn-add'>
                    <a class='btn-icon btn-icon-add' onclick='showModalAdd(this)'>New Exercise</a>
                </button>
                <div class="table_wrapper">
                    <table id="datatable" class="display compact hover">
                        <thead>
                            <tr>
                                <th>Caption</th>
                                <th>Type</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Kilojoules</th>
                                <th>Calc. Type</th>
                                <th>Commands</th>
                            </tr>
                        </thead>
                        <?php
                            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                if($row['status'] == 1) {
                                    $row['status'] = "Active";
                                }
                                else {
                                    $row['status'] = "Inactive";
                                }
                                echo "<tr>
                                    <td>" . $row['caption'] . "</td>
                                    <td>" . $row['type'] . "</td>
                                    <td>
                                        <img class'img-exercise' src='resources/img/exercises/" . $row['img thumbnail'] . "' alt='" . $row['img thumbnail'] . "'>
                                    </td>
                                    <td>" . $row['status'] . "</td>
                                    <td>" . $row['kj_coefficient'] . "</td>
                                    <td>" . $row['calculation type'] . "</td>
                                    <td>
                                        <button class='btn-edit' type='button' name='btn-edit'>
                                            <a class='btn-icon btn-icon-edit'>Edit</a>
                                        </button>
                                        <form action='resources/scripts/delete.php' method='post'>
                                        <input type='hidden' name='id' value=".$row['id'].">
                                            <button type='submit' class='btn-del' name='delete_EXE'><a class ='btn-icon btn-icon-del'>Delete</a></button>
                                            </form>
                                    </td>
                                </tr>";
                            }
                         ?>
                         <tfoot>
                            <tr>
                                <th>Caption</th>
                                <th>Type</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Kilojoules</th>
                                <th>Calc. Type</th>
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
                                <td>Caption</td>
                                <td>
                                    <input type="text" name="cpt"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td>
                                    <select name="type">
                                        <option value="Easy">Easy</option>
                                        <option value="Moderate">Moderate</option>
                                        <option value="Challenging">Challenging</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <select name="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Kilojoule Coefficient</td>
                                <td>
                                    <input type="number" step="0.000001" name="kjCo" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Calculation Type</td>
                                <td>
                                    <select name="calcType">
                                        <option value="Repetitions">Repetition</option>
                                        <option value="Duration">Duration</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="Submit" name="addExer" value="Update"/>
                                </td>
                            </tr>
                        </table>
                </form>
            </div>
        </div>
    </body>
</html>
