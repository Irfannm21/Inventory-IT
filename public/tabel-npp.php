<?php
$con = mysqli_connect('localhost','irfannm21','matahari','Latihan');

if(!$con) {
    echo mysqli_connect_error();
} else {
    echo "Berhasil <br>";
}
// Nama Barang;
$id_barang = $_GET['n'];

// Query
$query  = "SELECT * FROM detail_npps WHERE npp_id = '1'";
$result = mysqli_query($con,$query);

// buat Perulangan
while($data = mysqli_fetch_row($result)) {
    echo "<option>$data[2]</option>";
}



?>
