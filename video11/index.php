<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

//ambil data dari tabel mahasiswa/ query data mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
if(!$result){
    echo mysqli_error($conn);
}
// var_dump($result);

//ambil data (fetch) mahasiswa dari object result
//mysql_fetch_row() // mengembalikan array numerik 
//mysql_fetch_assoc()// mengembalikan array associative
//mysql_fetch_array()// mengembalikan keduanya
//mysql_fetch_object()// harus menggunakan ->

//1. mysql_fetch_row()
// $mhs = mysqli_fetch_row($result);
// var_dump($mhs[1]);

//2. mysql_fetch_assoc()
// $mhs = mysqli_fetch_assoc($result);
// var_dump($mhs["jurusan"]);

//menampilkan semua
// while($mhs = mysqli_fetch_assoc($result)){
//     var_dump($mhs["jurusan"]);
// }

//3. mysql_fetch_array()
// $mhs = mysqli_fetch_array($result);
// var_dump($mhs["name"]);

//menampilkan semua
// while($mhs = mysqli_fetch_array($result)){
//     var_dump($mhs["name"]);
// }

//mysql_fetch_object()
// $mhs = mysqli_fetch_object($result);
// var_dump($mhs->jurusan);





?>
<html>
    <head>
        <title>Halaman Admin</title>
    </head>
    <body>
        
    <h1>Daftar mahasiswa</h1>

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
         <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $i;?></td>
            <td>
                <a href="">ubah</a> |
                <a href="">hapus</a>
            </td>
            <td><img src="img/<?php echo $row["gambar"];?>" alt="" width="50"></td>
            <td><?= $row["nrp"]; ?></td>
            <td><?= $row["name"];?></td>
            <td><?= $row["email"];?></td>
            <td><?= $row["jurusan"];?>Informatika</td>
        </tr>
        <?php $i++?>
         <?php endwhile?>

    </table>

    </body>
</html>