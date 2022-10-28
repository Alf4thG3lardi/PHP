<?php 
    $a = 2;
    $b = 2;
    // operasi matematika
    echo "<h2>Matematika</h2>";
    $c = $a + $b;
    echo $c."<br>";
    $c = $a - $b;
    echo $c."<br>";
    $c = $a * $b;
    echo $c."<br>"; 
    $c = $a / $b;
    echo $c."<br>";
    $c = $a % $b;
    echo $c."<br>";
    // operasi logika
    echo "<h2>Logika</h2>";
    $c = $a < $b;
    echo $c.'<br>';
    $c = $a > $b;
    echo $c.'<br>';
    $c = $a == $b;
    echo $c.'<br>';
    $c = $a != $b;
    echo $c.'<br>';
    echo "yang hasilnya false gamau keluar pak, jadi kosong<br>";
    // increment
    echo "<h3>increment</h3>";
    $a++;
    echo $a."<br>";
    // operasi string
    echo "<h2>String</h2>";
    $kata = "smkb ";
    $kalimat = "revit ";
    $hasil = $kata.$kalimat;
    $hasil .= "tambahan ";
    echo $hasil;

?>