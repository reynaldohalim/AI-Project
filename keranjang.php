<?php
        require_once "KBproyeklogin/ConnectProject.php";
        $sql = ("SELECT * FROM keranjang WHERE idUser=".$_GET['idUser']);
        $stmt = $conn->query($sql);
        $items = $stmt->fetchAll();
?>

<html>
    <head>
        <!-- Font Awesome Icon Library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
        <!-- js -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            
        <title>View Cart</title>
    </head>

    <body>
        <?php
            require_once "KBproyeklogin/ConnectProject.php";
            if (!isset($_SESSION['user'])) {
                header("location: KBproyeklogin/index.php");
            }
            $sql3 = ("SELECT * FROM user WHERE iduser=".$_SESSION['user']);
            $stmt3 = $conn->query($sql3);
            $result = $stmt3->fetch();
        ?>

        <nav class="navbar navbar-expand-sm" style="background-color: #517470;">
            <div class="col-lg-6 col-6 text-left">
            </div>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="keranjang.php?idUser=<?php echo $_SESSION['user'] ?>">Cart</a>
                </li>
                <div class="dropdown show">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbardrop" data-toggle="dropdown">
                        <?php echo $result['username'] ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="KBproyeklogin/logout.php">Logout</a>
                    </div>
                </div>
            </ul>
        </nav>

        <br>
        <!-- Header -->
        <div class="card" style="border-color: black;">
            <div class="card-header">
                <div class="form-check">
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            Product
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            Price
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            Quantity
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            Total Price
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Card Per item nya -->
        <?php
            $totalPrice = 0;
            $totalQuantity = 0;
            foreach ($items as $it) { 
            $sql2 = ("SELECT * FROM barang WHERE idbarang=".$it['idBarang']);
            $stmt2 = $conn->query($sql2);
            $barang = $stmt2->fetch();
        ?>
        
        <br>
        <div class="card" style="border-color: black;">
            <div class="card-body">
                <!-- Barang pertama -->
                <div class="form-check">
                    <div class="row">
                        <!-- Product -->
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <img src="<?php echo $barang['gambar'] ?>" style="width: 80px">
                            <?php echo $barang['nama'] ?>
                        </div>

                        <!-- Price -->
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <?php echo "Rp. ". $barang['harga'] ?>
                        </div>

                        <!-- Quantity -->
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <?php 
                                echo $it['quantity'];
                                $totalQuantity += $it['quantity'];
                            ?>
                        </div>
                        
                        <!-- Total Price -->
                        <div class="col-sm-2 col-md-2 col-lg-2" id="perItemTotal">
                            Rp. 
                            <?php
                                echo $it['quantity']*$barang['harga'];
                                $totalPrice += $it['quantity']*$barang['harga'];
                            ?>
                        </div>

                        <!-- delete button -->
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <button class="btn btn-danger" onclick="deleteACart(<?php echo $it['idBarang'];?>)">Delete</button>
                        </div>

                    </div>                    
                </div>
            </div>
        </div>
        <?php } ?>

        <br>
        <!-- Total paling bawah -->
        <div class="card" style="border-color: black; text-align: center;">
            <div class="card-footer">
                <p>Total (<?php echo $totalQuantity; ?> Product):
                    <h5> Rp. <?php echo $totalPrice ?>
                        <button class="btn btn-info" onclick="location.href = 'paymentsucces.php'">Checkout</button>
                    </h5>
                </p>
                
            </div>
        </div>

        <!-- Footer Start -->
        <div class="container-fluid  text-dark mt-5 pt-5" style="background-color: #517470;"></div>
            <div class="row border-top border-light mx-xl-5 py-4">
                <div class="col-md-6 px-xl-0">
                    <p class="mb-md-0 text-center text-md-left text-dark">
                        &copy; <a class="text-dark font-weight-semi-bold" href="#">Kelompok 11 KB</a>. All Rights Reserved.
                    </p>
                </div>
                <div class="col-md-6 px-xl-0 text-center text-md-right">
                    <img class="img-fluid" src="img/payments.png" alt="">
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Bootstrap JS -->
        <script src="js/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="js/bootstrap.js"></script>

        <script>
            function deleteACart(idBarang) {
                var xmlhttp = new XMLHttpRequest();
                var idUser = <?php echo $_SESSION['user'];?>;

                xmlhttp.open("GET", "ajax/deleteFromCart.php?idUser=" + idUser + "&idBarang=" + idBarang, true);
                xmlhttp.send();

                alert("Deleted from Cart SUCCESSFULY");
                location.reload()
            }
        </script>
    </body>
</html>