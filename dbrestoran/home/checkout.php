<?php 

    if (isset($_GET['total'])) {
        $total = $_GET['total'];
        $idorder = idorder();
        $idpelanggan = $_SESSION['idpelanggan'];
        $date = date('y-m-d');

        $sql = "SELECT * FROM tblorder WHERE idorder = $idorder";

        $count = $db->rowCOUNT($sql);

        if ($count == 0) {
            insertORDER($idorder, $idpelanggan,$date, $total);
            insertOrderDetail($idorder);
        }
        else {
            insertOrderDetail($idorder);
        }

        kosongkanSession();
        // echo $total;
        // echo "<br>";
        // echo idorder();

        header("location:?f=home&m=checkout");

    }
    else {
        info();
    }

    function idorder()
    {
        global $db;
        $sql = "SELECT idorder FROM tblorder ORDER BY idorder DESC";
        $jumlah = $db -> rowCOUNT($sql);
        if ($jumlah == 0) {
            $id = 1;

        }
        else {
            $item = $db -> getITEM($sql);
            $id = $item['idorder'] + 1;
        }
        return $id;
    }
    function insertORDER($idorder, $idpelanggan, $tgl, $total)
    {
        global $db;
        $sql = "INSERT INTO tblorder VALUES ($idorder, $idpelanggan, '$tgl', $total, 0, 0, 0)";
        $db -> runSQL($sql);
        // echo $sql;
    }
    function insertOrderDetail($idorder)
    {
        global $db;
        foreach ($_SESSION as $key => $value) {
            if ($key <> 'pelanggan' && $key <> 'idpelanggan') {
                $id = substr($key, 1);
                $sql = "SELECT * FROM tblmenu WHERE idmenu = $id";
                $row = $db -> getALL($sql);

                foreach ($row as $r) {
                    $idmenu = $r['idmenu'];
                    $harga = $r['harga'];
                    $sql = "INSERT INTO tblorderdetail VALUES (NULL, $idorder, $idmenu, $value, $harga)";
                    // echo $sql;
                    $db -> runSQL($sql);
                }
                // echo "<pre>";
                // print_r($row);
                // echo "</pre>";
            }
        }
    }
    function kosongkanSession()
    {
        global $db;
        foreach ($_SESSION as $key => $value) {
            if ($key <> 'pelanggan' && $key <> 'idpelanggan') {
                $id = substr($key, 1);
                unset($_SESSION['_'.$id]);
            }
        }
    }

    function info()
    {
        echo "<h3>Terimakasih Telah Berbelanja<h3>";
    }

?>