<?php
    session_start();
    require_once "../dbcontroller.php";
    $db = new DB;    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../bootstrap-5.2.0-dist/css/bootstrap.css">
</head>
<body>
    <div class="container d-flex flex-column min-vh-100">
        <div class="row ">
            <div class="col-4 mx-auto mt-4">
                <form action="" method="post">
                    <div>
                        <h2>Login Page</h2>
                    </div>
                    <div class="form-group m-2">
                        <label for="">Email </label>
                        <input type="email" name="email" id="">
                    </div>
                    <div class="form-group m-2">
                        <label for="">Password</label>
                        <input type="password" name="password" id="">
                    </div>
                    <div class="mt-3">
                        <input type="submit" value="Login" name="login" class="btn btn-primary">
                        <button class="btn btn-primary float-end" onclick="history.back()">Back</button>
                    </div>
                </form>

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

<?php 
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        // echo $email."--".$password;

        $sql = "SELECT * FROM tbluser WHERE email = '$email' AND password = '$password' AND aktif = 1";
        $count = $db -> rowCOUNT($sql);
        $row = $db -> getITEM($sql);
        // echo $row['password']."<br>";
        // echo $count;

        if ($count != 0) {
            if ($row['password'] == $password) {
                // echo "berhasil";
                $_SESSION['user'] = $row['user'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['level'] = $row['level'];
                $_SESSION['iduser'] = $row['iduser'];

                header("location: index.php");
            }
            else {
                echo " password salah";
            }
        }
        else {
            echo "Email tdk terdaftar";
        }
    }
?>