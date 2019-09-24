<!DOCTYPE html>
<html>
    <head>
        <?php include("include/head.php");
            include("../db_conn.php"); ?>
    </head>
    <body>
        <div class="wrapper">
            <?php include("include/header.php"); ?>
            <div class="main-content">

                <?php
                $id = $_POST['id'];

                $query = "SELECT * FROM USERS WHERE id='$id'";
                $result = $mysqli->query($query);
                $query = "SELECT `Group_Short_Name` FROM ORG_GROUP";
                $grpResult = $mysqli->query($query);

                while($row = $result->fetch_array(MYSQLI_ASSOC))
                {
                    echo "<div>
                        <h2>Edit</h2>
                        <form method='post' action='resources/scripts/edit.php'>
                        <input type='hidden' name='id' value='".$id."'>
                                <table class='form'>
                                    <tr>
                                        <td>Given Names</td>
                                        <td>
                                            <input type='text' name='given name' value='".$row['given name']."'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Surname</td>
                                        <td>
                                            <input type='text' name='surname' value='".$row['surname']."'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Prefered name</td>
                                        <td>
                                            <input type='text' name='prefered name' value='".$row['prefered name']."'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>
                                            <input type='text' name='username' value='".$row['username']."'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            <input type='email' name='email' value='".$row['email']."'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Group</td>
                                        <td>
                                            <select name='department'>
                                                <option value='None'>None</option>";

                                                while($grpRow = $grpResult->fetch_array(MYSQLI_ASSOC)) {
                                                    echo "<option value='" . $grpRow['Group_Short_Name'] . "'";
                                                    if($row['org_group'] == $grpRow['Group_Short_Name']) {echo " selected";}
                                                    echo ">" . $grpRow['Group_Short_Name'] . "</option>";
                                                }

                                            echo "</select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Job Title</td>
                                        <td>
                                            <input type='text' name='job title' value='".$row['job title']."'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>
                                            <input type='text' name='gender' value='".$row['gender']."'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DOB</td>
                                        <td>
                                            <input type='date' name='dob' value=".$row['DOB'].">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Height</td>
                                        <td>
                                            <input type='number' step='0.01' name='height' value=''>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Calorie Goal</td>
                                        <td>
                                            <input type='number' step='1' name='goal' value='".$row['calorie goal']."'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Emergency Exit</td>
                                        <td>
                                            <select name='exit'>
                                                <option value='department'>Department</option>
                                                <option value='yes'>Yes</option>
                                                <option value='no'>No</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>User Role</td>
                                        <td>
                                        <select name='role'>";
                                        switch ($_SESSION['access'])
                                        {
                                          case 1:
                                            echo "<option value='4'>Standard User</option>
                                            <option value='3'>Group Manager</option>
                                            <option value='2'>Manager</option>
                                            <option value='1'>Super User</option>";
                                            break;
                                          case 2:
                                            echo "<option value='4'>Standard User</option>
                                            <option value='3'>Group Manager</option>
                                            <option value='2'>Manager</option>";
                                            break;
                                          case 3:
                                            echo "<option value='4'>Standard User</option>
                                            <option value='3'>Group Manager</option>";
                                            break;
                                        }

                                        echo "</select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type='Submit' name='editUser' value='Update'>
                                        </td>
                                    </tr>
                                </table>
                        </form>
                    </div>";
                }
                echo "</div>"; ?>
                <?php include("include/footer.php"); ?>
            </div>

    </body>
</html>
