<?php
//include the file session.php
include("resources/scripts/session.php");
include("include/head.php");

//if the session for username has been set, automatically go to "signin_success.php"
if($session_user!="") {
	header('location: ./home.php');
}

//if there is any received error message 
if(isset($_GET['error']))
{
	$errormessage=$_GET['error'];
	//show error message using javascript alert
	echo "<script>alert('$errormessage');</script>";
}
?>
<html>
<head>
<title>Sign In</title>
</head>

<body>
	<!--heading-->
	<div class="wrapper">
            <?php include("include/header.php"); ?>
            <div class="main-content">
                <div class="page-title">
                    <h2>Login System</h2>
                </div>
    
   
	 <div class="table_wrapper">
         <form action="resources/scripts/signin_engine.php" method="post">
                  <table class="form display compact hover">
                      <thead><tr><th>Please login to the system</th></tr>
                      </thead>
    
    	<tr>
    		<td><font color="#FF0000">*</font>	Username:</td>
    		<td><input name="username" type="text" id="username" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
 		</tr>
 		<tr>
 	    	<td><font color="#FF0000">*</font>	Password:</td>
 	    	<td><input name="password" type="password" id="password" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
      	</tr>
      	<tr>
			<td></td>
            <td><button type="submit" name="submit">Submit</button>
                <button type="reset" name="reset">Reset</button></td>
      	</tr>
	</table>
                      </form>
	
                </div>
        </div>
    </div>
</body>
</html>
<?php
include("include/footer.php");
?>

