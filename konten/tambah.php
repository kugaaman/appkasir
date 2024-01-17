<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Penjualan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Penjaualan</a></li>
                        <li class="breadcrumb-item active">Tambah Penjualan</li>
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
                    <h5>Input Penjualan</h5>
                </div>
                <div class="card-body">

                    <!-- from cari produk -->

                    <div class="form-row">
                        <div class="form-group col-sm-2">
                            <form action="aksi/penjualan.php" method='post'>
                                <input type="hidden" name="aksi" value="tambah-keranjang-bybarcode">


                                <input type="number" name="Jumlah" class="form-control" value="1" placeholder="jumlah...">
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" name="Barcode" class="form-control" placeholder="Barcode...">
                        </div>

                        <div class="form-group col-sm-3">
                            <button class="btn btn-block btn-light" type="submit"><i class="fas fa-barcode"></i>Cari By Barcode</button>
                            </form>
                        </div>

                        <div class="form-group col-sm-3">
                            <button class="btn btn-block btn-danger" type="button" data-toggle="modal" data-target="#cariproduk"><i class="fas fa-tags"></i>Cari By Nama</button>
                        </div>
                    </div>
                    <!-- tutup form carik produk -->

                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-light" align="center">
                                <th>Hapus</th>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th> Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>

                        <?php
                        $no = 0;
                        $total_item = 0;
                        $total_belanja = 0;
                        $id_user = $_SESSION['id'];
                        $sql_keranjang = "SELECT keranjang.*,produk.NamaProduk,produk.Harga FROM keranjang,produk WHERE keranjang.ProdukID=produk.ProdukID AND id_user=$id_user";
                        $query_keranjang = mysqli_query($koneksi, $sql_keranjang);
                        while ($keranjang = mysqli_fetch_array($query_keranjang)) {
                            $no++;
                            $subtotal = $keranjang['Harga'] * $keranjang['Jumlah'];
                            $total_item = $total_item + $keranjang['Jumlah'];
                            $total_belanja = $total_belanja + $subtotal;
                        ?>
                            <tr>
                                <td align="center"><a href="aksi/penjualan.php?aksi=hapus-keranjang&ProdukID=<?= $keranjang['ProdukID']; ?>"><i class="fas fa-trash"></i></a></td>
                                <td><?= $no; ?></td>
                                <td><?= $keranjang['NamaProduk']; ?></td>
                                <td align="center"><?= number_format($keranjang['Harga']); ?></td>
                                <td align="center"><?= number_format($keranjang['Jumlah']); ?></td>
                                <td align="center"><?= number_format($subtotal); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr class="text-bold">
                            <td colspan="4">TOTAL</td>
                            <td align="center"><?= number_format($total_item) ?></td>
                            <td align="center"><?= number_format($total_belanja) ?></td>
                        </tr>


                    </table>

                    <button class="btn btn-block btn- bg-danger mt-3" data-toggle="modal" data-target="#simpanjual"><i class="fas fa-save"></i>Simpan Penjualan</button>

                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal cari produk -->
<div class="modal fade" id="cariproduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">pencarian produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table id="example1" class="table table-hover">
                    <thead class="bg-danger">
                        <th>ProdukID</th>
                        <th>Barcode</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Pilih</th>
                    </thead>

                    <?php
                    $sql = "SELECT * FROM produk";
                    $query = mysqli_query($koneksi, $sql);
                    while ($kolom = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?= $kolom['ProdukID']; ?></td>
                            <td><?= $kolom['Barcode']; ?></td>
                            <td><?= $kolom['NamaProduk']; ?></td>
                            <td><?= number_format($kolom['Harga']); ?></td>
                            <td>
                                <form action="aksi/penjualan.php" method="post">
                                    <input type="hidden" name="aksi" value="tambah-keranjang-bynama">
                                    <input type="hidden" name="ProdukID" value="<?= $kolom['ProdukID'];?>">
                                    <input type="number" name="Jumlah" class="form-control" value="1">
                            </td>

                            <td>
                                <button class="btn btn-danger" type="submit"><i class="fas fa-check"></i>pilih</button>
                            </form>
                            </td>
                        </tr>

                    <?php } ?>
                    </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- modal simpan penjualan  -->
<div class="modal fade" id="simpanjual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">masukan data pelanggan & waktu transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="aksi/penjualan.php" method="post">
                    <input type="hidden" name="aksi" value="simpan-penjualan">
                    <label for="PelangganID">pelanggan</label>
                    <select name="PelangganID" class="form-control" required>
                            <?php
                                $sql1="SELECT * FROM pelanggan";
                                $query1= mysqli_query($koneksi,$sql1);
                                while($pelanggan=mysqli_fetch_array($query1)){
                                    echo "<option value='$pelanggan[PelangganID]'>$pelanggan[NamaPelanggan]</option>";
                                }

                            ?>
                    </select>
                    <label for="TanggalPenjual">tanggal penjualan</label>
                    <input type="date" name="TanggalPenjual" class="form-control" value="<?= date('Y-m-d'); ?>" required>

                    <label for="TotalHarga">total belanja</label>
                    <input type="number" name="TotalHarga" class="form-control" value="<?=$total_belanja; ?>"readonly>

                    <button class="btn btn-danger mt-3 btn-block" type="submit"><i class="fas fa-save">simpan penjualan</i></button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>