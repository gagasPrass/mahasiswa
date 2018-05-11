<h2>Aplikasi Data Mahasiswa</h2>
<hr>

<?php
include "koneksi.php";
$koneksiObj = new koneksi();
$koneksi = $koneksiObj->ambilKoneksi();


if($koneksi->connect_error) {
	die("koneksi gagal : " . $koneksi->connect_error);
}else{
	echo "";
}

$qry = "select * from mahasiswa";
$data = $koneksi->query($qry);
?>


<table border="1">
	<tr>
		<th>NIM</th>
		<th>NAMA</th>
		<th>JURUSAN</th>
	</tr>

<?php
if($data->num_rows <= 0) {
	echo "<tr><td>";
	echo "DATA BELUM ADA";
	echo "</td></tr>";
}else{
	while($row = $data->fetch_assoc()){
		echo "<tr>";
		echo "<td>" . $row["nim"] . "</td>";
		echo "<td>" . $row["nama"] . "</td>";
		echo "<td>" . $row["jurusan"] . "</td>";
		echo '<td><a href="edit-form.php?nim=' . 
				$row["nim"] . '">Edit</a>';
		echo '<td><a href="hapus.php?nim=' . 
				$row["nim"] . '">Hapus</a>';
		echo "</tr>";
	}
}
?>

</table><br>
<a href="tambah.php"><button type="button">Tambah Data</button></a>