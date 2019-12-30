  <?php
    include 'includes/autoloader.inc.php';
    Control::registration();
    $string = 'Registration Page';
    require("html.php");
    
  ?>
  <div class="form">
  <h1>Registration</h1>
  <p id="error"></p>
  <form name="registration" action="" method="post">
  <div class ="input_row">
      <input type="text"  placeholder="Username" id="username" /> 
      <span id="usernameError"></span>
  </div>
  <div class ="input_row">
      <input type="text"  placeholder="Age" id="age" />
       <span id="ageError"></span> 
  </div>
  <div class ="input_row">
     <input type="password"  placeholder="Password" id="pass" />
     <span id="passError"></span>
  </div>
  <input type="button"  value="Register" id="register" />
  </form>
  </div>
  </body>
  </html>