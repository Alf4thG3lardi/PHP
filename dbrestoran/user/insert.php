<h2>Insert user</h2>
<div class="form-group mt-4">
    <form action="" method="post">
        <div class="form-group mt-4">
            <label for="">Nama User</label>
            <input type="text" name="user" required placeholder="User" class="form-control mt-2">
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
        <div class="form-group m w-50 mt-4">
            <label for="">Level</label>
            <select name="level" id="">
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
                <option value="koki">Koki</option>
            </select>
        </div>
        <div class="mt-3 ">
            <input type="submit" value="submit" name="submit" class="btn btn-primary">
            <a href="?f=user&m=select" class="btn btn-primary float-end">Back</a>
        </div>
        
    </form>
</div>
<?php 
    if (isset($_POST['submit'])) {
        $user = $_POST['user'];
        $email = $_POST['email'];
        $password = hash('sha256', $_POST['password']);
        $konfirmasi = hash('sha256', $_POST['konfirmasi']);
        $level = $_POST['level'];

        if ($password == $konfirmasi) {
            $sql = "INSERT INTO tbluser VALUES (NULL, '$user', '$email', '$password', '$level', 1)";
            $db -> runSQL($sql);
            header("location:?f=user&m=select");
            // echo $sql;
        }
        else {
            echo "<h3>PASSWORD TIDAK SAMA</h3>";
        }

        
        // $db->runSQL($sql);
        // echo "submited";
    }
?>