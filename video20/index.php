<?php

session_start();

if(!isset($_SESSION["login"])){//jika tidak ada session login maka arahkan ke form login
    header("Location: login.php");
    exit;
}

//koneksi ke database
require 'functions.php';

//pagination

//konfigurasi
$jumlahDataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;




$mahasiswa = query("SELECT *FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");// tampilkan 2 data mulai dri index 0

//tombol cari di klik
if(isset($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
}
?>
<html>
    <head>
        <title>Halaman Admin</title>
    </head>
    <body>

    <a href="logout.php">Logout</a>
        
    <h1>Daftar mahasiswa</h1>

    <a href="tambah.php">Tambah data mahasiswa</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name = "keyword" size="30" autofocus="" placeholder="Cari Id" autocomplete="off">
        <button type="submit" name="cari">Cari!</button>

    </form>
    <br><br>


    <!--navigasi-->
    <?php if($halamanAktif>1): ?>
        <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
    <?php endif;?>

    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if($i == $halamanAktif):?>
        <a href="?halaman= <?= $i;?>" style="font-weight: bold; color: green;"><?= $i; ?></a>
        <?php else: ?>
            <a href="?halaman=<?= $i; ?>"><?=$i;?></a>
        <?php endif;?>
    <?php endfor;?>

    <?php if($halamanAktif < $jumlahHalaman): ?>
        <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
    <?php endif;?>


    <br>
    <table border="1" callpadding="50" callspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php $i = 1;?>
         <?php foreach($mahasiswa as $row): ?>
        <tr>
            <td><?= $i;?></td>
            <td>
                <a href="ubah.php?id=<?=  $row["id"];?>">ubah</a>  |
                <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('Yakin Deck?');">hapus</a>
            </td>
            <td><img src="img/<?php echo $row["gambar"];?>" alt="" width="50"></td>
            <td><?= $row["nrp"]; ?></td>
            <td><?= $row["name"];?></td>
            <td><?= $row["email"];?></td>
            <td><?= $row["jurusan"];?>Informatika</td>
        </tr>
        <?php $i++?>
         <?php endforeach; ?>

    </table>

    </body>
</html>