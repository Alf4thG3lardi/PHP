<h2>Menu</h2>
<!-- <div class="mb-3">
    <a href="?f=menu&m=insert" class="btn btn-primary" role="button">Insert</a>
</div> -->
<?php 
    if (isset($_POST['opsi'])) {
        $opsi = $_POST['opsi'];
        $where = "WHERE idkategori = $opsi";
    }
    else {
        $opsi = 0;
        $where = NULL;
    }
?>
<div class="mb-3">
    <a href="?f=menu&m=insert" class="btn btn-primary" role="button">Insert</a>
</div>
<div class="mb-3">
    <?php 
        $row = $db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC");
    ?>
    <form action="" method="post">
        <select name="opsi" id="" onchange="this.form.submit()">
            <?php foreach($row as $r):?>
            <option <?php if ($r['idkategori'] == $opsi) echo "selected"; ?> value="<?php echo $r['idkategori'] ?>">
                <?php echo $r['kategori'] ?>
            </option>
            <?php endforeach ?>
        </select>
    </form>
</div>
<?php 
    $jumlahdata = $db->rowCOUNT("SELECT idmenu FROM tblmenu");
    $banyak = 5;

    $halaman = ceil( $jumlahdata / $banyak);  
    if (isset($_GET['p'])) {
        $p = $_GET['p'];
        $mulai = ($p * $banyak) - $banyak;
    }
    else {
        $mulai = 0;
    }
    $sql = "SELECT * FROM tblmenu $where ORDER BY idmenu ASC LIMIT $mulai, $banyak";
    $row = $db->getALL($sql);
    $no = 1+$mulai;

?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>menu</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($row)) {?>
            <?php foreach ($row as $r): ?>
                <tr>
                    <td>
                        <?php echo $no++ ?>
                    </td>
                    <td><?php echo $r['menu'] ?></td>
                    <td><?php echo $r['harga'] ?></td>
                    <?php 
                        // $user = "root";
                        // $file = "/home/ordinary_user/Pictures/upload/";                    
                        // $filename = $r['gambar'];
                        // chown($file.$filename, $user);
                    ?>
                    <td><img style="width: 200px" src="../upload/<?php echo $r['gambar'] ?>" alt="<?php echo $r['gambar'] ?>" srcset=""></td>
                    <td>
                        <a href="?f=menu&m=update&id=<?php echo $r['idmenu']?>">Update</a>
                    </td>
                    <td>
                        <a href="?f=menu&m=delete&id=<?php echo $r['idmenu'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php }?>
    </tbody>
</table>

<?php 
    for ($i=1; $i <= $halaman ; $i++) { 
        echo "<a href='?f=menu&m=select&p=$i'>$i</a>";
        echo "&nbsp &nbsp &nbsp";
    }
?>