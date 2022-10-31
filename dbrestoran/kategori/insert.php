<h2>Insert kategori</h2>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group">
            <label for="">Kategori</label>
            <input type="text" name="kategori" required placeholder="isi kategori" class="form-control mt-2">
        </div>
        <div class="mt-3 ">
            <input type="submit" value="submit" name="submit" class="btn btn-primary">
            <a href="?f=kategori&m=select" class="btn btn-primary float-end">Back</a>
        </div>
        
    </form>
</div>
<?php 
    if (isset($_POST['submit'])) {
        $kategori = $_POST['kategori'];
        $sql = "INSERT INTO tblkategori VALUES (NULL, '$kategori')";
        $db->runSQL($sql);
        header("location:?f=kategori&m=select");
    }
?>