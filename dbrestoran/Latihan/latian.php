<!-- koneksi -->
<?php 
    $db = "dbbuah";
    $host = "localhost";
    $user = "root";
    $password = "";

    $koneksi = new mysqli($host, $user, $password, $db);
?>
<!-- form -->
<form action="" method="post">
    Toko: 
    <input type="text" name="toko" id="">
    Nama: 
    <input type="text" name="user" id="">
    <input type="submit" name="submit" value="Submit">
</form>
<!-- variabel -->
<?php 
    if (isset($_POST['submit'])) {
        $toko = $_POST['toko'];
        $user = $_POST['user'];

        // echo $toko."-".$user."<br>";
        // sql
        $sql = "INSERT INTO tbltoko (toko, user) value ('$toko', '$user')";
        // echo $sql
        $koneksi -> query($sql);
    }

    $sql = "SELECT * FROM tbltoko";
    $hasil = $koneksi -> query($sql);

    // var_dump($hasil);
    echo "<table border>";
    while ($row = $hasil->fetch_array()) {
        echo "<tr>";
        echo "<td> $row[1] </td>";
        echo "<td> $row[2] </td>";
        echo "</tr>";
    }
    echo "</table>";

?>


<!-- syntax query -->