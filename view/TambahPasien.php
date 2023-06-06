<?php


include_once("kontrak/KontrakTambahPasien.php");
include_once("presenter/ProsesTambahPasien.php");

class TambahPasien implements KontrakTambahPasienView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesTambahPasien();
	}

	function tampil()
	{
		$data = null;
		$data .= '<form method="post" action="tambah.php">
		<div class="container mt-5">
		  <div class="card">
			<div class="card-body">
			  <div class="form-group">
				<label for="nik">NIK:</label>
				<input type="text" name="nik" class="form-control" required>
			  </div>
			  <div class="form-group">
				<label for="nama">Nama:</label>
				<input type="text" name="nama" class="form-control" required>
			  </div>
			  <div class="form-group">
				<label for="tempat">Tempat:</label>
				<input type="text" name="tempat" class="form-control" required>
			  </div>
			  <div class="form-group">
				<label for="lahir">Tanggal Lahir:</label>
				<input type="date" name="lahir" class="form-control" required>
			  </div>
			  <div class="form-group">
				<label for="gender">Gender:</label>
				<select name="gender" class="form-control" required>
					<option value="" disabled selected>Select Gender</option>
					<option value="Laki-laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
			</div>
			  <div class="form-group">
				<label for="email">Email:</label>
				<input type="email" name="email" class="form-control" required>
			  </div>
			  <div class="form-group">
				<label for="telp">Telepon:</label>
				<input type="tel" name="telp" class="form-control" required>
			  </div>
			</div>
			<div class="card-footer">
			  <button class="btn btn-success" type="submit" name="add">Submit</button>
			  <button class="btn btn-danger" type="reset">Cancel</button>
			</div>
		  </div>
		</div>
	  </form>';

		// Membaca template skin.html
		$this->tpl = new Template("templates/tambah.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_FORM", $data);
		$this->tpl->replace("DATA_TITLE", "Add");


		// Menampilkan ke layar
		$this->tpl->write();
	}

	function tampilUpdate($id)
	{
    
		$this->prosespasien->prosesDataPasien();
		$listGender = ['Laki-laki', "Perempuan"];
		$dataGender = '<option value="" disabled>Pilih Gender</option>';
		foreach ($listGender as $data) {
      $dataGender .= "<option value=" . $data . " " . (($data == $this->prosespasien->getGender($id)) ? "selected" : " ") . ">" . $data . "</option>";
		}
		$data = null;
		$data .= '<form method="post" action="tambah.php">
    <div class="container mt-5">
		  <div class="card">
			<div class="card-body">
			  <div class="form-group">
        <input type="hidden" name="id" value="' . $this->prosespasien->getId($id) . '" >
				<label for="nik">NIK:</label>
				<input type="text" name="nik" class="form-control" value="' . $this->prosespasien->getNik($id) . '" required>
			  </div>
			  <div class="form-group">
				<label for="nama">Nama:</label>
				<input type="text" name="nama" class="form-control" value="' . $this->prosespasien->getNama($id) . '" required>
			  </div>
			  <div class="form-group">
				<label for="tempat">Tempat:</label>
				<input type="text" name="tempat" class="form-control" value="' . $this->prosespasien->getTempat($id) . '" required>
			  </div>
			  <div class="form-group">
				<label for="lahir">Tanggal Lahir:</label>
				<input type="date" name="lahir" class="form-control" value="' . $this->prosespasien->getTl($id) . '" required>
			  </div>
			  <div class="form-group">
				<label for="gender">Gender:</label>
				<select name="gender" class="form-control" value="' . $this->prosespasien->getGender($id) . '" required>
					DATA_GENDER
				</select>
			</div>
			  <div class="form-group">
				<label for="email">Email:</label>
				<input type="email" name="email" class="form-control" value="' . $this->prosespasien->getEmail($id) . '" required>
			  </div>
			  <div class="form-group">
				<label for="telp">Telepon:</label>
				<input type="tel" name="telp" class="form-control" value="' . $this->prosespasien->getTelp($id) . '" required>
			  </div>
			</div>
			<div class="card-footer">
			  <button class="btn btn-success" type="submit" name="update">Update</button>
			  <button class="btn btn-danger" type="reset">Cancel</button>
			</div>
		  </div>
		</div>
	  </form>';

		// Membaca template skin.html
		$this->tpl = new Template("templates/tambah.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_FORM", $data);
		$this->tpl->replace("DATA_TITLE", "Update");
		$this->tpl->replace("DATA_GENDER", $dataGender);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function add($data)
	{
		$this->prosespasien->add($data);
	}

	function update($data)
	{
		$this->prosespasien->update($data);
	}
}
