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
           $org = $_SESSION['organisation'];
           		   $group = $_SESSION['group'];

           		   switch ($_SESSION['access'])
           		   {
           			case 1:
           				$query = "SELECT * FROM ORG_GROUP";
           				$grpResult = $mysqli->query($query);
           				$query = "SELECT `Short name` FROM ORGANISATIONS";
           				$orgResult = $mysqli->query($query);
           				break;
           			case 2:
           				$query = "SELECT * FROM ORG_GROUP WHERE `Organisation` = '$org'";
           				$grpResult = $mysqli->query($query);
           				$query = "SELECT `Short name` FROM ORGANISATIONS";
           				$orgResult = $mysqli->query($query);
           				break;
           			case 3:
           				$query = "SELECT * FROM ORG_GROUP WHERE `Group_Short_Name` = '$group' AND `Organisation` = '$org'";
           				$grpResult = $mysqli->query($query);
           				$query = "SELECT `Short name` FROM ORGANISATIONS";
           				$orgResult = $mysqli->query($query);
           				break;
           			}
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
				<?php
                if($_SESSION['access'] == 3) {
					echo "<button class='btn-add' type='button' name='btn-add' onclick='showModalAdd(this)' hidden>
                    <a class='btn-icon btn-icon-add'>New Group</a>";
				} else {
					echo "<button class='btn-add' type='button' name='btn-add' onclick='showModalAdd(this)'>
                    <a class='btn-icon btn-icon-add'>New Group</a>";
				}
				?>
                </button>
                <div class="table_wrapper">
                    <table id="datatable" class="display compact hover">
                        <thead>
                            <tr>
                                <th>Group Name</th>
                                <th>Organisation</th>
                                <th>Commands</th>
                            </tr>
                        </thead>
                        <?php
                            while($row = $grpResult->fetch_array(MYSQLI_ASSOC)) {
                                echo "<tr>
                                    <td>" . $row['Group_Name'] . "</td>
                                    <td>" . $row['Organisation'] . "</td>
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
                                <th>Group Name</th>
                                <th>Organisation</th>
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
                                <td>Group Name</td>
                                <td>
                                    <input type="text" name="grpName"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Organisation</td>
                                <td>
                                    <select name="org">
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
                                <td>Prompt every</td>
                                <td>
                                    <input type="number" step="1" name="runEvery" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Compulsory completion every</td>
                                <td>
                                    <input type="number" step="1" name="usrEvery" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Postpone Interval</td>
                                <td>
                                    <input type="number" step="1" name="postponeInt" value="">
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
