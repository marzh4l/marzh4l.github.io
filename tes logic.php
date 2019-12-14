<?php  
    $i = 1;
    $j = 2;
    $k = 3;
    // if($i==1 && $j==2 && $k==3) print "akan tercetak";
    // akan mengeksekusi pernyataan print
    // if($i==1 OR $k==3) print "akan tercetak";
    // akan mengeksekusi pernyataan print
    // if($i==1 XOR $j==2) print "akan tercetak";
    // tidak mengeksekusi pernyataan print karena kedua variabel //bernilai benar
    // if !($i==1 && $k==3) print "akan tercetak";
    // tidak akan mengeksekusi pernyataan print
    // if (($i==1 && $k==3) XOR ($i==1 || $j=2) XOR ($i==1)) print "akan tercetak";
    // akan mengeksekusi pernyataan print
    if($i == 3 && $j == 2){
        print "Jawaban benar.";
    } else {
        print "Jawaban Salah";
    }
?>