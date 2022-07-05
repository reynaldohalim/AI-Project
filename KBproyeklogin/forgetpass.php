<?php 

require_once "ConnectProject.php";
?>
<?php
if (isset($_GET['status'])) {
  if ($_GET['status'] == 1) {
      echo '<script>alert("Password tidak sama");</script>';
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
  <form action="changepass.php" method = "post" class="container">
    <h1 style = "color : #f4f2ff">Forget Password</h1>

    <label for="password"><b style = "color : #f4f2ff">Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <label for="newpassword"><b style = "color : #f4f2ff">Confirmation Password</b></label>
    <input type="password" placeholder="Confirmation Password" name="newpassword" required>
    <div style="size: 20px;">
    
        <button type="submit" class="btn">Oke</button> 
    </div>
  </form>
</body>
</html>
