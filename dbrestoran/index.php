<?php 

    session_start();
    require_once "dbcontroller.php";
    $db = new DB;

    $sql = "SELECT * FROM tblkategori ORDER BY kategori ASC";
    $row = $db->getALL($sql);

    if (isset($_GET['log'])) {
        session_destroy();
        header("location:index.php");
    }
    function cart()
    {
        global $db;
        $cart = 0;
        foreach ($_SESSION as $key => $value) {
            if ($key <> 'pelanggan' && $key <> 'idpelanggan') {
                $id = substr($key, 1);
                $sql = "SELECT * FROM tblmenu WHERE idmenu = $id";
                $row = $db -> getALL($sql);

                foreach ($row as $r) {
                    $cart++;
                }

            }
        }
        return $cart;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resto | Home</title>
    <link rel="stylesheet" href="bootstrap-5.2.0-dist/css/bootstrap.css">
    <style>
        a {
            text-decoration:none;
        }
    </style>
</head>
<body>
    <div class="container d-flex flex-column min-vh-100">
        <div class="row mt-4">
            <div class="col-md-3">
                <h1><a href="index.php">Restoran</a></h1>
            </div>

            <div class="col-md-9">
                <?php 
                    if (isset($_SESSION['pelanggan'])) {
                        echo '
                            <div class="float-end mt-3 m-3"><a href="?log=logout">logout</a></div>
                            <div class="float-end mt-3 m-3">Pelanggan : <a href="?f=home&m=beli">'.$_SESSION['pelanggan'].'</a></div>                        
                            <div class="float-end mt-3 m-3">Cart : (<a href="?f=home&m=beli">'.cart().'</a>)</div>                        
                            <div class="float-end mt-3 m-3"><a href="?f=home&m=history">History </a></div>                        
                        ';
                    }
                    else {
                        echo '
                            <div class="float-end mt-3 m-3"><a href="?f=home&m=login">login</a></div>
                            <div class="float-end mt-3 m-3"><a href="?f=home&m=daftar">Daftar</a></div>        
                        ';
                    }
                ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-3">
                <h3>Kategori</h3>
                <hr>
                <?php if(!empty($row)) {?>
                <ul class="nav flex-column">
                    <?php foreach ($row as $r): ?>
                        <li class="nav-item"><a href="?f=home&m=produk&id=<?php echo $r['idkategori'] ?>" class="nav-link"><?php echo $r['kategori'] ?></a></li>
                    <?php endforeach ?>
                </ul>
                <?php }?>
            </div>
            <div class="col-md-9">
                <?php 
                    if (isset($_GET['f']) && isset($_GET['m'])) {
                        $f = $_GET['f'];
                        $m = $_GET['m'];

                        $file = $f."/".$m.".php";

                        require_once $file;
                    }
                    else {
                        require_once "home/produk.php";
                    }
                ?>
            </div>

        </div>
        <footer class="row mt-auto">
            <div class="col">
                <p class="text-center">2022 - Copyright@Mangaonlen.com</p>
            </div>
        </footer>
    </div>
</body>
</html>