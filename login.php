<?php
include("dbc.php");
session_start();
if (isset($_COOKIE["UserID"]) && isset($_COOKIE["UKey"])) {
  $UserID = $_COOKIE["UserID"];
  $UKey = $_COOKIE["UKey"];
  $q = mysqli_query($dbc, "SELECT `UKey` FROM `users` WHERE `ID` = $UserID");
  $q = mysqli_fetch_assoc($q);
  if ($q){
    if ($q["UKey"] === $UKey) {
      header('Location: /');
    } else {
      echo ("<p style='text-align: center; color: red'>Session has expired, please login again.<p>");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tesco Portal Login - Shift Swap</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login To the Tesco portal on Shift Swap">
    <meta name="keywords" content="Shift, Swap, Tesco, Portal, Colleague ">
    <meta name="author" content="H.M. Media">
    <link rel="stylesheet" href="Assets/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/CSS/fontawesome-all.min.css">
    <link rel="stylesheet" href="Assets/CSS/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:900|Roboto">
    <!--if lt IE 9
    script(src='https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js')
    
    -->
  </head>
  <body>
    <div id="loginForm"><img class="logo" src="Assets/Images/Logo.jpg" alt="Shift Swap Logo">
      <div class="row">
        <div class="form col-lg-6 offset-lg-3 col-md-8 offset-md-2">
          <h1>Tesco Shift Swap Portal</h1>
          <div class="row">
            <div class="col-10 offset-1 col-md-8 offset-md-2 StoreID">
              <h6>Store ID</h6>
              <input id="StoreID" name="StoreID" type="text">
              <p class="error"></p>
            </div>
            <div class="col-10 offset-1 col-md-8 offset-md-2 UserID">
              <h6>User ID</h6>
              <input id="UserID" name="UserID" type="text">
              <p class="error"></p>
            </div>
            <div class="col-10 offset-1 col-md-8 offset-md-2 Password">
              <h6>Password</h6>
              <input id="Password" name="Password" type="password">
              <p class="error"></p>
              <div class="showPW">
                <input id="showPW" type="checkbox" value="Show">
                <p>Show Password</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <button id="Signup">Sign Up</button>
            </div>
            <div class="col-6">
              <button id="Login">Login</button>
            </div>
          </div><a href="#">Forgot Password</a>
        </div>
      </div>
    </div>
    <footer>
      <script src="Assets/JS/jquery-3.3.1.min.js"></script>
      <script src="Assets/JS/bootstrap.min.js"></script>
      <script src="Assets/JS/js-dist.js"></script>
    </footer>
  </body>
</html>