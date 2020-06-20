<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$data['produk'] = $this->db->query("SELECT game.id, game.title, game.image, transaction.price, genre.name, transaction.stock
			FROM game
			INNER JOIN genre on game.genre_id =genre.id
			INNER JOIN transaction on game.id =transaction.game_id
		")->result_array();
		$this->load->view('home',$data);
	}
	public function buy($id) {
		$query = $this->db->query("SELECT transaction.stock FROM transaction WHERE transaction.game_id='$id' ")->row_array();
			foreach ($query as $stock) {}
		if ($stock <= 0) {
			echo "Stok Habis";
		} else {
			$reduction = 1; 					//Setiap pembelian dikurang 1
			$query = $this->db->query("SELECT transaction.stock FROM transaction WHERE transaction.game_id='$id' ")->row_array();
			foreach ($query as $stock) {}		// Array to string
			$result = $stock - $reduction; 		// Pengurangan
			
			$data = [
				"stock" => $result
			];
			echo $result;
			$this->db->where('game_id', $id);
			$this->db->update('transaction', $data);
			redirect('Home');
		}
	}
}
