<?php
require 'functions.php';

//ambil data di url
$id = $_GET["id"];
var_dump($id);

//query data mahasiswa berdasarkan id-nya
$mhs = query("SELECT * FROM mahasiswa where id = $id")[0];





// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){


    

    // cek apakah data berhasil diubah atau tidak
    if(ubah($_POST)>0){
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal didiubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }

}



?>


<html>
    <head>
        <title>Ubah data mahasiswa</title>
    </head>
    <body>
        
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post">
    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <ul>
            <li>
                <label for="nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"];?>">
            </li>
            <li>
            <label for="name">Nama : </label>
            <input type="text" name="name" id="name" required value="<?= $mhs["name"];?>">
            </li>
            <li>
            <label for="email">Email : </label>
            <input type="text" name="email" id="email" required value="<?= $mhs["email"];?>">
            </li>
            <li>
            <label for="jurusan">Jurusan : </label>
            <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"];?>">
            </li>
            <li>
            <label for="gambar">Gambar : </label>
            <input type="text" name="gambar" id="gambar" value="<?= $mhs["gambar"];?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah data baru</button>
            </li>
            

        </ul>
    </form>
    </body>
</html>