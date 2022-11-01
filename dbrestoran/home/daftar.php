<h2>Registration</h2>
<div class="form-group mt-4">
    <form action="" method="post">
        <div class="form-group mt-4">
            <label for="">Nama Pelanggan</label>
            <input type="text" name="pelanggan" required placeholder="Pelanggan" class="form-control mt-2">
        </div>
        <div class="form-group mt-4">
            <label for="">Alamat</label>
            <input type="text" name="alamat" required placeholder="Alamat" class="form-control mt-2">
        </div>
        <div class="form-group mt-4">
            <label for="">Telp</label>
            <input type="text" name="telp" required placeholder="telp" class="form-control mt-2">
        </div>
        <div class="form-group mt-4">
            <label for="">Email</label>
            <input type="email" name="email" required placeholder="Email" class="form-control mt-2">
        </div>
        <div class="form-group mt-4">
            <label for="">Password</label>
            <input type="password" name="password" required placeholder="Passsword" class="form-control mt-2">
        </div>
        <div class="form-group mt-4">
            <label for="">Konfirmasi Password</label>
            <input type="password" name="konfirmasi" required placeholder="Konfirmasi Password" class="form-control mt-2">
        </div>
        <div class="mt-3 ">
            <input type="submit" value="submit" name="submit" class="btn btn-primary">
            <a href="?f=home&m=produk" class="btn btn-primary float-end">Back</a>
        </div>
        
    </form>
</div>
<?php 
    if (isset($_POST['submit'])) {
        $pelanggan = $_POST['pelanggan'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $email = $_POST['email'];
        $password = hash('sha256', $_POST['password']);
        $konfirmasi =  hash('sha256', $_POST['konfirmasi']);

        if ($password == $konfirmasi) {
            $sql = "INSERT INTO tblpelanggan VALUES (null, '$pelanggan', '$alamat', '$telp', '$email', '$password', 1)";
            $db -> runSQL($sql);
            header("location:?f=home&m=info");
            // echo $sql;
        }
        else {
            echo "<h3>PASSWORD TIDAK SAMA</h3>";
        }

        
        // $db->runSQL($sql);
        // echo "submited";
    }
?>