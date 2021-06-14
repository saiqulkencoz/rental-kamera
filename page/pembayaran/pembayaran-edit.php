<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Pembayaran</h3>
                    </div>
                    <div class="card-body">
                        <form action="../../page/pembayaran/pembayaran-proses.php" method="POST">
                            <?php 
                                include '../../koneksi.php';
                                $id = $_GET['id'];
                                if (!isset($_GET['id'])) {
                                    echo "
                                    <script>
                                        alert('Tidak ada ID yang Terdeteksi');
                                        window.location = '../admin/index.php?page=bayar';
                                    </script>
                                    ";
                                }
                                $sql = "SELECT * FROM tb_bayar WHERE id = '$id'";
                                $result = mysqli_query($koneksi, $sql);
                                $data = mysqli_fetch_assoc($result);
                            ?>
                            <div class="form-group">
                                <label>ID</label>
                                <input class="form-control" type="text" name="id" value="<?=$id?>" placeholder="Masukkan ID" readonly>
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
                                <label>Tagihan</label>
                                <input class="form-control" type="text" name="tagihan" value="<?=$data['tagihan']?>" placeholder="Masukkan Total Tagihan">
                            </div>
                            <!-- Date -->
                            <div class="form-group">
                                <label>Tanggal Checkout</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="tgl_checkout" value="<?=$data['tgl_checkout']?>" data-target="#reservationdate"/>
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