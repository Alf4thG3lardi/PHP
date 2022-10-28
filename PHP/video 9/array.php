<?php 
    // $nama = array('joni', 'tejo', 'budi', 'yanto');
    // var_dump($nama);
    // echo '<br>';
    // echo $nama[3];
    // echo '<br>';
    // for ($i=0; $i < 5; $i++) { 
    //     echo $nama[$i].'<br>';
    // }
    // foreach ($nama as $nama) {
    //     echo $nama.'<br>';
    // }
    // $name = array(
    //     "yanto" => "sidoarjo",
    //     "budi" => "jakarta",
    //     "sasa" => "merek",
    //     "aku" => "sukabumi"
    // );
    $nama["yanto"] = "surabaya";
    $nama["budi"] = "jakarta";
    $nama["sasa"] = "merek";
    $nama["yanti"] = "malang";
    $nama["edo"] = "semarang";

    var_dump($nama);
    echo '<br>';
    foreach ($nama as $key => $value) {
        echo "$key => $value <br>";
    }
?>