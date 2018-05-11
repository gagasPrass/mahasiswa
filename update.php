<?php


include "koneksi.php";
$koneksiObj = new koneksi();
$koneksi = $koneksiObj->ambilKoneksi();


if($koneksi->connect_error) {
	die("koneksi gagal : " . $koneksi->connect_error);
}else{
	echo "Koneksi ke basis data SUKSES!";
}

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];

$query = "UPDATE mahasiswa SET nama = '$nama', jurusan = '$jurusan' WHERE nim = '$nim'";

if($koneksi->query($query) == true) {
	echo "<br>Data " . $_POST["nama"] . " sudah tersimpan. Data bisa dilihat " . '<a href="main.php">disini</a>';
}else{
	echo "error : " . $query . " -> " . $koneksi->error;
}

$koneksi->close();

?>

