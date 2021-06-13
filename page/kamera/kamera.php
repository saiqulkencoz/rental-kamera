<!-- /.row -->
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title mb-3 mt-2">Data Kamera</h3>
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
                      <th>Nama Kamera</th>
                      <th>Brand Kamera</th>
                      <!-- <th colspan="2">Action</th> -->
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    <tr>
                    <?php 
                        include '../../koneksi.php';
                        $sql = "SELECT * FROM tb_kamera ORDER BY id ASC";
                        $result = mysqli_query($koneksi, $sql);
                        while ($data = mysqli_fetch_assoc($result)) {
                        echo "
                        <tr>
                            <td> $data[id] </td>
                            <td> $data[nama] </td>
                            <td> $data[brand] </td>
                            </tr>
                            ";}
                            ?>
                            <!-- <td><a href=sewa-edit.php?id=$data[id]>Edit</a> </td>
                            <td><a href=sewa-delete.php?id=$data[id]>Delete</td> -->
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