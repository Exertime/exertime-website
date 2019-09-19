<!DOCTYPE html>
<html>
<head>
    <?php
      include("../db_conn.php");
      include("include/head.php");

      $id=$_POST['id'];

      $query="SELECT * FROM HINTS WHERE id='$id'";
      $result=$mysqli->query($query);
      $query = "SELECT `Group_Short_Name` FROM ORG_GROUP";
      $grpResult = $mysqli->query($query);
    ?>
</head>
<body>
<?php include("include/header.php"); ?>
<div>
    <div>
        <h2>Edit</h2>
        <form method="post" action="resources/scripts/edit.php">
            <?php
                while($row=$result->fetch_array(MYSQLI_ASSOC)) {
                echo "<table class='form'>
                    <input type='hidden' name='id' value=".$row['id'].">
                    <tr>
                        <td>Group</td>
                        <td>
                            <select name='dept'>
                                <option value='None' selected>None</option>";
                                
                                while($grpRow = $grpResult->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value='" . $grpRow['Group_Short_Name'] . "'";
                                    if($row['Department'] == $grpRow['Group_Short_Name']) { echo " selected"; }
                                    echo ">" . $grpRow['Group_Short_Name'] . "</option>";
                                }
                                
                            echo "</select>
                        </td>
                    </tr>
                    <tr>
                        <td>Hint</td>
                        <td>
                            <input type='text' name='hint' value='".$row['hint']."'>
                        </td>
                    </tr>
                    <tr>
                        <td>Hint Order</td>
                        <td>
                            <input type='number' step='1' name='hintOdr' value='".$row['Hint Order']."'>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type='Submit' name='editHint' value='Update'/>
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
