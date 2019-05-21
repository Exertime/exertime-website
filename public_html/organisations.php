<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "Organisations";
            include("include/head.php");
            include("../db_conn.php");

            $query = "SELECT * FROM ORGANISATIONS";
            $result = $mysqli->query($query);
        ?>
    </head>
    <body>
        <div class="wrapper">
            <?php include("include/header.php"); ?>
            <div class="main-content">
                <div class="page-title">
                    <h2>Organisations</h2>
                </div>
                <button class='btn-add' type='button' name='btn-add'>
                    <a class='btn-icon btn-icon-add' onclick='showModalAdd(this)'>New Organisation</a>
                </button>
                <div class="table_wrapper">
                    <table id="datatable" class="display compact hover">
                        <thead>
                            <tr>
                                <th>Short Name</th>
                                <th>Name</th>
                                <th>Countdown Duration</th>
                                <th>Walking Ex Delay</th>
                                <th>Commands</th>
                            </tr>
                        </thead>
                        <?php
                            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                echo "<tr>
                                    <td>" . $row['Short name'] . "</td>
                                    <td>" . $row['Name'] . "</td>
                                    <td>" . $row['Countdown Duration'] . "</td>
                                    <td>" . $row['Walking Ex Delay'] . "</td>
                                    <td>
                                        <button class='btn-edit' type='button' name='btn-edit'>
                                            <a class='btn-icon btn-icon-edit'  onclick='showModalEdit(this)'>Edit</a>
                                        </button>
                                        <form action='resources/scripts/delete.php' method='post'>
                                            <input type='hidden' name='id' value=".$row['Name'].">
                                            <input type='submit' name='delete_ORG' class ='btn-icon btn-icon-del' value='Delete'>
                                        </form>
                                    </td>
                                </tr>";
                            }
                         ?>
                         <tfoot>
                            <tr>
                                <th>Short Name</th>
                                <th>Name</th>
                                <th>Countdown Duration</th>
                                <th>Walking Ex Delay</th>
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
                                    <input type="text" name="shortName"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>
                                    <input type="text" name="name"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Countdown Duration</td>
                                <td>
                                    <input type="number" step="0.01" name="cdnDur" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Walking Ex Delay</td>
                                <td>
                                    <input type="number" step="0.01" name="walkDelay" value="">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="Submit" name="addOrg" value="Update"/>
                                </td>
                            </tr>
                        </table>
                </form>
            </div>
        </div>
    </body>
</html>
