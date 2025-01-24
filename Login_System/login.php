<?php
    include_once 'header.php';
?>

<form action="includes/login.inc.php" method="post" >

   <div class="login_form">
   <h2>Login to Shop</h2>
   <input type="text" id="fname" name="uid" placeholder="Email / Username">
    <input type="password" id="lname" name="pwd" placeholder="Password">
    <button name="submit" type="submit">Log in</button> 

    <?php 
            if(isset($_GET["error"])){
                if($_GET["error"]=="emptyinput"){
                    echo '<div class="error">Fill in the all fileds</div>';
                }elseif($_GET["error"]=="invalidpassword"){
                    echo'<div class="error">Incorrect username or password</div>';
                }
            }
            
            ?>

    <p> Are you new? Create an account <a href="signup.php">sign up</a></p>
   </div>
   
</form>

<?php
    include_once 'footer.php';
?>