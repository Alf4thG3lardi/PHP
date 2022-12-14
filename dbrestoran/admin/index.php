<?php 

    session_start();
    require_once "../dbcontroller.php";
    $db = new DB;

    if (!isset($_SESSION['user'])) {
        header("location:login.php");
    }

    if (isset($_GET['log'])) {
        session_destroy();
        header("location:login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page | </title>
    <link rel="stylesheet" href="../bootstrap-5.2.0-dist/css/bootstrap.css">
</head>
<body>
    <div class="container d-flex flex-column min-vh-100">
        <div class="row">
            <div class="col-md-3">
                <h2>Restoran</h2>
            </div>

            <div class="col-md-9">
                <div class="float-end mt-3"><a href="?log=logout">logout</a></div>
                <div class="float-end mt-3 m-3">User : <a href="?f=user&m=update&id=<?php echo $_SESSION['iduser'] ?>"><?php echo $_SESSION['user'] ?></a></div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-3">
                <ul class="nav flex-column">
                    <?php 
                        switch ($_SESSION['level']) {
                            case 'admin':
                                echo '
                                <li class="nav-item"><a href="?f=kategori&m=select" class="nav-link">Kategori</a></li>
                                <li class="nav-item"><a href="?f=menu&m=select" class="nav-link">Menu</a></li>
                                <li class="nav-item"><a href="?f=pelanggan&m=select" class="nav-link">Pelanggan</a></li>
                                <li class="nav-item"><a href="?f=order&m=select" class="nav-link">Order</a></li>
                                <li class="nav-item"><a href="?f=orderdetail&m=select" class="nav-link">Order Details</a></li>
                                <li class="nav-item"><a href="?f=user&m=select" class="nav-link">User</a></li>
                                ';
                                break;
                            case 'kasir' :
                                echo '
                                <li class="nav-item"><a href="?f=order&m=select" class="nav-link">Order</a></li>
                                <li class="nav-item"><a href="?f=orderdetail&m=select" class="nav-link">Order Details</a></li>
                                ';
                                break;
                            case 'koki' :
                                echo '
                                <li class="nav-item"><a href="?f=orderdetail&m=select" class="nav-link">Order Details</a></li>
                                ';
                                break;
                            default:
                                
                                break;
                        }
                    ?>
                </ul>
            </div>
            <div class="col-md-9">
                <?php 
                    if (isset($_GET['f']) && isset($_GET['m'])) {
                        $f = $_GET['f'];
                        $m = $_GET['m'];

                        $file = "../$f/$m.php";
                        require_once $file;
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