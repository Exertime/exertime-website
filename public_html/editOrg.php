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
                <h2>Edit</h2>";
				if($_SESSION['access'] == 1) {
					echo "<form method='post' action='resources/scripts/edit.php'>";
				} else {
					echo "<form method='post' action='organisations.php'>";
				}
                        echo "<table class='form'>
                            <tr>
                                <input type='hidden' name='id' value=".$row['id'].">
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>";
									if($_SESSION['access'] == 1) {
										echo "<input type='text' name='name' value='".$row['Name']."'>";
									} else {
										echo "<input type='text' name='name' value='".$row['Name']."' disabled>";
									}
                                echo "</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>";
									if($_SESSION['access'] == 1) {
										echo "<input type='Submit' name='editOrg' value='Update'/>";
									} else {
										echo "<input type='Submit' name='editOrg' value='Update' hidden/>
										<form method='post' action='organisations.php'>
											<input type='Submit' name='back' value='Back' />
										</form>";
									}
                                echo "</td>
                            </tr>
                        </table>
                </form>
            </div>";
            }

        include("include/footer.php"); ?>
    </body>
</html>
