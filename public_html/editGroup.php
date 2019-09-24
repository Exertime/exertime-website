<!DOCTYPE html>
<html>
    <head>
        <?php include("include/head.php");
            include("../db_conn.php"); ?>
    </head>
    <body>
        <?php include("include/header.php");

            $id = $_POST['id'];

            $query = "SELECT * FROM ORG_GROUP WHERE id='$id'";
            $result = $mysqli->query($query);
            $query = "SELECT `Short name` FROM ORGANISATIONS";
            $orgResult = $mysqli->query($query);
            $query = "SELECT caption FROM EXERCISES";
            $exerResult = $mysqli->query($query);

            while($row = $result->fetch_array(MYSQLI_ASSOC))
            {
                echo "<div>
                <h2>Edit</h2>
                <form method='post' action='resources/scripts/edit.php'>
                        <table class='form'>
                            <input type='hidden' name='id' value=".$id.">
                            <tr>
                                <td>Group Name</td>
                                <td>
                                    <input type='text' name='grpName' value='".$row['Group_Name']."'>
                                </td>
                            </tr>
                            <tr>
                                <td>Organisation</td>
                                <td>
                                    <select name='org'>";
                                        
                                        while($orgRow = $orgResult->fetch_array(MYSQLI_ASSOC)) {
                                            echo "<option value='" . $orgRow['Short name'] . "'";
                                            if($row['Organisation'] == $orgRow['Short name']) {echo " selected";}
                                            echo ">" . $orgRow['Short name'] . "</option>";
                                        }

                                    echo "</select>
                                </td>
                            </tr>
                            <tr>
                                <td>Prompt every</td>
                                <td>
                                    <input type='number' step='1' name='runEvery' value=".$row['Run Exertime Every'].">
                                </td>
                            </tr>
                            <tr>
                                <td>Compulsory completion every</td>
                                <td>
                                    <input type='number' step='1' name='usrEvery' value=".$row['Must Be Completed Every'].">
                                </td>
                            </tr>
                            <tr>
                                <td>Emergency exit</td>
                                <td>
                                    <input type='checkbox' name='emergExt' value=''>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type='Submit' name='editGrp' value='Update'>
                                </td>
                            </tr>
                        </table>
                </form>
                </div>";
            }

        include("include/footer.php"); ?>
    </body>
</html>
