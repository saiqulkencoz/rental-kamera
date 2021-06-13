<?php
include '../../koneksi.php';
if (isset($_POST['tambah'])) {
	$id		    = $_POST['id'];
	$nama		= $_POST['nama'];
	$kamera	    = $_POST['kamera'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
	$tgl_kembali = $_POST['tgl_kembali'];

	$sql = "INSERT INTO tb_sewa VALUES (
				'$id',
				'$nama',
				'$kamera',
				'$tgl_pinjam',
				'$tgl_kembali'
			)";
	if (empty($nama) || empty($kamera) || empty($tgl_pinjam) || empty($tgl_kembali) || empty($id)) {
		echo "
			<script>
				alert('Pastikan anda mengisi semua data');
				window.location = '../admin/index.php?page=sewa';
			</script>
    	";
	}
	elseif (mysqli_query($koneksi, $sql)){
		echo "
			<script>
				alert('Data berhasil ditambahkan');
				window.location = '../admin/index.php?page=sewa';
			</script>
    	";
	}
	else{
		echo "
			<script>
				alert('Terjadi Kesalahan');
				window.location = '../admin/index.php?page=sewa';
			</script>
    	";
	}
}

elseif (isset($_POST['edit'])){
	$id		    = $_POST['id'];
	$nama		= $_POST['nama'];
	$kamera	    = $_POST['kamera'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
	$tgl_kembali = $_POST['tgl_kembali'];

	$sql = "UPDATE tb_sewa SET
				nama = '$nama' , 
				kamera = '$kamera' , 
				tgl_pinjam = '$tgl_pinjam', 
				tgl_kembali = '$tgl_kembali'
				WHERE id = '$id'
			";

	if (mysqli_query($koneksi, $sql)){
		echo "
			<script>
				alert('Data berhasil diubah');
				window.location = '../admin/index.php?page=sewa';
			</script>
    	";
	}
	else{
		echo "
			<script>
				alert('Terjadi Kesalahan');
				window.location = '../admin/index.php?page=sewa-edit&id=$id';
			</script>
    	";
	}

}
elseif (isset($_POST['delete'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM tb_sewa WHERE id = '$id'";
	if (mysqli_query($koneksi, $sql)){
		echo "
			<script>
				alert('Data berhasil dihapus');
				window.location = '../admin/index.php?page=sewa';
			</script>
    	";
	}
	else{
		echo "
			<script>
				alert('Terjadi Kesalahan');
				window.location = '../admin/index.php?page=sewa';
			</script>
    	";
	}
}
else{
	header('location: ../admin/index.php?page=sewa');
}
?>
