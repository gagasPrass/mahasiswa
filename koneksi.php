<?php
class koneksi {
	private $server = "localhost";
	private $username = "id4929213_gagasprass";
	private $password = "gagas1997";
	private $db = "id4929213_db_mahasiswa";
	private $hubungan;

	function ambilKoneksi(){
		$hubungan = new mysqli($this->server, $this->username, $this->password, $this->db);
		return $hubungan;

	}

}

?>