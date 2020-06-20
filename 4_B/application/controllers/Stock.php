<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	public function index() {
		$data['datastock'] = $this->db->query("SELECT transaction.id, transaction.price, transaction.game_id, transaction.stock, game.title
			FROM transaction
			LEFT JOIN game on transaction.game_id = game.id
		")->result_array();
		$this->load->view('stock',$data);
	}
	public function add_stock() {
		$data['datastock'] = $this->db->query("select id,title from game")->result_array();
		$this->load->view('add_stock',$data);
	}
	public function edit_stock($id) {
		$data['datastock'] = $this->db->query("SELECT transaction.id, transaction.price, transaction.game_id, transaction.stock, game.title
			FROM transaction
			LEFT JOIN game on transaction.game_id = game.id
			WHERE transaction.id = '$id' ")->row_array();
		$this->load->view('edit_stock',$data);
	}

	public function action_add_stock() {
		$data = [
			"price" 	=> $this->input->post('price'),
			"stock" 	=> $this->input->post('stock'),
			"game_id"	=> $this->input->post('game_id')
		];
		$this->db->insert('transaction', $data);
		redirect('stock');	
	}
	public function action_edit_stock() {
		$id = $this->input->post('id_product');
		$data = [
			"price" 	=> $this->input->post('price'),
			"stock" 	=> $this->input->post('stock')
		];
		
		$this->db->where('id', $id);
		$this->db->update('transaction', $data);
		redirect('genre');
	}
	public function action_delete_genre($id) {
		$this->db->query("DELETE FROM genre WHERE id='$id' ");
		redirect('genre');
	}
}
