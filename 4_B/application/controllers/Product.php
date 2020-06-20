<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function index() {
		$data['datastock'] = $this->db->query("SELECT game.id, game.title, genre.name, transaction.stock, transaction.price
			FROM game
			INNER JOIN genre on game.genre_id =genre.id
			INNER JOIN transaction on game.id =transaction.game_id
		")->result_array();
		$this->load->view('product',$data);
	}
	public function add_product() {
		$data['datagenre'] = $this->db->query("select id,name from genre")->result_array();
		$this->load->view('add_product',$data);
	}
	public function edit_product($id) {
		$data['datagenre'] = $this->db->query("select id,name from genre")->result_array();
		$data['dataproduct'] = $this->db->query("select * from game where id= '$id' ")->row_array();
		$this->load->view('edit_product',$data);
	}

	public function action_add_product() {
		$data = [
			"title" 	=> $this->input->post('game'),
			"genre_id" 	=> $this->input->post('genre'),
			"image" 	=> $_FILES['foto']['name']
		];
		$foto = $_FILES['foto']['name'];//image = name, bukan field
			if ($foto) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '4000';
				$config['upload_path'] = './assets/images/product/';

				$this->load->library('upload',$config);
				if($this->upload->do_upload('foto')) {
				} else {
					echo $this->upload->display_errors();
				}
			}
		$this->db->insert('game', $data);
		redirect('product');	
	}
	public function action_edit_product() {
		$id = $this->input->post('id_product');
		$foto = $_FILES['foto']['name'];//image = name, bukan field

		if ($foto) {
			$data = [
				"title" 	=> $this->input->post('game'),
				"genre_id" 	=> $this->input->post('genre'),
				"image" 	=> $_FILES['foto']['name']
			];
		} else {
			$data = [
				"title" 	=> $this->input->post('game'),
				"genre_id" 	=> $this->input->post('genre')
			];
		}

		if ($foto) {
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '4000';
			$config['upload_path'] = './assets/images/product/';

			$this->load->library('upload',$config);
			if($this->upload->do_upload('foto')) {
			} else {
				echo $this->upload->display_errors();
			}
		}
		$this->db->where('id', $id);
		$this->db->update('game', $data);
		redirect('genre');
	}
	public function action_delete_genre($id) {
		$this->db->query("DELETE FROM genre WHERE id='$id' ");
		redirect('genre');
	}
}
