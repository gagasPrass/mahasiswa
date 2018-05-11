<h2>Form Edit</h2>
<hr>
<form action="update.php" method="post">

<?php
include "koneksi.php";
$koneksiObj = new koneksi();
$koneksi = $koneksiObj->ambilKoneksi();


if($koneksi->connect_error) {
	die("koneksi gagal : " . $koneksi->connect_error);
}else{
	echo "";
}

$qry = "select * from mahasiswa where nim='" . 
	$_GET["nim"] . "'";
$data = $koneksi->query($qry);	

if($data->num_rows <= 0) {
	echo "Mas/Mba. .. Isi data sesuai prosedur!!!";
}else{
	while($hasil = $data->fetch_assoc()){
		global $nama;
		$nama = $hasil["nama"];
		global $jurusan;
		$jurusan = $hasil["jurusan"];
	}

}
?>

<table>
	<tr>
	<td>NIM </td>
		<td>
		: <input type="text" name="nim" readonly="true" value = <?php echo $_GET["nim"];?>></td>
		</tr> 
		<tr>
			<td>NAMA </td>
		<td>: <input type="text" name="nama"
			value=<?php echo $nama?>></td>
		</tr>
	<tr>
		<td>JURUSAN </td> 
		<td>: <input type="text" name="jurusan"
			value=<?php echo $jurusan?>></td>
	</tr>
	
		<td><input type="submit" value="Simpan"></td>
		<td><a href="main.php"><button type="button">Batal</button></a></td>
</table>
</form>