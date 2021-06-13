<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Kamera</h3>
                    </div>
                    <div class="card-body">
                        <form action="../../page/kamera/kamera-proses.php" method="POST">
                            <?php 
                                include '../../koneksi.php';
                                $id = $_GET['id'];
                                if (!isset($_GET['id'])) {
                                    echo "
                                    <script>
                                        alert('Tidak ada ID yang Terdeteksi');
                                        window.location = '../admin/index.php?page=kamera';
                                    </script>
                                    ";
                                }
                                $sql = "SELECT * FROM tb_kamera WHERE id = '$id'";
                                $result = mysqli_query($koneksi, $sql);
                                $data = mysqli_fetch_assoc($result);
                            ?>
                            <div class="form-group">
                                <label>ID</label>
                                <input class="form-control" type="text" name="id" value="<?=$id?>" placeholder="Masukkan ID" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Kamera</label>
                                <input class="form-control" type="text" name="nama" value="<?=$data['nama']?>" placeholder="Masukkan Nama Kamera">
                            </div>
                            <div class="form-group">
                                <label>Brand Kamera</label>
                                <input class="form-control" type="text" name="brand" value="<?=$data['brand']?>" placeholder="Masukkan Nama Brand Kamera">
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