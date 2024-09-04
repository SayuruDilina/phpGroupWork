<?php
include_once 'header.php';
?>
<div class="form">
<form action="includes/signup.inc.php" method="post">

        <input type="text" id="fname" name="name" placeholder="Name">
        <input type="text" id="fname" name="email" placeholder="Email">
        <input type="text" id="fname" name="uid" placeholder="Username">
       <input type="text" id="lname" name="pwd" placeholder="Password">
       <input type="text" id="lname" name="pwdrepeat" placeholder=" Repeat Password">
        <button name="submit" type="submit">Register</button>
           
    </form>
    <p>Alreday have an account? <a href="login.php">Log in.</a></p>
    </div>
<?php
include_once 'footer.php';
?>

