<?php
include 'koneksi.php';
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM tb_admin WHERE username = '$username' AND password = '$password'";
	$result = mysqli_query($koneksi, $sql);

	// echo mysqli_num_rows($result);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			session_start();
			$_SESSION['nama'] = $row['nama'];
			$_SESSION['login'] = true;
			header('location: page/admin/index.php?page=kamera');
		}
	} else {
		echo "
		<script>
			alert('Username atau Password anda Salah, Coba Lagi');
			document.location.href = 'login.php';
		</script>
		";
	}
}
