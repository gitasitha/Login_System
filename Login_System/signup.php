<?php
    include_once 'header.php';
?>

<form action="includes/signup.inc.php" method="post" >

   <div class="signup_form">
   <h2>Sign up to Shop</h2>
    <input type="text" id="fname" name="name" placeholder="Name">
    <input type="text" id="fname" name="email" placeholder="Email">
    <input type="text" id="fname" name="uid" placeholder="Username">
    <input type="password" id="lname" name="pwd" placeholder="Password">
    <input type="password" id="lname" name="pwdrepeat" placeholder="Repeat Password">
    <button name="submit" type="submit">sign up</button> 
  
    <?php 
            if(isset($_GET["error"])){
                if($_GET["error"]=="emptyinput"){
                    echo '<div class="error">Fill in the all fileds</div>';
                }elseif($_GET["error"]=="invalidUid"){
                    echo '<div class="error">Invalied user name</div>';
                }elseif($_GET["error"]=="invliedEmail"){
                    echo '<div class="error">Invalied Emaile</div>';
                }elseif($_GET["error"]=="pwdMatch"){
                    echo '<div class="error"> Password not matching</div>';
                }elseif($_GET["error"]=="usernametaken"){
                    echo '<div class="error">username or Email allready taken </div>';
                }elseif($_GET["error"]=="stmtfailed"){
                    echo '<div class="error">something went wrong</div>';
                }
            }
            
            ?>

    <p>Are you allready have an account? <a href="login.php">Log in</a></p>
   </div>
    
 

</form>

<?php
    include_once 'footer.php';
?>