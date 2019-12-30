<?php
 include 'includes/autoloader.inc.php';
 Control::index();
 $string = 'Welcome Home';
 require("html.php");?>  
<div class="form">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<a href="settings.php" id="settings_page">Account Settings</a>
<a href="logout.php">Logout</a>
</div>
</body>
</html>