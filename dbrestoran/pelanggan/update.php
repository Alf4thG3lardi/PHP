<?php 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $row = $db -> getITEM("SELECT * FROM tblpelanggan WHERE idpelanggan = $id");
        // var_dump($row);
        if ($row['aktif'] == 0) {
            $aktif = 1;
        }
        else {
            $aktif = 0;
        }

        // $aktif = 1; 
        $sql = "UPDATE tblpelanggan SET aktif = $aktif WHERE idpelanggan = $id";
        // echo $sql;
        $db -> runSQL($sql);
        header("location:?f=pelanggan&m=select");
    }    
?>