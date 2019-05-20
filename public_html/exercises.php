<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "Exercises";
            include("include/head.php");
            include("../db_conn.php");

            $query = "SELECT * FROM EXERCISES";
            $result = $mysqli->query($query);

            if($row['status'] == 1) {
                $row['status'] = "Active";
            }
            else {
                $row['status'] = "Inactive";
            }
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
                    <a class='btn-icon btn-icon-add'>New Exercise</a>
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
                                echo "<tr>
                                    <td>" . $row['caption'] . "</td>
                                    <td>" . $row['type'] . "</td>
                                    <td>
                                        <img class'img-exercise' src='resources/img/exercises/" . $row['img thumbnail'] . "' alt='" . $row['caption'] . "'>
                                    </td>
                                    <td>" . $row['status'] . "</td>
                                    <td>" . $row['kj_coefficient'] . "</td>
                                    <td>" . $row['calculation type'] . "</td>
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
                <form method="post">
                        <table class="form">
                            <tr>
                                <td>Caption</td>
                                <td>
                                    <input type="text"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td>
                                    <select>
                                        <option value="Easy">Easy</option>
                                        <option value="Moderate">Moderate</option>
                                        <option value="Challenging">Challenging</option>
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
                                <td>Kilojoule Coefficient</td>
                                <td>
                                    <input type="number" step="0.000001" name="" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Calculation Type</td>
                                <td>
                                    <select>
                                        <option value="rep">Repetition</option>
                                        <option value="dur">Duration</option>
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
