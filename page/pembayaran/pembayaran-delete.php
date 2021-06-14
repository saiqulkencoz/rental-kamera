<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Hapus Data Pembayaran</h3>
            </div>
            <div class="card-body">
                <center>
                    <h2 class="mb-4 mt-3">Apakah Anda Yakin ?</h2>
                    <form action="../../page/pembayaran/pembayaran-proses.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                        <input type="submit" class="btn btn-success mt-2 mb-3 mr-3" name="delete" value="YA">
                        <input type="submit" class="btn btn-danger mt-2 mb-3" name="no" value="TIDAK">
                    </form>
                </center>
            </div>
        </div>
    </div>
</section>