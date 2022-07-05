<?php 

require_once "ConnectProject.php";
?>
<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 0) {
        echo '<script>alert("Terjadi kesalahan server");</script>';
    } else if ($_GET['status'] == 1) {
        echo '<script>alert("Password yang dimasukkan tidak sama");</script>';
    }  else if ($_GET['status'] == 2) {
      echo '<script>alert("Nomor Telepon sudah terdaftar");</script>';
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
  Top : 10%;
  Left : 38%;
  position: absolute;
  right: 0;
  margin: 20px;
  max-width: 300px;
  padding: 16px;
  background-color:  #07012d;
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
</head>
<body>
<div class="bg-image"> </div>
  <form action="inputnewuser.php" method = "post" class="container">
    <h1 style = "color : #f4f2ff">Register</h1>

    <label for="nama"><b style = "color : #f4f2ff">Name</b></label>
    <input type="text" placeholder="Enter Name" name="nama" required>
    <label for="notelp"><b style = "color : #f4f2ff">Phone Number</b></label>
    <input type="text" placeholder="Enter Phone Number" name="notelp" required>
    <label for="password"><b style = "color : #f4f2ff">Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <label for="confpassword"><b style = "color : #f4f2ff">Confirmation Password</b></label>
    <input type="password" placeholder="Confirmation Password" name="confpassword" required>
    <div style="size: 20px;">
    <p style= "font-size: 75%"><span style = "color : #f4f2ff">Sudah punya akun?<a href="index.php"> <span style = "color : #f59d06">Login </pan> </a> </p>
        <button type="submit" class="btn">Register</button>
    </div>
  </form>
</body>
</html>
