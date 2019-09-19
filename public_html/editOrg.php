<!DOCTYPE html>
<html>
    <head>
        <?php include("include/head.php");
            include("../db_conn.php"); ?>
    </head>
    <body>
        <?php include("include/header.php");

            $id = $_POST['id'];

            $query = "SELECT * FROM ORGANISATIONS WHERE id='$id'";
            $result = $mysqli->query($query);

            while($row = $result->fetch_array(MYSQLI_ASSOC))
            {
                echo "<div>
                <h2>Edit</h2>
                <form method='post' action='resources/scripts/edit.php'>
                        <table class='form'>
                            <tr>
                                <input type='hidden' name='id' value=".$row['id'].">
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>
                                    <input type='text' name='name' value='".$row['Name']."'>
                                </td>
                            </tr>
                            <tr>
                                <td>Short name</td>
                                <td>
                                    <input type='text' name='shortName' value=".$row['Short name'].">
                                </td>
                            </tr>
                            <tr>
                                <td>Countdown duration</td>
                                <td>
                                    <input type='number' step='0.01' name='cdnDur' value=".$row['Countdown Duration'].">
                                </td>
                            </tr>
                            <tr>
                                <td>Default exercise delay</td>
                                <td>
                                    <input type='number' step='0.01' name='walkDelay' value=".$row['Walking Ex Delay'].">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type='Submit' name='editOrg' value='Update'/>
                                </td>
                            </tr>
                        </table>
                </form>
            </div>";
            }

        include("include/footer.php"); ?>
    </body>
</html>
