<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Pasien.class.php");
include_once("model/TabelPasien.class.php");
include_once("view/TampilPasien.php");
include_once("view/TambahPasien.php");


$tp = new TambahPasien();

if (isset($_POST['add'])) {
    $tp->add($_POST);
} else if (isset($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $tp->tampilUpdate($id); // nampilin form update
} else if (isset($_POST['update'])) {
    $tp->update($_POST);
} else {
    $data = $tp->tampil();
}
