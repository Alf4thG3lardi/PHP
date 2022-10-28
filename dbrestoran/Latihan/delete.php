delete

<?php 

    require_once "../function.php";

    // $id = '';

    $sql = "DELETE FROM tblkategori WHERE idkategori = $id";
    $result = mysqli_query($koneksi,$sql);
    header("location:https://localhost/dbrestoran/kategori/select.php")
?>