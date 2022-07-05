<?php 

require_once "ConnectProject.php";
if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $password1 = $_POST['password'];
        $password2 = $_POST['newpassword'];

        if ($password1 == $password2){
        $sql = ("UPDATE user SET password = '".$password1."' WHERE iduser = ".$_SESSION['change']);
        echo $sql;
        $stmt2 = $conn->query($sql);

        header("location: index.php?change=1");
        exit();
        }
        else{
          header("location: forgetpass.php?status=1");
            exit();
        }
      }
?>

