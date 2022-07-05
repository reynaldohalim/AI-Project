<?php 

require_once "ConnectProject.php";
?>
<?php
  if (isset($_SESSION['user'])) {
      header("location: ../home.php");
  }
  if (isset($_GET['status'])) {
    if ($_GET['status'] == 0) {
        echo '<script>alert("Terjadi kesalahan server");</script>';
    } else if ($_GET['status'] == 1) {
        echo '<script>alert("Password / nomor telepon salah");</script>';
  }
  }
  if (isset($_GET['change'])) {
    if ($_GET['change'] == 1) {
        echo '<script>alert("Password berhasil diupdate");</script>';
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}


/* Add styles to the form container */
.container {
  Top : 20%;
  Left : 38%;
  position: absolute;
  right: 0;
  margin: 20px;
  max-width: 300px;
  padding: 16px;
  background-color: #07012d;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #c1c1c1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #f59d06;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}

body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("bgbaru.jpg");
  
  /* Add the blur effect */
  filter: blur(2px);
  -webkit-filter: blur(5px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
<script>function myFunction() { 
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}</script>
</head>
<body>
<div class="bg-image"> </div>
  <form action="login.php" method = "post" class="container">
    <h1 style = "color : #f4f2ff">Login</h1>

    <label for="notelp"><b style = "color : #f4f2ff">Phone Number</b></label>
    <input type="text" placeholder="Enter Phone Number" name="notelp" required>

    <label for="password"><b style = "color : #f4f2ff">Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="myInput" required> 
    <input type="checkbox" onclick="myFunction() "> <span style = "color : #f4f2ff">Show Password </span>
    <div class="link forget-pass text-left"><p style = "font-size: 75%"><a href="mintaverif.php"><span style = "color : #f59d06">Forgot password?</span></a></div>
                    <div class="form-group">
        <p style = "font-size : 70%"> <span style = "color : #f4f2ff">Belum punya akun? </span><a href="register.php"><span style = "color : #f59d06"> Buat akun baru </span> </a> </p>
        <button type="submit" class="btn">Login</button>
  </form>
</body>
</html>
