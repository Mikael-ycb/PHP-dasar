<?php 
// pertemuan ke 2 PHP dasar
// Sintaks PHP

// //Standar Output
// //echo, print
// echo "Mikael, ";
// print "gamteng,";
// //print_r
// print_r(" iyahj, ");
// //var_dump (memberi informasi tipe data dan jumlah karakter)
// var_dump(" iyahj");


// Operator
//1. aritmatika
// + - * / %
$x = 10;
$y = 20;

echo $x + $y;
echo $x - $y;
echo ",  ";
echo $x * $y;
echo ",  ";
echo $x / $y;
echo ",  ";
echo $x % $y;
$nama_depan = " Mikael ";
$nama_belakang = "Gamteng";

echo $nama_depan. $nama_belakang;

?>

<!--php dalam html
<html>
    <head>
        <title>Mikael ganteng</title>
    </head>
    <body>
        <h1>halo <?php echo $nama?></h1>
    </body>
</html> -->