<!DOCTYPE html>
<html>
    <head>
        <?php

            $title = "Organisations";
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
           $org = $_SESSION['organisation'];
		       switch ($_SESSION['access'])
           {
              case 1:
                $query = "SELECT * FROM ORGANISATIONS";
                $result = $mysqli->query($query);
                break;
              case 2:
                $query = "SELECT * FROM ORGANISATIONS WHERE `Short name`='$org'";
                $result = $mysqli->query($query);
                break;
          }
        ?>
    </head>
    <body>
        <div class="wrapper">
            <?php include("include/header.php"); ?>
            <div class="main-content">
                <div class="page-title">
                    <h2>Organisations</h2>
                </div>
                <button class='btn-add' type='button' name='btn-add' onclick='showModalAdd(this)'>
                    <a class='btn-icon btn-icon-add'>New Organisation</a>
                </button>
                <div class="table_wrapper">
                    <table id="datatable" class="display compact hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Commands</th>
                            </tr>
                        </thead>
                        <?php
                            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                echo "<tr>
                                    <td>" . $row['Name'] . "</td>
                                    <td>
                                        <form action='editOrg.php' method='post'>
                                            <input type='hidden' name='id' value=".$row['id'].">
                                            <button type='submit' class='btn-edit' name='edit_ORG'><a class ='btn-icon btn-icon-edit'>Edit</a></button>
                                        </form>
                                        <form action='resources/scripts/delete.php' method='post'>
                                            <input type='hidden' name='id' value=".$row['id'].">
                                            <button type='submit' class='btn-del' name='delete_ORG'><a class ='btn-icon btn-icon-del'>Delete</a></button>
                                        </form>
                                    </td>
                                </tr>";
                            }
                         ?>
                         <tfoot>
                            <tr>
                                <th>Name</th>
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
                                <td>Name</td>
                                <td>
                                    <input type="text" name="name"/>
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
