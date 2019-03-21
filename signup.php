<?php include 'header.php' ?>

<?php

//call the config file
require_once('includes/config.inc.php');






 ?>

  <link rel="stylesheet" href="css/signup.css">
  <link rel="stylesheet" href="css/font.css">

    <main class="main-body">
      <div class="register-form">
        <h1>Registration</h1>
        <form align="center" action="includes/signup.inc.php" method="post">
          <input type="text" name="userID" placeholder="Username">
          <input type="password" name="pwd" placeholder="Password">
          <input type="password" name="pwd-check" placeholder="Confirm Password">
          <button type="submit" name="signup-submit">SIGNUP</button>
        </form>
      </div>
    </main>
