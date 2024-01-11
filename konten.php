<?php

if (empty($_GET['p'])){
    $title= "Sistem Informasi Biaya Pendidikan";
    $konten = "konten/home.php";
}
else if($_GET['p']=='periode'){
    $title= "Data Periode Pendidikan";
    $konten = "konten/periode.php";
}
else if($_GET['p']=='biaya'){
    $title= "Data biaya Pendidikan";
    $konten = "konten/biaya.php";
}
else if($_GET['p']=='siswa'){
    $title= "Data siswa ";
    $konten = "konten/siswa.php";
}
else if($_GET['p']=='user'){
    $title= "Data user ";
    $konten = "konten/user.php";
}


// menu tagihan

else if($_GET['p']=='tagihan'){
    $title= "Data tagihan ";
    $konten = "konten/tagihan.php";
}

else if($_GET['p']=='tagihan-info'){
    $title= "informasi riwayat transaksi tagihan ";
    $konten = "konten/tagihan-info.php";
}

else if($_GET['p']=='tagihan-edit'){
    $title= "ubah data tagihan";
    $konten = "konten/tagihan-edit.php";
}

else if($_GET['p']=='bayar'){
    $title= "Data pembayaran  ";
    $konten = "konten/bayar.php";
}

else if($_GET['p']=='bayar-tambah'){
    $title= "Data pembayaran  siswa ";
    $konten = "konten/bayar-tambah.php";
}

else if($_GET['p']=='bayar-konfirmasi'){
    $title= "Konfirmasi pembayaran  siswa ";
    $konten = "konten/bayar-konfirmasi.php";
}

else if($_GET['p']=='bayar-alokasi'){
    $title= "alokasi pembayaran  siswa ";
    $konten = "konten/bayar-alokasi.php";
}

else if($_GET['p']=='laporan'){
    $title= "laporan siswa ";
    $konten = "konten/laporan.php";
}

else if($_GET['p']=='backup'){
    $title= "backup konten ";
    $konten = "konten/backup.php";
}
else if($_GET['p']=='restore'){
    $title= "restore konten ";
    $konten = "konten/restore.php";
}

// NEW APPKASIR
else if($_GET['p']=='pelanggan'){
    $title= " data pelanggan";
    $konten = "konten/pelanggan.php";
}
else if($_GET['p']=='produk'){
    $title= " dataproduk";
    $konten = "konten/produk.php";
}
else if($_GET['p']=='tambah'){
    $title= " tambah penjualan";
    $konten = "konten/tambah.php";
}



// menu untuk siswa

else if($_GET['p']=='input-bayar'){
    $title= "riwayat pembayaran siswa ";
    $konten = "konten/siswa-input-bayar.php";
}

else if($_GET['p']=='tagihan-info-siswa'){
    $title= "riwayat tagihan siswa ";
    $konten = "konten/tagihan-info-siswa.php";
}

else if($_GET['p']=='bayar-alokasi-siswa'){
    $title= "riwayat bayar siswa ";
    $konten = "konten/bayar-alokasi-siswa.php";
}

else if($_GET['p']=='riwayat'){
    $title= "riwayat pembayaran siswa ";
    $konten = "konten/siswa-riwayat.php";
}
else if($_GET['p']=='siswa-laporan'){
    $title= "Laporan Siswa ";
    $konten = "konten/siswa-laporan.php";
}

// akhir menu untuk siswa



// akhir tgihan
else {
    $title = "Halaman tidak di temukan";
    $konten = "konten/404.php";
}
