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
<?php 

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = hash('sha256', $_POST['password']);
        // echo $email."--".$password;

        $sql = "SELECT * FROM tblpelanggan WHERE email = '$email' AND password = '$password' AND aktif = 1";
        $count = $db -> rowCOUNT($sql);
        $row = $db -> getITEM($sql);
        // echo $row['password']."<br>";
        // echo $count;

        if ($count != 0) {
            if ($row['password'] == $password) {
                // echo "berhasil";
                $_SESSION['pelanggan'] = $row['pelanggan'];
                $_SESSION['idpelanggan'] = $row['idpelanggan'];

                header("location: index.php");
            }
            else {
                echo " password salah";
            }
        }
        else {
            echo "Email tidak terdaftar";
        }
    }

?>