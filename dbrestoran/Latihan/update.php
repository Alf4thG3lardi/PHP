<?php 

    require_once "../function.php";

    $sql = "SELECT * FROM tblkategori WHERE idkategori = $id";
    $result = mysqli_query($koneksi,$sql);

    $row = mysqli_fetch_assoc($result);
    echo $row['kategori'];
    // $kategori = '';
    // $id = '';


?>
<form action="" method="post">

kateori: 
<input type="text" name="kategori" value="<?php echo $row['kategori'] ?>">
<input type="submit" name="submit" value="submit">
</form>

<?php 

    if (isset($_POST['submit'])) {
        $kategori = $_POST['kategori'];
        $sql = "UPDATE tblkategori SET kategori = '$kategori' WHERE idkategori = $id";
        $result = mysqli_query($koneksi,$sql);

        echo "data updated<br>";
        header("locaion:https://localhost/dbrestoran/kategori/select.php");
    }

?>