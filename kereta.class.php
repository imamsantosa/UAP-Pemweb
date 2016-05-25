<?php
require_once 'assets/dbase.php';
class Kereta{
	protected $db;

	public function __construct()
	{
		$this->db = Dbase::koneksi();
	}

	public function listKereta()
	{
		$kereta = $this->db->prepare('select * from kereta');
		$kereta->execute();
		return $kereta->fetchAll();
	}

	public function dataKereta($id)
	{
		$kereta = $this->db->prepare('select * from kereta where id_kereta=:id');
		$kereta->execute([
			':id' => $id
			]);
		return $kereta->fetch();
	}

	public function inputKereta($input)
	{
		$new = $this->db->prepare('insert into kereta (nama, jumlah_gerbong, kelas) values (:nama, :jumlah_gerbong, :kelas)');
		$new->execute([
			':nama' => $input['nama'],
			':jumlah_gerbong' => $input['jumlah_gerbong'],
			':kelas' => $input['kelas']
			]);

		return true;
	}
}