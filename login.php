<?php
 include 'includes/autoloader.inc.php';
 Control::login();
 //$obj = new Dbh();
 //$obj->connect();
 $string = 'Login Page';
 require("html.php"); 

?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<div class ="input_row">
    <input type="text" placeholder="Username" id="user" />
    <span id="userErr"></span>
</div>
<div class ="input_row">
    <input type="password"  placeholder="Password" id="password" />
    <span id="passErr"></span>
</div>
<input  type="button" value="Login" id="login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
</body>
</html>