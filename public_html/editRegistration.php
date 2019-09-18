<!DOCTYPE html>
<head>
  <head>
      <?php
          $title = "Registrations";
          include("include/head.php");
          include("../db_conn.php");

          $id=$_POST['id'];
          $query = "SELECT * FROM REGISTRATION WHERE id='$id'";
          $result = $mysqli->query($query);
      ?>
  </head>
</head>
<body>
  <?php include('include/header.php');?>
  <div>
<form method="post" action="resources/scripts/edit.php">
        <table class="form">
          <?php
          while($row = $result->fetch_array(MYSQLI_ASSOC))
          {
          echo "<input type='hidden' name='id' value=".$row['id'].">
          <tr>
              <td>Department</td>
              <td>
                  <select name='dept' disabled>
                      <option value=".$row['Department']." selected>".$row['Department']."</option>
                  </select>
              </td>
          </tr>
            <tr>
                <td>Registration Key</td>
                <td>
                    <input type='text' name='rgtKey' value='".$row['Registration_Key']."' disabled>
                </td>
            </tr>
            <tr>
                <td>Remaining</td>
                <td>
                    <input type='number' step='0.01' name='remain' value=".$row['Remaining'].">
                </td>
            </tr>
            <tr>
                <td>Used</td>
                <td>
                    <input type='number' name='used' value=".$row['Used']." disabled>
                </td>
            </tr>
            <tr>
                <td>Total</td>
                <td>
                    <input type='number' name='total' value=".$row['Total']." disabled>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type='Submit' name='editRegist' value='Update'>
                </td>
            </tr>
        </table>";
      }
      ?>
</form>
</div>
<?php include('include/footer.php');?>
</body>
</html>
