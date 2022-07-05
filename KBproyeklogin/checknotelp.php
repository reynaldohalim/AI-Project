<?php 

require_once "ConnectProject.php";
if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $notelp = $_POST['notelp'];

        $sql = ("SELECT * FROM user WHERE notelp = '".$notelp."'");
        $stmt2 = $conn->query($sql);
        $result = $stmt2->fetch();

        $_SESSION['change'] = $result['iduser'];

        if(!isset($_SESSION['change']))
        {
            header("location: mintaverif.php?status=1");
            exit();
        }
        header("location: verifikasinomor.php");
    }
?>


