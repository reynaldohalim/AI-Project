<?php
    require_once "ConnectProject.php";


if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $notelp = $_POST['notelp'];
        $password = $_POST['password'];

        $sql = ("SELECT * FROM user WHERE notelp = '".$notelp."' and password = '".$password."'");
        $stmt2 = $conn->query($sql);
        $result = $stmt2->fetch();

        $_SESSION['user'] = $result['iduser'];

        if(!isset($_SESSION['user']))
        {
            header("location: index.php?status=1");
            exit();
        }
        header("location: ../home.php");
    }
    else
    {
        header("location: index.php?status=0");
        exit();
    }
?>