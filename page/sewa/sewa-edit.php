<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Sewa</h3>
                    </div>
                    <div class="card-body">
                        <form action="../../page/sewa/sewa-proses.php" method="POST">
                            <?php 
                                include '../../koneksi.php';
                                $id = $_GET['id'];
                                if (!isset($_GET['id'])) {
                                    echo "
                                    <script>
                                        alert('Tidak ada ID yang Terdeteksi');
                                        window.location = '../admin/index.php?page=sewa';
                                    </script>
                                    ";
                                }
                                $sql = "SELECT * FROM tb_sewa WHERE id = '$id'";
                                $result = mysqli_query($koneksi, $sql);
                                $data = mysqli_fetch_assoc($result);
                            ?>
                            <div class="form-group">
                                <label>ID</label>
                                <input class="form-control" type="text" name="id" value="<?=$id?>" placeholder="Masukkan ID" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Peminjam</label>
                                <input class="form-control" type="text" name="nama" value="<?=$data['nama']?>" placeholder="Masukkan Nama">
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
                                    <input type="text" class="form-control datetimepicker-input" name="tgl_pinjam" value="<?=$data['tgl_pinjam']?>" data-target="#reservationdate"/>
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Date -->
                            <div class="form-group">
                                <label>Tanggal Kembali</label>
                                <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="tgl_kembali" value="<?=$data['tgl_kembali']?>" data-target="#reservationdate2"/>
                                    <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="edit" value="UPDATE" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>