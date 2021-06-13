<!-- /.row -->
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title mb-3 mt-2">Data Penyewaaan</h3>
                <div class="card-tools">
                    <div class="input-group-append">
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#test">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead style="text-align: center;">
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Jenis Kamera</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Kembali</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    <tr>
                    <?php 
                        include '../../koneksi.php';
                        $sql = "SELECT * FROM tb_sewa ORDER BY id ASC";
                        $result = mysqli_query($koneksi, $sql);
                        while ($data = mysqli_fetch_assoc($result)) {
                        echo "
                        <tr>
                            <td> $data[id] </td>
                            <td> $data[nama] </td>
                            <td> $data[kamera] </td>
                            <td> $data[tgl_pinjam] </td>
                            <td> $data[tgl_kembali] </td>
                            <td><a href=index.php?page=sewa-edit&id=$data[id]>Edit</a></td>
                            <td><a href=index.php?page=sewa-delete&id=$data[id]>Delete</a></td>
                            </tr>
                            ";}
                            ?>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->

        <!-- Modal -->
    <div class="modal fade" id="test" tabindex="-1" role="dialog" aria-labelledby="test" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="../../page/sewa/sewa-proses.php" method="POST">
              <div class="form-group">
                <label>ID</label>
                <input class="form-control" type="text" name="id" placeholder="Masukkan ID">
              </div>
              <div class="form-group">
                <label>Nama Peminjam</label>
                <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Peminjam">
              </div>
              <div class="form-group">
                <label>Nama Kamera</label>
                <select class="form-control" name="kamera">
                <?php 
                  include '../../koneksi.php';
                  $sql2 = "SELECT * FROM tb_kamera ORDER BY id ASC";
                  $result2 = mysqli_query($koneksi, $sql2);
                  while ($data2 = mysqli_fetch_assoc($result2)) {
                    ?>
                    <option value="<?=$data2['nama']?>"><?=$data2['nama']?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <!-- Date -->
              <div class="form-group">
                <label>Tanggal Pinjam</label>
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" name="tgl_pinjam" data-target="#reservationdate"/>
                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
              </div>
              <!-- Date -->
              <div class="form-group">
                <label>Tanggal Kembali</label>
                  <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" name="tgl_kembali" data-target="#reservationdate2"/>
                      <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
              </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="tambah" value="TAMBAH" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        </div>
    </div>
    </div>