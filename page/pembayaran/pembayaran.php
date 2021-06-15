<!-- /.row -->
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title mb-3 mt-2">Data Pembayaran</h3>
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
                      <th>Customer</th>
                      <th>Tagihan</th>
                      <th>Checkout</th>
                      <th>Status</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    <tr>
                    <?php 
                        include '../../koneksi.php';
                        $sql = "SELECT * FROM tb_bayar ORDER BY id ASC";
                        $result = mysqli_query($koneksi, $sql);
                        while ($data = mysqli_fetch_assoc($result)) {
                        echo "
                        <tr>
                            <td> $data[id] </td>
                            <td> $data[customer] </td>
                            <td> $data[tagihan] </td>
                            <td> $data[tgl_checkout] </td>
                            <td> $data[status] </td>
                            <td><a href=index.php?page=bayar-edit&id=$data[id]>Edit</a></td>
                            <td><a href=index.php?page=bayar-delete&id=$data[id]>Delete</a></td>
                            </tr>
                            ";}
                            ?>
                    </tr>
                  </tbody>
                </table>
                <form class="mt-3" action="../pembayaran/cetak-bayar.php">
                  <button type="submit" class="btn btn-success">Cetak Data Pembayaran</button>
                </form>
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kamera</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="../../page/pembayaran/pembayaran-proses.php" method="POST">
                <div class="form-group">
                    <label>ID</label>
                    <input class="form-control" type="text" name="id" placeholder="Masukkan ID">
                </div>
                <div class="form-group">
                    <label>Nama Customer</label>
                    <select class="form-control" name="customer">
                    <?php 
                    include '../../koneksi.php';
                    $sql2 = "SELECT * FROM tb_sewa ORDER BY id ASC";
                    $result2 = mysqli_query($koneksi, $sql2);
                    while ($data2 = mysqli_fetch_assoc($result2)) {
                        ?>
                        <option value="<?=$data2['nama']?>"><?=$data2['nama']?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Total Tagihan</label>
                    <input class="form-control" type="text" name="tagihan" placeholder="Masukkan Total Tagihan">
                </div>
                <!-- Date -->
                <div class="form-group">
                    <label>Tanggal Checkout</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="tgl_checkout" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="Belum Lunas">Belum Lunas</option>
                        <option value="Lunas">Lunas</option>
                    </select>
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