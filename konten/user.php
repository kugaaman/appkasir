<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data Utama</a></li>
            <li class="breadcrumb-item active">User</li>
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
          <h5>Data User</h5>
        </div>
        <div class="card-body">

          <table id="example1" class="table table-hover">
            <thead class="bg-danger">
              <th>ID_user</th>
              <th>Nama</th>
              <th>username</th>
              <th>password</th>
              <th>hak_akses</th>
              <th>Aksi</th>
            </thead>

            <?php
            $sql = "SELECT * FROM user";
            $query = mysqli_query($koneksi, $sql);
            while ($kolom = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?= $kolom['id_user']; ?></td>
                <td><?= $kolom['nama']; ?></td>
                <td><?= $kolom['username']; ?></td>
                <td><?= $kolom['password']; ?></td>
                <td><?= $kolom['hak_akses']; ?></td>
                <td>

                  <!-- tombol edit -->
                  <a href="#" data-toggle="modal" data-target="#modalUbah<?= $kolom['id_user']; ?>"><i class="fas fa-edit"></i></a>

                  &nbsp;

                  <!-- tombol hapus -->
                  <a onclick="return confirm('yakin akan menghapus data ini?')" href="aksi/user.php?aksi=hapus&id_user=<?= $kolom['id_user']; ?>"> <i class="fas fa-trash"></i></a>

                </td>
              </tr>


              <!-- modal rubah periode -->
              <div class="modal fade" id="modalUbah<?= $kolom['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah User</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="aksi/user.php" method="post">
                        <input type="hidden" name="aksi" value="ubah">
                        <input type="hidden" name="id_user" value="<?= $kolom['id_user']; ?>">

                        <label for="nama">nama</label>
                        <input type="text" name="nama" value="<?= $kolom['nama']; ?>" class="form-control" required>

                        <label for="username">username</label>
                        <input type="text" name="username" value="<?= $kolom['username']; ?>" class="form-control" required>

                        <label for="password">password</label>
                        <input type="password" name="password" value="<?= $kolom['password']; ?>" class="form-control" required>

                        <label for="hak_akses">hak akses</label>
                        <select name="hak_akses" class="form-control">
                          <option value="<?= $kolom['hak_akses']; ?>"><?= $kolom['hak_akses']; ?></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select>
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
        <form action="aksi/user.php" method="post">
          <input type="hidden" name="aksi" value="tambah">
          <input type="hidden" name="id_user">

          <label for="nama">nama</label>
          <input type="text" name="nama" class="form-control" required>

          <label for="username">username</label>
          <input type="text" name="username" class="form-control" required>

          <label for="password">password</label>
          <input type="password" name="password" class="form-control" required>

          <label for="hak_akses">hak akses</label>
          <select name="hak_akses" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
          </select>
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

