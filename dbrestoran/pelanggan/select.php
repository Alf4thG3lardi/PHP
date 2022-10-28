<?php 
    $jumlahdata = $db->rowCOUNT("SELECT idpelanggan FROM tblpelanggan");
    $banyak = 5;

    $halaman = ceil( $jumlahdata / $banyak);  
    if (isset($_GET['p'])) {
        $p = $_GET['p'];
        $mulai = ($p * $banyak) - $banyak;
    }
    else {
        $mulai = 0;
    }
    $sql = "SELECT * FROM tblpelanggan ORDER BY idpelanggan ASC LIMIT $mulai, $banyak";
    $row = $db->getALL($sql);
    $no = 1+$mulai;
?>

<h2>Pelanggan</h2>
<div class="mb-3">
    <a href="?f=pelanggan&m=insert" class="btn btn-primary" role="button">Insert</a>
</div>
<table class="table table-bordered ">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Alamat</th>
            <th>Telp</th>
            <th>Email</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($row as $r): ?>
        <tr>
            <?php 
                if ($r['aktif'] == 1) {
                    $status = "AKTIF";
                }
                else {
                    $status = "TIDAK AKTIF";
                }
            
            ?>
            <td>
                <?php echo $no++ ?>
            </td>
            <td><?php echo $r['pelanggan'] ?></td>
            <td><?php echo $r['alamat'] ?></td>
            <td><?php echo $r['telp'] ?></td>
            <td><?php echo $r['email'] ?></td>
            <td>
                <a href="?f=pelanggan&m=update&id=<?php echo $r['idpelanggan']?>"><?php echo $status ?></a>
            </td>
            <td>
                <a href="?f=pelanggan&m=delete&id=<?php echo $r['idpelanggan'] ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php 
    for ($i=1; $i <= $halaman ; $i++) { 
        echo "<a href='?f=pelanggan&m=select&p=$i'>$i</a>";
        echo "&nbsp &nbsp &nbsp";
    }
?> 