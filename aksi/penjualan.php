<?php
session_start();
include "../koneksi.php";
include "../function.php";
if ($_POST) {

    if ($_POST['aksi'] == 'tambah-keranjang-bybarcode') {
        $id_user = $_SESSION['id'];
        $Barcode = $_POST['Barcode'];
        $Jumlah = $_POST['Jumlah'];


        // temukan produk berdasarkan barcode
        $sql1 = "SELECT * FROM produk WHERE Barcode='$Barcode'";
        $query1 = mysqli_query($koneksi, $sql1);
        $Produk = mysqli_fetch_array($query1);

        if (mysqli_num_rows($query1) >= 1) {
            // echo "produk ditemukan di database";
            $ProdukID = $Produk['ProdukID'];
            // cek keranjang bila produk sudah ada hanya mengupdate jumlah , bila belum ada akan instert data
            $sql3 = "SELECT * FROM keranjang WHERE ProdukID=$ProdukID AND id_user=$id_user";
            $query3 = mysqli_query($koneksi, $sql3);

            $duplikat = mysqli_num_rows($query3);
            if ($duplikat == 0) {
                $sql2 = "INSERT INTO keranjang(KeranjangID,ProdukID,Jumlah,id_user) VALUES(DEFAULT,$ProdukID,$Jumlah,$id_user)";
            } else {
                $sql2 = "UPDATE keranjang SET Jumlah=Jumlah+$Jumlah WHERE ProdukID=$ProdukID AND id_user=$id_user";
            }
            // echo $sql2;
            mysqli_query($koneksi, $sql2);
            header('location:../index.php?p=tambah');
        } else {
            // echo "Produk tidak ditemukan di database";
            header('location:../index.php?p=tambah&err=produk_tidak_ditemukan');
        }
    } else if ($_POST['aksi'] == 'tambah-keranjang-bynama') {
        $ProdukID = $_POST['ProdukID'];
        $Jumlah = $_POST['Jumlah'];
        $id_user = $_SESSION['id'];

        $sql3 = "SELECT * FROM keranjang WHERE ProdukID=$ProdukID AND id_user=$id_user";
        $query3 = mysqli_query($koneksi, $sql3);

        $duplikat = mysqli_num_rows($query3);
        if ($duplikat == 0) {
            $sql2 = "INSERT INTO keranjang(KeranjangID,ProdukID,Jumlah,id_user) VALUES(DEFAULT,$ProdukID,$Jumlah,$id_user)";
        } else {
            $sql2 = "UPDATE keranjang SET Jumlah=Jumlah+$Jumlah WHERE ProdukID=$ProdukID AND id_user=$id_user";
        }
        // echo $sql2;
        mysqli_query($koneksi, $sql2);
        header('location:../index.php?p=tambah');
    } else if ($_POST['aksi'] == 'simpan-penjualan') {
        $id_user = $_SESSION['id'];
        $PelangganID = $_POST['PelangganID'];
        $TanggalPenjual = $_POST['TanggalPenjual'];
        $TotalHarga = $_POST['TotalHarga'];
        $sql1 = "INSERT INTO penjual(PenjualID,TanggalPenjual,TotalHarga,PelangganID) VALUES(DEFAULT,'$TanggalPenjual',$TotalHarga,$PelangganID)";
        // echo $sql1;
        if (mysqli_query($koneksi, $sql1)) {
            // echo "simpan penjualan sukses";

            // mengambil penjualanid dari tabel penjualan
            $sql2 = "SELECT MAX(PenjualID) AS LastID FROM penjual";
            $query2 = mysqli_query($koneksi, $sql2);
            $data = mysqli_fetch_array($query2);
            $PenjualID = $data['LastID'];
            // echo $PenjualID;
            // echo $sql2;

            // menyimpan data produk yang di beli ke tabel detailpenjual yang diambil dari tabel kerajang
            $sql3 = "SELECT keranjang.*,produk.Harga FROM keranjang,produk WHERE keranjang.ProdukID=produk.ProdukID AND id_user=$id_user";
            // echo $sql3;

            $query3 = mysqli_query($koneksi, $sql3);
            while ($keranjang = mysqli_fetch_array($query3)) {
                $ProdukID = $keranjang['ProdukID'];
                $Jumlah = $keranjang['Jumlah'];
                $Harga = $keranjang['Harga'];

                $sql4 = " INSERT INTO detailpenjual (DetailID,PenjualID,ProdukID,JumlahProduk,Harga) values(DEFAULT,$PenjualID,$ProdukID,$Jumlah,$Harga)";
                // echo $sql4. "<br>";
                mysqli_query($koneksi, $sql4);
            }
            // perintah mengosongkan kerajng
            mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_user=$id_user");
            notifikasi($koneksi);
            header('location:../index.php?p=tambah');
        }
    }
}

if ($_GET) {
    if ($_GET['aksi'] == 'hapus-keranjang') {
        $ProdukID = $_GET['ProdukID'];
        $id_user = $_SESSION['id'];
        $sql = "DELETE FROM keranjang WHERE ProdukID=$ProdukID AND id_user=$id_user";
        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=tambah');

    } else if ($_GET['aksi'] == 'hapus') {
        $PenjualID = $_GET['PenjualID'];
        $sql1 = "DELETE FROM penjual WHERE PenjualID=$PenjualID";
        mysqli_query($koneksi, $sql1);

        $sql2 = "DELETE FROM detailpenjual WHERE PenjualID=$PenjualID";
        mysqli_query($koneksi, $sql2);

        notifikasi($koneksi);
        header('location:../index.php?p=histori');
    }
}
