<?php
include '../../koneksi.php';
if (isset($_POST['tambah'])) {
	$id		    = $_POST['id'];
	$nama		= $_POST['nama'];
	$brand    = $_POST['brand'];

	$sql = "INSERT INTO tb_kamera VALUES (
				'$id',
				'$nama',
				'$brand'
			)";
	if (empty($nama) || empty($brand) || empty($id)) {
		echo "
			<script>
				alert('Pastikan anda mengisi semua data');
				window.location = '../admin/index.php?page=kamera';
			</script>
    	";
	}
	elseif (mysqli_query($koneksi, $sql)){
		echo "
			<script>
				alert('Data berhasil ditambahkan');
				window.location = '../admin/index.php?page=kamera';
			</script>
    	";
	}
	else{
		echo "
			<script>
				alert('Terjadi Kesalahan');
				window.location = '../admin/index.php?page=kamera';
			</script>
    	";
	}
}

elseif (isset($_POST['edit'])){
	$id		    = $_POST['id'];
	$nama		= $_POST['nama'];
	$brand    = $_POST['brand'];

	$sql = "UPDATE tb_kamera SET
				nama = '$nama' , 
				brand = '$brand'
				WHERE id = '$id'
			";

	if (mysqli_query($koneksi, $sql)){
		echo "
			<script>
				alert('Data berhasil diubah');
				window.location = '../admin/index.php?page=kamera';
			</script>
    	";
	}
	else{
		echo "
			<script>
				alert('Terjadi Kesalahan');
				window.location = '../admin/index.php?page=kamera-edit&id=$id';
			</script>
    	";
	}

}
elseif (isset($_POST['delete'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM tb_kamera WHERE id = '$id'";
	if (mysqli_query($koneksi, $sql)){
		echo "
			<script>
				alert('Data berhasil dihapus');
				window.location = '../admin/index.php?page=kamera';
			</script>
    	";
	}
	else{
		echo "
			<script>
				alert('Terjadi Kesalahan');
				window.location = '../admin/index.php?page=kamera';
			</script>
    	";
	}
}
else{
	header('location: ../admin/index.php?page=kamera');
}
?>
