<h2>Order Details</h2>
<div class="form-group ">
    <form action="" method="post">
        <div class="form-group float-start w-50 mb-4">
            <label for="">Pelanggan</label>
            <input type="text" name="pelanggan" required class="form-control" placeholder="Nama akun pelanggan">
        </div>
        <div class="form-group float-end w-50 mb-4 ">
            <label for="">Tanggal Pembelian</label>
            <input type="date" name="tgl" required class="form-control">
        </div>
        <div class="mt-3 ">
            <input type="submit" value="Cari" name="cari" class="btn btn-primary">
            <a href="?f=orderdetail&m=select" class="btn btn-primary float-end">Back</a>
        </div>
        
    </form>
</div>

<?php 
    $pelanggan = $_SESSION['pelanggan'];
    $jumlahdata = $db->rowCOUNT("SELECT idorderdetail FROM vorderdetail");
    $banyak = 5;

    $halaman = ceil($jumlahdata / $banyak);  
    if (isset($_GET['p'])) {
        $p = $_GET['p'];
        $mulai = ($p * $banyak) - $banyak;
    }
    else {
        $mulai = 0;
    }
    $sql = "SELECT * FROM vorderdetail ORDER BY idorderdetail DESC LIMIT $mulai, $banyak";
    if (isset($_POST['cari'])) {
        $pelanggan = $_POST['pelanggan'];
        $tgl = $_POST['tgl'];
        $sql = "SELECT * FROM vorderdetail WHERE tglorder = '$tgl' and pelanggan = '$pelanggan'";
    }
    $row = $db->getALL($sql);
    $no = 1+$mulai;
?>

<table class="table table-bordered w-100 mt-4">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($row)) {?>
            <?php 
                $total;
            ?>
            <?php foreach ($row as $r): ?>
                <tr>
                <td>
                    <?php echo $no++ ?>
                </td>
                <td><?php echo $r['pelanggan'] ?></td>
                <td><?php echo $r['tglorder'] ?></td>
                <td><?php echo $r['menu'] ?></td>
                <td><?php echo $r['harga'] ?></td>
                <td><?php echo $r['jumlah'] ?></td>
                <td><?php echo $r['total'] ?></td>
                <td><?php echo $r['alamat'] ?></td>
                <?php 
                    $total = $total + $r['total'];
                ?>
                <?php echo $status; ?>
            </tr>
            <?php endforeach ?>
            <?php 
            
            if (isset($_POST['cari'])) {
                echo "
                <tr>
                    <td colspan=6><h3>Total</h3></td>
                    <td colspan=2><h4>$total</h4></td>
                </tr>
                ";
            }
            ?>
        <?php }?>
    </tbody>
</table>

<?php 
    for ($i=1; $i <= $halaman ; $i++) { 
        echo "<a href='?f=orderdetail&m=select&p=$i'>$i</a>";
        echo "&nbsp &nbsp &nbsp";
    }
?>