<?php
        require_once "KBproyeklogin/ConnectProject.php";

        $keyword = $_POST['keyword'];

        if($keyword == "") {
            header("Location: home.php");
            exit();
        }

        $sql = "SELECT * FROM barang WHERE nama LIKE '%". $keyword ."%'";
        $stmt = $conn->query($sql);
        $items = $stmt->fetchAll();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Proyek KB Kelompok 11</title>

    <style>
        #product:hover{
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
            }
    </style>
</head>

<body>
     <!-- NAVBAR -->
     <?php include_once "navbar.php"?>

    <!-- Products Start -->
    <div class="container-fluid pt-5">

        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Search for: <?php echo $keyword ?></span></h2>
        </div>
        
        <div class="row px-xl-5 pb-3">

            <?php foreach ($items as $it) { ?>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div id="product" class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="<?php echo $it['gambar'] ?>" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><?php echo $it['nama'] ?></h6>
                            <div class="d-flex justify-content-center">
                            <h6>Rp. <?php echo $it['harga'] ?></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="klikBarang.php?item=<?php echo $it['idbarang'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <?php echo '<a href="" class="btn btn-sm text-dark p-0" onclick="addToCart('. $it['idbarang'] .')"><i class="fas fa-shopping-cart text-primary mr-1">'?>
                            </i>Add To Cart
                            </a>
                        </div>
                    </div>
                </div>
             <?php } ?>

        </div>
    </div>
    <!-- Products End -->

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

    <script>
        function addToCart(idBarang) {
            var xmlhttp = new XMLHttpRequest();
            var quantity = 1;
            var idUser = <?php echo $_SESSION['user'];?>;

            xmlhttp.open("GET", "ajax/addToCart.php?idUser=" + idUser + "&quantity=" + quantity + "&idBarang=" + idBarang, true);
            xmlhttp.send();

            alert("Added to Cart SUCCESSFULY");
        }
    </script>
</body>

</html>
