<?php 
    function belajar(){
        echo "saya buat fungsi";
    }
    belajar();
    echo "<br>";
    function luasperegi($l, $p){
        $luas = $l*$p;
        echo $luas;
    }
    luasperegi(3, 10);
    echo '<br>';
    function output(){
        return "lagi belajar php";
    }
    echo output();
    echo '<br>';
    function luas($l, $p){
        $luas = $l*$p;
        return $luas;
    }
    echo luas(2, 50) * 5;
?>