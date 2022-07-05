<?php
    require_once "../KBproyeklogin/ConnectProject.php";

    $idUser = $_GET['idUser'];
    $idBarang = $_GET['idBarang'];

    $sql = "DELETE FROM keranjang WHERE idUser = ". $idUser . " AND idBarang = " . $idBarang;
    $conn->query($sql);
    
    $link = null;
?>
