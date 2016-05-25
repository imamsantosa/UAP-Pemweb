<?php
require_once('penumpang.class.php');
if (!isset($_GET['id'])) {
  header('location: index.php');
}

$id_penumpang = $_GET['id'];
$penumpang = new Penumpang();

if($penumpang->deletePenumpang($id_penumpang)){
  header('location: data.kereta.php?status=success&message=Sukses menghapus penumpang!!!');
} else {
  header('location: data.kereta.php?status=danger&message=gagal menghapus penumpang!!!');
}
?>
  