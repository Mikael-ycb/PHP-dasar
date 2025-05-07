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
?>