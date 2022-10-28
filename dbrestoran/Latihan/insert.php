<form action="" method="post">

    kategori :
    <input type="text" name="kategori" id="">
    <input type="submit" name="submit" value="submit">
</form>

<?php 

    require_once "../function.php";

    if (isset($_POST['submit'])) {
        $kategori = $_POST['kategori'];
        $sql = "INSERT INTO tblkategori VALUES (NULL,'$kategori')";
        $result = mysqli_query($koneksi,$sql);
        echo "data submited";
        header("location:https://localhost/dbrestoran/kategori/select.php");
    }

    // $kategori = 'es teler';

    // 

    // 

    // echo $sql;

?>