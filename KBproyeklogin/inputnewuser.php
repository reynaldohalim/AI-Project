<?php
    require_once "ConnectProject.php";


if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $nama = $_POST['nama'];
        $notelp = $_POST['notelp'];
        $password = $_POST['password'];
        $confpassword = $_POST['confpassword'];

        if ($password != $confpassword) {
            header("location: register.php?status=1");
            exit();
        }

        $sql = ("SELECT * FROM user WHERE notelp = '".$notelp."'");
        $stmt2 = $conn->query($sql);
        $result = $stmt2->fetch();


        if(isset($result['iduser']))
        {
            header("location: register.php?status=2");
            exit();
        } 
            $sql = ("INSERT INTO user (notelp, password, username) VALUES('".$notelp."', '".$password."', '".$nama."')");
            $stmt2 = $conn->query($sql);
            header("location: index.php");
            exit();
            
        
    }
    else
    {
        header("location: register.php?status=0");
        exit();
    }
?>