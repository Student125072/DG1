<?php include 'header.php' ?>

<?php

//call the config file
require_once ('includes/config.inc.php');

  $username = $password = $confirm_password = "";
  $username_err = $password_err = $confirm_password_err = "";

  //processing
  if($_SERVER["REQUEST_METHOD"] == "POST"){

    //validate username
    if(empty(trim($_POST['userID']))) {
      $username_err = "Please enter a username.";
    } else {

      $sql = "SELECT id from users WHERE username = ?";

      if($stmt = mysqli_prepare($conn, $sql)) {
          //variable binding against MySQL Injection
          mysqli_stmt_bind_param($stmt, "s", $param_username);

          //set paramaters
          $param_username = trim($_POST['userID']);

          //execute statement
          if(mysqli_stmt_execute($stmt)) {

            //store result
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1){
              $username_err = "Username is already taken.";
            } else {
              $username = trim($_POST['userID']);
            }

          } else {
            echo "Oops something went wrong. Please try again later.";
          }
        }

        //close statement
        mysqli_stmt_close($stmt);
      }

      //validate password
      if(empty(trim($_POST['pwd']))) {
        $password_err = "Please enter a password.";
      } elseif (strlen(trim($_POST['pwd'])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
      } else {
        $password = trim($_POST['pwd']);
      }

      //confirm password
      if(empty(trim($_POST['pwd-check']))) {
        $confirm_password_err = "Please confirm your password.";
      } else {
        $confirm_password = trim($_POST['pwd-check']);
        if(empty($password_err) && ($password != $confirm_password)) {
          $confirm_password_err = "Passwords did not match.";
        }
      }

      //check input errors
      if(empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        //prepare insert
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if($stmt = mysqli_prepare($conn, $sql)) {
          //prepare statements
          mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

          //set paramaters
          $param_username = $username;
          $param_password = password_hash($password, PASSWORD_DEFAULT); // create hashed password

          //execute prepared statements
          if(mysqli_stmt_execute($stmt)) {
            //redirect to home
            header('location: /index.php');
          } else {
            echo "Something went wrong. Please try again later.";
          }
        }

        //close statement
        mysqli_stmt_close($stmt);
      }

      //close connection
      mysqli_close($conn);
  }
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
