<?php 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbluser where iduser= $id";
        $row = $db -> getITEM($sql);

        // var_dump($sql);
    $level = $row['level'];
    }
?>
<h2>Update user</h2>
<div class="form-group mt-4">
    <form action="" method="post">
        <div class="form-group mt-4">
            <label for="">Nama User</label>
            <input type="text" name="user" required value="<?php echo $row['user'] ?>" class="form-control mt-2">
        </div>
        <div class="form-group mt-4">
            <label for="">Email</label>
            <input type="email" name="email" required value="<?php echo $row['email'] ?>" class="form-control mt-2">
        </div>
        <div class="form-group mt-4">
            <label for="">Password</label>
            <input type="password" name="password" required value="<?php echo $row['password'] ?>" class="form-control mt-2">
        </div>
        <div class="form-group mt-4">
            <label for="">Konfirmasi Password</label>
            <input type="password" name="konfirmasi" required placeholder="Konfirmasi Password" class="form-control mt-2">
        </div>
        <div class="form-group m w-50 mt-4">
            <label for="">Level</label>
            <select name="level" id="">
                <option <?php if ( $row['level'] == 'admin') echo "selected" ?> value="admin">Admin</option>
                <option <?php if ( $row['level'] == 'kasir') echo "selected"?> value="kasir">Kasir</option>
                <option <?php if ( $row['level'] == 'koki') echo "selected" ?> value="koki">Koki</option>
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
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];
        $level = $_POST['level'];

        if ($konfirmasi == $password) {
            $sql = "UPDATE tbluser SET user = '$user', email = '$email', password = '$password', level = '$level' WHERE iduser = $id";
            $db -> runSQL($sql);
            header("location:?f=user&m=select");
        }
        else {
            echo "konfirmasi password salah";
        }

        // if ($password == $konfirmasi) {
        //     $sql = "INSERT INTO tbluser VALUES (NULL, '$user', '$email', '$password', '$level', 1)";
        //     // echo $sql;
        // }
        // 

        
        // $db->runSQL($sql);
        // echo "submited";
    }
?>