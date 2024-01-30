<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Histori</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">penjualan</a></li>
                        <li class="breadcrumb-item active">produk</li>
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
                    <h5>Data penjualan</h5>
                </div>
                <div class="card-body">

                    <table id="example1" class="table table-hover">
                        <thead class="bg-danger">
                            <th>ID</th>
                            <th>tanggal penjualan</th>
                            <th>pelanggan</th>
                            <th>total belanja</th>
                            <th>Aksi</th>
                        </thead>

                        <?php
                        $sql = "SELECT penjual.*,pelanggan.NamaPelanggan FROM penjual,pelanggan WHERE penjual.PelangganID=pelanggan.PelangganID";
                        $query = mysqli_query($koneksi, $sql);
                        while ($kolom = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?= $kolom['PenjualID']; ?></td>
                                <td><?= $kolom['TanggalPenjual']; ?></td>
                                <td><?= $kolom['NamaPelanggan']; ?></td>
                                <td><?= number_format($kolom['TotalHarga']); ?></td>
                                <td>
                                    <!-- tombol prnt nota -->
                                    <a href="pdf/output/nota_jual.php?PenjualID=<?= $kolom['PenjualID']; ?>" target="_blank"><i class="fas fa-print"></i></a> |

                                    <!-- tombol prnt informasi -->
                                    <a href="index.php?p=infojual&PenjualID=<?= $kolom['PenjualID'];?>"><i class="fas fa-search"></i></a> |

                                    <!-- tombol prnt hapus -->
                                    <a href="aksi/penjualan.php?aksi=hapus&PenjualID=<?=$kolom['PenjualID']; ?>" onclick="return confirm('yakin akan hapus data ini??')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>


                            <!-- modal rubah periode -->
                            <div class="modal fade" id="modalUbah<?= $kolom['ProdukID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah User</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="aksi/produk.php" method="post">
                                                <input type="hidden" name="aksi" value="ubah">
                                                <input type="hidden" name="ProdukID" value="<?= $kolom['ProdukID']; ?>">

                                                <label for="Barcode">Barcode</label>
                                                <input type="text" name="Barcode" value="<?= $kolom['Barcode']; ?>" class="form-control" required>

                                                <label for="NamaProduk">Nama Produk</label>
                                                <input type="text" name="NamaProduk" value="<?= $kolom['NamaProduk']; ?>" class="form-control" required>

                                                <label for="Harga">Harga</label>
                                                <input type="text" name="Harga" value="<?= number_format($kolom['Harga']); ?>" class="form-control" required>

                                                <label for="Stok">Stok</label>
                                                <input type="Stok" name="Stok" value="<?= $kolom['Stok']; ?>" class="form-control" required>

                                                <br>
                                                <button type="submit" class="btn btn-block bg-danger"><i class="fas fa-save"></i></button>

                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php
                        }
                        ?>

                    </table>

                    <a href="index.php?p=tambah"><button type="button" class="btn bg-danger btn-block" ><i class="fas fa-plus"></i>Tambah penjualan</button></a>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal tambah periode -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">tambah user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="aksi/produk.php" method="post">
                    <input type="hidden" name="aksi" value="tambah">
                    <input type="hidden" name="ProdukID">

                    <label for="Barcode">Barcode</label>
                    <input type="text" name="Barcode" class="form-control" required>

                    <label for="NamaProduk">NamaProduk</label>
                    <input type="text" name="NamaProduk" class="form-control" required>

                    <label for="Harga">Harga</label>
                    <input type="text" name="Harga" class="form-control" required>

                    <label for="Stok">Stok</label>
                    <input type="Stok" name="Stok" class="form-control" required>

                    <br>
                    <button type="submit" class="btn btn-block bg-danger"><i class="fas fa-save"></i></button>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>