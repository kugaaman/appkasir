<?php
session_start();
include "../koneksi.php";
include "../function.php";
if ($_POST) {

    if($_POST['aksi']=='tambah-keranjang-bybarcode'){
        $id_user=$_SESSION['id'];
        $Barcode=$_POST['Barcode'];
        $Jumlah=$_POST['Jumlah'];


        // temukan produk berdasarkan barcode
        $sql1="SELECT * FROM produk WHERE Barcode='$Barcode'";
        $query1=mysqli_query($koneksi,$sql1);
        $Produk=mysqli_fetch_array($query1);
        
        if(mysqli_num_rows($query1)>=1){
        // echo "produk ditemukan di database";
        $ProdukID=$Produk['ProdukID'];
        // cek keranjang bila produk sudah ada hanya mengupdate jumlah , bila belum ada akan instert data
        $sql3="SELECT * FROM keranjang WHERE ProdukID=$ProdukID AND id_user=$id_user";
        $query3=mysqli_query($koneksi,$sql3);

        $duplikat=mysqli_num_rows($query3);
        if($duplikat==0){
            $sql2="INSERT INTO keranjang(KeranjangID,ProdukID,Jumlah,id_user) VALUES(DEFAULT,$ProdukID,$Jumlah,$id_user)";
        } else {
            $sql2="UPDATE keranjang SET Jumlah=Jumlah+$Jumlah WHERE ProdukID=$ProdukID AND id_user=$id_user";
        }
        // echo $sql2;
        mysqli_query($koneksi,$sql2);
        header('location:../index.php?p=tambah');
    } else {
        // echo "Produk tidak ditemukan di database";
        header('location:../index.php?p=tambah&err=produk_tidak_ditemukan');
    }

    }
    else if ($_POST['aksi']=='tambah-keranjang-bynama'){
        $ProdukID=$_POST['ProdukID'];
        $Jumlah=$_POST['Jumlah'];
        $id_user=$_SESSION['id'];

        $sql3="SELECT * FROM keranjang WHERE ProdukID=$ProdukID AND id_user=$id_user";
        $query3=mysqli_query($koneksi,$sql3);

        $duplikat=mysqli_num_rows($query3);
        if($duplikat==0){
            $sql2="INSERT INTO keranjang(KeranjangID,ProdukID,Jumlah,id_user) VALUES(DEFAULT,$ProdukID,$Jumlah,$id_user)";
        } else {
            $sql2="UPDATE keranjang SET Jumlah=Jumlah+$Jumlah WHERE ProdukID=$ProdukID AND id_user=$id_user";
        }
        // echo $sql2;
        mysqli_query($koneksi,$sql2);
        header('location:../index.php?p=tambah');

    }
    else if($_POST['aksi']=='simpan-penjualan'){
            $id_user=$_SESSION['id'];
            $PelangganID=$_POST['PelangganID'];
            $TanggalPenjual=$_POST['TanggalPenjual'];
            $TotalHarga=$_POST['TotalHarga'];
            $sql1="INSERT INTO penjual(PenjualID,TanggalPenjual,TotalHarga,PelangganID) VALUES(DEFAULT,'$TanggalPenjual',$TotalHarga,$PelangganID)";
            // echo $sql1;
            if(mysqli_query($koneksi,$sql1)){
                echo "simpan penjualan sukses";
            }
        }
}

if ($_GET) {
    if ($_GET['aksi'] == 'hapus-keranjang') {
        $ProdukID = $_GET['ProdukID'];
        $id_user=$_SESSION['id'];
        $sql = "DELETE FROM keranjang WHERE ProdukID=$ProdukID AND id_user=$id_user";
        mysqli_query($koneksi, $sql);
        notifikasi($koneksi);
        header('location:../index.php?p=tambah');
    }
}
