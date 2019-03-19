<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ICT Forum</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/font.css">
  </head>
  <body>

    <div class="header-main">
      <nav class="main-navbar">
        <ul>
          <a href="index.php">
            <img src="img/logo_forum.png" alt="logo">
          </a>
          <li><a href="index.php">HOME</a></li>
          <li><a href="forum.php">FORUM</a></li>
          <li><a href="about.php">ABOUT</a></li>
          <form class="login-nav" action="includes/login.php" method="post">
              <input type="text" name="uID" placeholder="Username">
              <input type="password" name="pwd" placeholder="Password">
              <button type="submit" name="login-submit">LOGIN</button>
              <button type="submit" name="logout-submit">LOGOUT</button>
              <p>Haven't registered yet? <a href="signup.php">Click here.</a></p>
          </form>
        </ul>
      </nav>
    </div>
