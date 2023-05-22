<?php
  // buat koneksi dengan database mysql
  $link = mysqli_connect("localhost","irfannm21","matahari","Latihan");

  // ambil nama mahasiswa dari query string
  $kode = $_GET["f"];

  // ambil dara dari tabel mahasiswa
  $query  = "SELECT * FROM bpbs WHERE kode = '$kode' ";
  $result = mysqli_query($link, $query);

  //buat perulangan untuk element tabel dari data mahasiswa
  while($data = mysqli_fetch_row($result))
  {
    // tampilkan data dalam bentuk tabel HTML
    echo "<option>$data[0]</option>";
  }
?>
