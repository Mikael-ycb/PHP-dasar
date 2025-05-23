<?php 
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
    global $conn;//mengacu pada $conn yang diatas
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
        //ambil data dari tiap elemen dalam form
        //htmlspecialchars agar tidak bisa di hack menggunakan html
        $nrp = htmlspecialchars($data["nrp"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);

        //query insert data
    $query = "INSERT INTO mahasiswa
    VALUES
    ('','$nama','$nrp','$email','$jurusan','$gambar')
    ";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

        //ambil data dari tiap elemen dalam form
        //htmlspecialchars agar tidak bisa di hack menggunakan html
        $id = $data["id"];
        $nrp = htmlspecialchars($data["nrp"]);
        $nama = htmlspecialchars($data["name"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);

        //query insert data
    $query = "UPDATE mahasiswa SET 
                nrp = '$nrp',
                name = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
              WHERE id = $id
            ";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM mahasiswa 
                    WHERE 
                name LIKE '%$keyword%' OR
                nrp LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' 
                
                ";
    return query($query);
}
?>