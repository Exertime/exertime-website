<!DOCTYPE html>
<html>
<head>
    <?php
      include("../db_conn.php");
      include("include/head.php");

      $id=$_POST['id'];

      $query="SELECT * FROM CATEGORIES WHERE id='$id'";
      $result=$mysqli->query($query);
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
                        <td>Category</td>
                        <td>
                            <textarea name='hint'>".$row['category']."</textarea>
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
