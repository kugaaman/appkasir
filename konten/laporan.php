<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">laporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">laporan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              
                <p>Laporan Produk</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="pdf/output/laporan_produk.php" target="_blank" class="small-box-footer"> Cetak <i class="fas fa-print"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
            

                <p>Laporan Pelanggan </p>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill "></i>
              </div>
              <a href="pdf/output/laporan_pelanggan.php" target="blank" class="small-box-footer"> cetak <i class="fas fa-print"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
              

                <p>Laporan Penjualan</p>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill"></i>
              </div>
              <a href="#" data-toggle="modal" data-target="#Modalpenjualan" class="small-box-footer"> cetak <i class="fas fa-print"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <p>Laporan penjualan per-produk</p>
              </div>
              <div class="icon">
                <i class="fas fa-exclamation-triangle"></i>
              </div>
              <a href="#" data-toggle="modal" data-target="#modalperproduk" class="small-box-footer"> cetak <i class="fas fa-print"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- modal laporan penjualann -->
  <div class="modal fade" id="Modalpenjualan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">pilih periode laporan pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="pdf/output/laporan_penjualan.php" method="get" target="blank">

          <label for="tanggal_awal">tanggal awal penjualan</label>
          <input type="date" name="tanggal_awal" class="form-control" required>

          <label for="tanggal_akhir">tanggal akhir penjualan</label>
          <input type="date" name="tanggal_akhir" class="form-control" required>
          <br>
          <button type="submit" class="btn btn-block bg-danger"><i class="fas fa-print"></i>cetak</button>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- modal Laporan Pembayran Per produk -->
<div class="modal fade" id="modalperproduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih penjualan dan produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="pdf/output/laporan_penjualan_perproduk.php/" method="get" target="_blank">
          <label for="ProdukID">Pilih Produk</label>
          <select name="ProdukID" class="form-control" required>
            <option value="">-- PiliH PRODUK --</option>
            <?php
            $sql_produk = "SELECT * FROM produk";
            $query_produk = mysqli_query($koneksi, $sql_produk);
            while ($produk = mysqli_fetch_array($query_produk)){
              echo "<option value='$produk[ProdukID]'>$produk[NamaProduk]</option>";
            }
            ?>
          </select>
          <label for="tanggal_awal">Tanggal Awal Penjualan </label>
          <input type="date" name="tanggal_awal" class="form-control" required>

          <label for="tanggal_akhir">Tanggal Akhir Penjualan </label>
          <input type="date" name="tanggal_akhir" class="form-control" required>
          <br>
          <button type="sumbit" class="btn btn-block bg-danger"><i class="fas fa-print"></i>cetak</button>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-blue" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>