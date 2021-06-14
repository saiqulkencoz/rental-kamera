<?php
include '../../koneksi.php';
if (isset($_POST['tambah'])) {
	$id		    = $_POST['id'];
	$customer	= $_POST['customer'];
	$tagihan	= $_POST['tagihan'];
    $tgl_checkout = $_POST['tgl_checkout'];
	$status = $_POST['status'];

	$sql = "INSERT INTO tb_bayar VALUES (
				'$id',
				'$customer',
				'$tagihan',
				'$tgl_checkout',
				'$status'
			)";
	if (empty($id) || empty($customer) || empty($tgl_checkout) || empty($tagihan) || empty($status)) {
		echo "
			<script>
				alert('Pastikan anda mengisi semua data');
				window.location = '../admin/index.php?page=bayar';
			</script>
    	";
	}
	elseif (mysqli_query($koneksi, $sql)){
		echo "
			<script>
				alert('Data berhasil ditambahkan');
				window.location = '../admin/index.php?page=bayar';
			</script>
    	";
	}
	else{
		echo "
			<script>
				alert('Terjadi Kesalahan');
				window.location = '../admin/index.php?page=bayar';
			</script>
    	";
	}
}

elseif (isset($_POST['edit'])){
	$id		    = $_POST['id'];
	$customer	= $_POST['customer'];
	$tagihan	= $_POST['tagihan'];
    $tgl_checkout = $_POST['tgl_checkout'];
	$status = $_POST['status'];

	$sql = "UPDATE tb_bayar SET
				customer = '$customer' , 
				tagihan = '$tagihan' , 
				tgl_checkout = '$tgl_checkout', 
				status = '$status'
				WHERE id = '$id'
			";

	if (mysqli_query($koneksi, $sql)){
		echo "
			<script>
				alert('Data berhasil diubah');
				window.location = '../admin/index.php?page=bayar';
			</script>
    	";
	}
	else{
		echo "
			<script>
				alert('Terjadi Kesalahan');
				window.location = '../admin/index.php?page=bayar-edit&id=$id';
			</script>
    	";
	}

}
elseif (isset($_POST['delete'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM tb_bayar WHERE id = '$id'";
	if (mysqli_query($koneksi, $sql)){
		echo "
			<script>
				alert('Data berhasil dihapus');
				window.location = '../admin/index.php?page=bayar';
			</script>
    	";
	}
	else{
		echo "
			<script>
				alert('Terjadi Kesalahan');
				window.location = '../admin/index.php?page=bayar';
			</script>
    	";
	}
}
else{
	header('location: ../admin/index.php?page=bayar');
}
?>
