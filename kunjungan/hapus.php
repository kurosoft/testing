<?php
    $id = $_GET['no_kunjungan'];
    $query = $koneksi->exec("DELETE FROM kunjungan WHERE no_kunjungan = $id");
    if($query){
        $pesan = "Data berhasil dihapus";
    }else{
        $pesan = "Data gagal dihapus";
    }
    include "tampil_kunjungan.php";
?>