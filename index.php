<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Pasien.class.php");
include_once("model/TabelPasien.class.php");
include_once("view/TampilPasien.php");


$tp = new TampilPasien();
//jika mendapatkan id haous maka hapus
if (!empty($_GET['id_hapus'])) {
  $id = $_GET['id_hapus'];
  $tp->hapus($id);
}
$data = $tp->tampil();
