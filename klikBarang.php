<?php
        require_once "KBproyeklogin/ConnectProject.php";
        $sql = ("SELECT * FROM barang WHERE idbarang=".$_GET['item']);
        $stmt = $conn->query($sql);
        $bar = $stmt->fetch();
        $sql2 = ("SELECT * FROM barangpic WHERE idbarang=".$_GET['item']);
        $stmt2 = $conn->query($sql2);
        $pics = $stmt2->fetchAll();


        // penambahan interest counter
        $interestPlus = 1;

        $sql3 = "SELECT * FROM rekomendasi WHERE idUser = ". $_SESSION['user'] . " AND kategori = " . $bar['kategori'];
        $stmt3 = $conn->query($sql3);
        if ($stmt3->rowCount() < 1) {
            $sql3 = "INSERT INTO rekomendasi(idUser, kategori, interest) VALUES (" . $_SESSION['user'] . ",". $bar['kategori'] . ",". 0 .")";
            $conn->query($sql3);
        }

        $sql3 = "UPDATE rekomendasi SET interest = interest+". $interestPlus ." WHERE idUser = " . $_SESSION['user'] . " AND kategori =" . $bar['kategori'];
        $conn->query($sql3);
?>

<!DOCTYPE html>
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
            
        <title>Detail Product</title>

        <style>
            .checked {
                color: orange;
            }

            .carousel-control-prev-icon, .carousel-control-next-icon {
                outline: black;
                background-color: black;
                border: 2px solid black;
            }

            .card {
                margin: 0 auto; /* Added */
                float: none; /* Added */
                margin-bottom: 10px; /* Added */
            }

            .center{
                width: 150px;
                margin: 40px auto;
            }
        </style>
    </head>

    <body>
        <?php include_once "navbar.php" ?>

        <div style="text-align: center">
            <h3 style="margin-top: 30px"><?php echo $bar['nama'] ?> <i class="fa fa-heart"></i></h3>
        </div>

        <!--Carousel-->
        <div id="demo" class="carousel slide" data-ride="carousel" style="margin-top: 30px">
          
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <?php for ($i=1; $i<count($pics); $i++) { ?>
                <li data-target="#demo" data-slide-to="<?php echo $i ?>"></li>
                <?php } ?>
            </ul>
          
            <!-- The slideshow -->
            <div class="carousel-inner" style="text-align: center;">
                <?php 
                $count=0;
                foreach ($pics as $pic) { ?>
                <?php if ($count==0) { ?>
                    <div class="carousel-item active">
                <?php } else { ?>
                    <div class="carousel-item">
                <?php } ?>
                    <img src="<?php echo $pic['gambar'] ?>" alt="Slide1" style="height: 60%">
                </div>
                <?php $count++; } ?>
            </div>
          
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

        <div style="margin-top: 30px; text-align: center">
            <!-- harga -->
            <h4>Rp. <?php echo $bar['harga'] ?></h4>

            <!-- rating -->
            <p>
                <?php
                    $sql3 = ("SELECT * FROM review WHERE idbarang=".$_GET['item']);
                    $stmt3 = $conn->query($sql3);
                    $rev = $stmt3->fetchAll();
                    $tot=0;
                    foreach ($rev as $r) {
                        $tot+=$r['bintang'];
                    }
                    if ($tot>0) {
                        $rata2=$tot/count($rev);
                    } else {
                        $rata2=0;
                    }

                    $count=0;
                    for ($i=0; $i<floor($rata2); $i++) {
                        echo '<i class="fa fa-star checked"></i>';
                        $count++;
                    }
                    
                    $sisa=$rata2-floor($rata2);
                    if ($count<5) {
                        if ($sisa>=0.25 && $sisa<=0.75) {
                            echo '<i class="fa fa-star-half-o" style="color:orange"></i>';
                        } else if ($sisa>0.75) {
                            echo '<i class="fa fa-star checked"></i>';
                        } else {
                            echo '<i class="fa fa-star"></i>';
                        }
                        for ($i=0; $i<4-floor($rata2); $i++) {
                            echo '<i class="fa fa-star"></i>';
                        }
                    }
                ?>
                | <?php echo $bar['terjual'] ?> sold
            </p>
            <button class="btn btn-info" onclick="location.href='review.php?item=<?php echo $_GET['item'] ?>'">View Review</button>
        </div>

        <?php 
            $sql3 = ("SELECT * FROM penjual WHERE idpenjual=".$bar['penjual']);
            $stmt3 = $conn->query($sql3);
            $toko = $stmt3->fetch();
        ?>
        <div class="container" style="margin-top: 30px">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <!-- informasi toko -->
                    <div class="card" style="border-color: black;">
                        <div class="position-relative overflow-hidden bg-transparent">
                            <img src="<?php echo $toko['gambar']; ?>" style="height: 65px"><?php echo $toko['nama']; ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="card" style="border-color: black;">
                        <div class="position-relative bg-transparent" style="margin: 1%">
                           <strong><u>Product Description</u></strong>
                           <p><?php echo $bar['deskripsi'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-lg-3"></div>
                
                <!-- Plus Minus Kuotanya -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <button type="button" class="btn btn-outline-secondary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                <span class="fa fa-minus"></span>
                            </button>
                        </span>
                        
                        <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="100" id="quantity">
                        
                        <span class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary btn-number" data-type="plus" data-field="quant[1]">
                                <span class="fa fa-plus"></span>
                            </button>
                        </span>
                    </div>
                </div>

                <!-- Button Add to Cart -->
                <div class="col-sm-6 col-md-4 col-lg-6">
                    <div class="card" style="border-color: black;">
                    <?php echo '<button type="button" class="btn btn-info" onclick="addToCart('. $_GET['item'] .')">'?>
                            <i class="fa fa-shopping-cart fa-2x"></i>
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('.btn-number').click(function(e){
                e.preventDefault();
                
                fieldName = $(this).attr('data-field');
                type      = $(this).attr('data-type');
                var input = $("input[name='" + fieldName + "']");
                var currentVal = parseInt(input.val());
                
                if (!isNaN(currentVal)) {
                    if(type == 'minus') {
                        if(currentVal > input.attr('min')) {
                            input.val(currentVal - 1).change();
                        } 

                        if(parseInt(input.val()) == input.attr('min')) {
                            $(this).attr('disabled', true);
                        }
            
                    } else if(type == 'plus') {
                        if(currentVal < input.attr('max')) {
                            input.val(currentVal + 1).change();
                        }

                        if(parseInt(input.val()) == input.attr('max')) {
                            $(this).attr('disabled', true);
                        }
            
                    }
                } else {
                    input.val(0);
                }
            });

            $('.input-number').focusin(function(){
                $(this).data('oldValue', $(this).val());
            });

            $('.input-number').change(function() {
                minValue =  0;
                maxValue =  10;
                valueCurrent = parseInt($(this).val());
                
                name = $(this).attr('name');

                if(valueCurrent >= minValue) {
                    $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
                } else {
                    alert('Sorry, the minimum value was reached');
                    $(this).val($(this).data('oldValue'));
                }
                
                if(valueCurrent <= maxValue) {
                    $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
                } else {
                    alert('Sorry, only 10 items avaliable for now');
                    $(this).val(10);
                }
            });
            
            $(".input-number").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                    // Allow: Ctrl+A || Allow: home, end, left, right
                    (e.keyCode == 65 && e.ctrlKey === true) || (e.keyCode >= 35 && e.keyCode <= 39)) {
                        // let it happen, don't do anything
                        return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            }); 
            

            function addToCart(idBarang) {
                var xmlhttp = new XMLHttpRequest();
                var quantity = $("#quantity").val()
                var idUser = <?php echo $_SESSION['user'];?>
                
                xmlhttp.open("GET", "ajax/addToCart.php?idUser=" + idUser + "&quantity=" + quantity + "&idBarang=" + idBarang, true);
                xmlhttp.send();

                alert("Added to Cart SUCCESSFULY");
            }
        </script>

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
    </body>
</html>
