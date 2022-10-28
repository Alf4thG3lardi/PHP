<?php 
    $hari = 1;
    switch ($hari) {
        case 1:
            echo 'hari senin';
            break;
        case 2:
            echo 'hari selasa';
            break;
        case 3:
            echo 'hari rabu';
            break;
        case 4:
            echo 'hari kamis';
            break;
        case 5:
            echo 'hari jumat';
            break;
        case 6:
            echo 'hari sebtu';
            break;
        case 7:
            echo 'hari minggu';
            break;
        default:
            echo 'hari akhir';
            break;
    }
    echo "<br>";
    $pilihan = 'dada';
    switch ($pilihan) {
        case 'paha':
            echo 'anda pilih paha';
            break;
        case 'dada':
            echo 'anda pilih dada';
            break;
        case 'kaki':
            echo 'anda pilih kaki';
            break;
        case 'perut':
            echo 'anda pilih perut';
        default:
            echo 'anda tidak normal';
            break;
    }
?>