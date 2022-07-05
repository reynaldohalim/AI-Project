<?php
    require_once "../KBproyeklogin/ConnectProject.php";

    $idUser = $_GET['idUser'];
    $idBarang = $_GET['idBarang'];
    $quantity = $_GET['quantity'];

    $sql = "SELECT * FROM keranjang WHERE idUser = ". $idUser . " AND idBarang = " . $idBarang;
    $stmt = $conn->query($sql);

    if ($stmt->rowCount() < 1) {
        $sql = "INSERT INTO keranjang(idUser, idBarang, quantity) VALUES (". $idUser .",". $idBarang .",". 0 .")";
        $stmt = $conn->query($sql);
    }

    $sql = "UPDATE keranjang SET quantity = quantity+". $quantity ." WHERE idUser = " . $idUser . " AND idBarang = " . $idBarang;
    $conn-> query($sql);


    // penambahan interest counter
    $sql = ("SELECT * FROM barang WHERE idbarang=".$_GET['idBarang']);
    $stmt = $conn->query($sql);
    $bar = $stmt->fetch();

    $interestPlus = 3;

    $sql = "SELECT * FROM rekomendasi WHERE idUser = ". $_SESSION['user'] . " AND kategori = " . $bar['kategori'];
    $stmt = $conn->query($sql);
    
    if ($stmt->rowCount() < 1) {
        $sql = "INSERT INTO rekomendasi(idUser, kategori, interest) VALUES (" . $_SESSION['user'] . ",". $bar['kategori'] . ",". 0 .")";
        $conn->query($sql);
    }

    $sql = "UPDATE rekomendasi SET interest = interest+". $interestPlus ." WHERE idUser = " . $_SESSION['user'] . " AND kategori =" . $bar['kategori'];
    $conn->query($sql);

    $link = null;
?>
