<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "Exercises";
            include("include/head.php");
            include("../db_conn.php");

            $id=$_POST['id'];

            $query = "SELECT * FROM EXERCISES WHERE id='$id'";
            $result = $mysqli->query($query);

        ?>
    </head>
    <body>
        <?php include("include/header.php");  ?>
        <div class="wrapper">
            <div>
                <h2>Edit</h2>
                <?php
                while($row = $result->fetch_array(MYSQLI_ASSOC))
                {
                echo "<form method='post' action='resources/scripts/edit.php'>
                  <input type='hidden' name='id' value=".$row['id'].">
                        <table class='form'>
                            <tr>
                                <td>Caption</td>
                                <td>
                                    <input type='text' name='cpt' value='".$row['caption']."'/>
                                </td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td>
                                    <select name='type'>
                                        <option value='Easy'>Easy</option>
                                        <option value='Moderate'>Moderate</option>
                                        <option value='Challenging'>Challenging</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <select name='status'>
                                        <option value='Active'>Active</option>
                                        <option value='Inactive'>Inactive</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Kilojoule Coefficient</td>
                                <td>
                                    <input type='number' step='0.000001' name='kjCo' value=".$row['kj_coefficient'].">
                                </td>
                            </tr>
                            <tr>
                                <td>Calculation Type</td>
                                <td>
                                    <select name='calcType'>
                                        <option value='Repetitions'>Repetition</option>
                                        <option value='Duration'>Duration</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Thumbnail</td>
                                <td>
                                    <input type='file' name='thumbnail' accept='image/*' enctype='multipart/form-data'>
                                </td>
                            </tr>
                            <tr>
                                <td>Video</td>
                                <td>
                                    <input type='file' name='video' accept='video/*' enctype='multipart/form-data'>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type='Submit' name='editExer' value='Update'>
                                </td>
                            </tr>
                        </table>
                </form>";
                }
                ?>
            </div>
        </div>
            <?php include("include/footer.php"); ?>
    </body>
</html>
