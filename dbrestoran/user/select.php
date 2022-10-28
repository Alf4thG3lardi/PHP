<?php 
    $jumlahdata = $db->rowCOUNT("SELECT iduser FROM tbluser");
    $banyak = 5;

    $halaman = ceil( $jumlahdata / $banyak);  
    if (isset($_GET['p'])) {
        $p = $_GET['p'];
        $mulai = ($p * $banyak) - $banyak;
    }
    else {
        $mulai = 0;
    }
    $sql = "SELECT * FROM tbluser ORDER BY iduser ASC LIMIT $mulai, $banyak";
    $row = $db->getALL($sql);
    $no = 1+$mulai;
?>

<h2>user</h2>
<div class="mb-3">
    <a href="?f=user&m=insert" class="btn btn-primary" role="button">Insert</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Email</th>
            <th>Level</th>
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
                    $status = "BANNED";
                }
            ?>
            <td>
                <?php echo $no++ ?>
            </td>
            <td><?php echo $r['user'] ?></td>
            <td><?php echo $r['email'] ?></td>
            <td><?php echo $r['level'] ?></td>
            <td>
                <a href="?f=user&m=updateuser&id=<?php echo $r['iduser']?>"><?php echo $status ?></a>
            </td>
            <td>
                <a href="?f=user&m=delete&id=<?php echo $r['iduser'] ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php 
    for ($i=1; $i <= $halaman ; $i++) { 
        echo "<a href='?f=user&m=select&p=$i'>$i</a>";
        echo "&nbsp &nbsp &nbsp";
    }
?>