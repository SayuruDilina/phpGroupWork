<?php
include_once 'header.php';
?>
<div class="form">
<form action="includes/login.inc.php" method="post">

        <input type="text" id="fname" name="uid" placeholder="Email/Username">

       
        <input type="password" id="lname" name="pwd" placeholder="password">
        <button name="submit" type="submit">Login As Customer</button>
        <button name="submitStaff" type="submit">Login As Staff</button>

           
    </form>
    <p> New Here? <a href="signup.php">Register.</a></p>
    </div>
<?php
include_once 'footer.php';
?>
