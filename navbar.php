<?php
        require_once "KBproyeklogin/ConnectProject.php";
        if (!isset($_SESSION['user'])) {
            header("location: KBproyeklogin/index.php");
        }
        $sql = ("SELECT * FROM user WHERE iduser=".$_SESSION['user']);
        $stmt = $conn->query($sql);
        $result = $stmt->fetch();
?>

<nav class="navbar navbar-expand-sm" style="background-color: #517470;">
    <div class="col-lg-6 col-6 text-left">

        <form action="tampilansearch.php" method="POST">
            <div class="input-group" style="background-color: #FFFFFF;">
                <input type="text" id="searchField" name="keyword" class="form-control" placeholder="Search for products">
                <div class="input-group-append">
                    <span class="input-group-text bg-transparent text-primary">
                        <button class="btn-light">Search</button>
                    </span>
                </div>
            </div>
        </form>
        
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
