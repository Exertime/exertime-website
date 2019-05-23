<header>
    <title>
        <?php 
        include("resources/scripts/session.php");
        echo("Exertime | $title");?>
    </title>
    <nav>
        <?php 
        if(isset($_SESSION['access'])){
        ?><ul>
            <li><img src="./resources/img/head_logo.PNG" alt="Logo"></li>
            <li><a href="home.php" <?php if ($title == "Home") {echo " class=\"current\"";} ?>>Home</a></li>
            <li><a href="organisations.php"  <?php if ($title == "Organisations") {echo " class=\"current\"";} ?>>Organisations</a></li>
            <li><a href="groups.php"  <?php if ($title == "Groups") {echo " class=\"current\"";} ?>>Groups</a></li>
            <li><a href="users.php"  <?php if ($title == "Users") {echo " class=\"current\"";} ?>>Users</a></li>
            <li><a href="exercises.php"  <?php if ($title == "Exercises") {echo " class=\"current\"";} ?>>Exercises</a></li>
            <li><a href="registrations.php"  <?php if ($title == "Registrations") {echo " class=\"current\"";} ?>>Registrations</a></li>
            <li><a href="global.php"  <?php if ($title == "Global") {echo " class=\"current\"";} ?>>Global</a></li>
        </ul>
        <?php 
        }else{
            ?>
        <li><img src="./resources/img/head_logo.PNG" alt="Logo"></li>
        <?php
        }
?>
    </nav>
</header>
