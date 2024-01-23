<?php
$PenjualID=$_GET['PenjualID'];
$sql1="SELECT penjual.*,pelanggan.NamaPelanggan FROM penjual,pelanggan WHERE penjual.PelangganID=Pelanggan.PelangganID AND Penjual.PenjualID=$PenjualID";
$query1=mysqli_query($koneksi,$sql1);
$penjual=mysqli_fetch_array($query1);

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">informasi detail penjualan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">penjualan</a></li>
                        <li class="breadcrumb-item"><a href="index.php?p=histori">histori penjualan</a></li>
                        <li class="breadcrumb-item active"> informasi penjualan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5> Informasi penjualan</h5>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-3">
                            Nomor Transaksi
                        </div>

                        <div class="col-md-3">
                            : <?= $penjual['PenjualID']; ?>
                        </div>

                        <div class="col-md-3">
                            Tanggal Transaksi
                        </div>

                        <div class="col-md-3">
                            : <?= $penjual['TanggalPenjual']; ?>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-3">
                            Nama Pelanggan
                        </div>

                        <div class="col-md-3">
                            : <?= $penjual['NamaPelanggan']; ?>
                        </div>

                        <div class="col-md-3">
                            Total Belanja
                        </div>

                        <div class="col-md-3">
                            : Rp. <?= number_format( $penjual['TotalHarga']); ?>
                        </div>

                    </div>

                    <!-- data belanja -->
                    <table class="table">

                    <thead>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>SubTotal</th>
                    </thead>
                    <?php
                    $no=0;
                    $total_item=0;
                    $total_belanja=0;
                    $sql2="SELECT detailpenjual.*,produk.NamaProduk,produk.Barcode FROM detailpenjual,produk WHERE detailpenjual.ProdukID=produk.ProdukID AND detailpenjual.PenjualID=$PenjualID";
                    $query2=mysqli_query($koneksi,$sql2);
                    while($data=mysqli_fetch_array($query2)){
                        $no++;
                        $subtotal=$data['JumlahProduk']*$data['Harga'];
                        $total_item=$total_item+$data['JumlahProduk'];
                        $total_belanja=$total_belanja+$subtotal;
                        echo "
                        <tr>
                        <td>$no</td>
                        <td>$data[NamaProduk]</td>
                        <td>".number_format($data['Harga'])." </td>
                        <td>$data[JumlahProduk]</td>
                        <td>".number_format($subtotal)."</td>
                        <tr>
                        ";
                    }
                    ?>

                    </table>

                </div>
                

            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

