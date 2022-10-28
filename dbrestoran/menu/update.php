<?php 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // echo $id;
        $sql = "SELECT * FROM tblmenu WHERE idmenu = $id";
        $item = $db -> getITEM($sql);
        // var_dump($item);
        $idkategori = $item['idkategori'];
        $gambar = $item['gambar'];

        // echo "$idkategori - $gambar";
    }
    $row = $db -> getALL("SELECT * FROM tblkategori ORDER BY kategori ASC");
?>
<h3>Update Menu</h3>
<form action="" method="post" enctype="multipart/form-data">
    <label for="">Ketegori: </label>
    <select name="idkategori" id="">
        <?php foreach ($row as $r): ?>
            <option <?php if ($idkategori == $r["idkategori"]) echo "selected" ?> value="<?php echo $r["idkategori"]; ?>"><?php echo $r["kategori"] ?></option>
        <?php endforeach ?>
    </select>
    <div class="mb-3">
        <div class="mb-3 w-50">
            <label for="" class="form-label">Menu:</label>
            <input type="text" name="menu" id="" required value="<?php echo $item['menu'] ?>" class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label for="" class="form-label">Harga:</label>
            <input type="number" name="harga" id="" number required value="<?php echo $item['harga'] ?>" class="form-control">
        </div>
        <div class="mb-3 w-50">
            <label for="" class="form-label">Gambar:</label>
            <input type="file" name="gambar">
        </div>
        <div class="mt-3 ">
            <input type="submit" value="submit" name="submit" class="btn btn-primary">
            <a href="?f=menu&m=select" class="btn btn-primary float-end">Back</a>
        </div>
    </div>
</form>
<?php 
    if (isset($_POST['submit'])) {
        $idkategori = $_POST['idkategori'];
        $menu = $_POST['menu'];
        $harga = $_POST['harga'];
        $gambar = $_FILES['gambar']['name'];

        if (!empty($gambar)) {
            $upload = "/opt/lampp/htdocs/dbrestoran/upload/";
            move_uploaded_file($_FILES['gambar']['tmp_name'],$upload.$gambar);
        }
        else {
            
        }
        
            
            // $db -> runSQL($sql);
            // header("location:?f=menu&m=select");
            $sql = "UPDATE tblmenu SET idkategori = $idkategori, menu = '$menu', gambar = '$gambar', harga = $harga WHERE idmenu = $id" ;
            $db -> runSQL($sql);
            // echo $sql;
            header("location:?f=menu&m=select");
        }

?>