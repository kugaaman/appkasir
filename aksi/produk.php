<?php
session_start();
include "../koneksi.php";
include "../function.php";
if ($_POST) {
    if ($_POST['aksi'] == 'tambah') {
        $ProdukID = $_POST['ProdukID'];
        $NamaProduk = $_POST['NamaProduk'];
        $Harga = $_POST['Harga'];
        $Stok = $_POST['Stok'];


        $sql = "INSERT INTO produk (ProdukID,NamaProduk,Harga,Stok)
             VALUES (DEFAULT,'$NamaProduk','$Harga','$Stok')";
        // ECHO $sql; // cek perintah
        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=produk');

    } else if ($_POST['aksi'] == 'ubah') {
        $ProdukID = $_POST['ProdukID'];
        $NamaProduk = $_POST['NamaProduk'];
        $Harga = $_POST['Harga'];
        $Stok = $_POST['Stok'];



        $sql = "UPDATE produk SET NamaProduk='$NamaProduk',
            Harga='$Harga', Stok='$Stok'
            WHERE ProdukID=$ProdukID";
        // ECHO $sql; // cek perintah
        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=produk');
    }
}

if ($_GET) {
    if ($_GET['aksi'] == 'hapus') {
        $ProdukID = $_GET['ProdukID'];
        $sql = "DELETE FROM Produk WHERE ProdukID=$ProdukID";
        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=produk');
    }
}
