<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data Utama</a></li>
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
                    <h5>Data produk</h5>
                </div>
                <div class="card-body">

                    <table id="example1" class="table table-hover">
                        <thead class="bg-danger">
                            <th>ProdukID</th>
                            <th>Barcode</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
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
                                <td><?= number_format( $kolom['Harga']); ?></td>
                                <td><?= $kolom['Stok']; ?></td>
                                <td>

                                    <!-- tombol edit -->
                                    <a href="#" data-toggle="modal" data-target="#modalUbah<?= $kolom['ProdukID']; ?>"><i class="fas fa-edit"></i></a>

                                    &nbsp;

                                    <!-- tombol hapus -->
                                    <a onclick="return confirm('yakin akan menghapus nama produk ini?')" href="aksi/produk.php?aksi=hapus&ProdukID=<?= $kolom['ProdukID']; ?>"> <i class="fas fa-trash"></i></a>

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
                                                <input type="text" name="Harga" value="<?= number_format($kolom['Harga']) ; ?>" class="form-control" required>

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

                    <button type="button" class="btn bg-danger btn-block mt-3" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus"></i>Tambah Periode Baru</button>
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