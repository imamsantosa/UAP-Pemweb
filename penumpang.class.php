<?php
require_once 'assets/dbase.php';
class Penumpang{
	protected $db;

	public function __construct(){
		$this->db = Dbase::koneksi();
	}

	public function updatePenumpang($data)
	{
		$update = $this->db->prepare('update penumpang set nama=:nama, tanggal_lahir=:tanggal_lahir, jenis_kelamin=:jenis_kelamin where id_penumpang=:id');
		$update->execute([
			':nama' => $data['nama'],
			':id' => $data['id'],
			':tanggal_lahir' => $data['tanggal_lahir'],
			':jenis_kelamin' => $data['jenis_kelamin']
			]);

		return true;
	}

	public function deletePenumpang($id)
	{
		$delete = $this->db->prepare('delete from penumpang where id_penumpang=:id');
		$delete->execute([
			':id' => $id 
			]);
		return true;
	}
	public function dataPenumpang($id)
	{
		$kereta = $this->db->prepare('select * from penumpang where id_penumpang=:id');
		$kereta->execute([
			':id' => $id
			]);
		return $kereta->fetch();
	}

	public function listPenumpang($id_kereta)
	{
		$penumpang = $this->db->prepare('select * from penumpang where id_kereta=:id');
		$penumpang->execute([
			':id' => $id_kereta
			]);

		return $penumpang->fetchAll();
	}

	public function inputPenumpang($input)
	{
		$new = $this->db->prepare('insert into penumpang (`nama`, `tanggal_lahir`, `jenis_kelamin`, `id_kereta`) values (:nama, :tanggal_lahir, :jenis_kelamin, :id_kereta)');
		$new->execute([
			':nama' => $input['nama'],
			':tanggal_lahir' => $input['tanggal_lahir'],
			':jenis_kelamin' => $input['jenis_kelamin'],
			':id_kereta' => $input['id_kereta']
			]);

		return true;
	}
}