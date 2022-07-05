<?php
      require_once "KBproyeklogin/ConnectProject.php";
      $sql = ("SELECT * FROM review WHERE idbarang=".$_GET['item']);
      $stmt = $conn->query($sql);
      $rev = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Reviews</title>
  <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
  <script src="https://kit.fontawesome.com/44f557ccce.js"></script>

</head>
<body>

<div class="rev-section">

   <h2 class="title">Testimonial</h2>
   <p class="note">REVIEW PELANGGAN</p>

   <div class="reviews">
      <?php
         if (count($rev)==0) {
            echo '<h1>Belum ada review untuk produk ini</h1>';
         } else {
            foreach ($rev as $r) {
               $sql2 = ("SELECT * FROM user WHERE iduser=".$r['iduser']);
               $stmt2 = $conn->query($sql2);
               $user = $stmt2->fetch();
      ?>
      <div class="review">
         <div class="head-review">
            <img src="<?php echo $user['gambar']?>" width="250px">
         </div>
         <div class="body-review">
            <div class="name-review"><?php echo $user['username'] ?></div>
            <div class="place-review"><?php echo $r['tempat'] ?></div>
            <div class="rating">
               <?php for ($i=0; $i<$r['bintang']; $i++) { ?>
               <i class="fas fa-star"></i>
               <?php } ?>
               <?php for ($i=0; $i<(5-$r['bintang']); $i++) { ?>
               <i class="far fa-star"></i>
               <?php } ?>
            </div>
            <div class="desc-review"><?php echo $r['isi'] ?></div>
         </div>
      </div>
      <?php } 
      } ?>
   </div>
</div>

</body>
</html>
