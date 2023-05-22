<?php
  // buat koneksi dengan database mysql
  $link = mysqli_connect("localhost","irfannm21","matahari","Latihan");

  // ambil kolom nama dari tabel mahasiswa
  $query  = "SELECT kode FROM npps";
  $result = mysqli_query($link, $query);


  // tambahkan tag <option> untuk setiap nama mahasiswa
  echo "<option selected>-- Pilih --</option>";
  while($data = mysqli_fetch_array($result)) {
    echo "<option value='{$data['kode']}'>{$data['kode']}</option>";
  }
?>
