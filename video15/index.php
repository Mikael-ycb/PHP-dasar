<?php
//koneksi ke database
require 'functions.php';
$mahasiswa = query("SELECT *FROM mahasiswa");

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
        
    <h1>Daftar mahasiswa</h1>

    <a href="tambah.php">Tambah data mahasiswa</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name = "keyword" size="30" autofocus="" placeholder="Cari Id" autocomplete="off">
        <button type="submit" name="cari">Cari!</button>

    </form>


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