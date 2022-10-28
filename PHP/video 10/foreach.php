<?php 
    // $nama = array('ijo', 'budi', 'siti', 200);
    // var_dump($nama);
    // echo '<br>';
    // foreach ($nama as $key) {
    //     echo $key.'<br>';
    // }
    $nama = array(
        'ijo' => 'surabaya',
        'yanto' => 'mars',
        'budi' => 'malang',
        'sasa' => 'sidoarjo'
    );
    var_dump($nama); 
    echo '<br>';
    foreach ($nama as $k => $e) {
        echo "$k => $e <br>";
    }
?>