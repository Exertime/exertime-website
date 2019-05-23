<footer>
    <div class="footer-content">
        <p><img src="./resources/img/logo.jpg" alt="Exertime Logo">
             | Copyright 2012 by Scott Pederson and Dean Cooley</p>

        <ul>
            <li>
                <?php
                include("resources/scripts/session.php");
        
                if(isset($_SESSION['access'])){
                  echo  "<a href='resources/scripts/signout.php'>Logout</a>";
                }else{
                    
                    echo "<a href='signin_form.php'>Login</a>";
                }
                    ?></li>
            <li> | </li>
            <li><a href="#">Privacy Policy</a></li>
        </ul>
    </div>
</footer>
