<header>
    <title>
        <?php echo("Exertime | $title");?>
    </title>
    <nav>
        <ul>
            <?php
                include("resources/scripts/session.php");

                if ($_SESSION['access']) {

                    echo "<li><img src='./resources/img/head_logo.PNG' alt='Logo'></li>
                    <li><a href='home.php'";
					if ($title == 'Home') {echo " class=\'current\'";}
					echo ">Home</a></li>";

					if($_SESSION['access'] != 3){
                    echo "<li><a href='organisations.php'";
					if ($title == 'Organisations') {echo " class=\'current\'";}
					echo ">Organisations</a></li>";}

					echo "<li><a href='groups.php'";
					if ($title == 'Groups') {echo " class=\'current\'";}
					echo ">Groups</a></li>
                    <li><a href='users.php'";
					if ($title == 'Users') {echo ' class=\'current\'';}
					echo ">Users</a></li>";

					if($_SESSION['access'] == 1){
					echo "<li><a href='exercises.php'";
					if ($title == 'Exercises') {echo " class=\'current\'";}
					echo ">Exercises</a></li>
                    <li><a href='registrations.php'";
					if ($title == 'Registrations') {echo " class=\'current\'";}
					echo ">Registrations</a></li>
                    <li><a href='global.php'";
					if ($title == 'Hints') {echo ' class=\'current\'';}
					echo ">Hints</a></li>
                    <li><a href='categories.php'";
                    if ($title == 'Categories') {echo ' class=\'current\'';}
                    echo ">Categories</a></li>";}
				}
                  else {
                    echo "<li><img src='./resources/img/head_logo.PNG' alt='Logo'></li>";
                  }
             ?>
        </ul>
    </nav>
</header>
