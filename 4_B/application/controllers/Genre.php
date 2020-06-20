<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Genre extends CI_Controller {

	public function index() {
		$data['datagenre'] = $this->db->query("select * from genre")->result_array();
		$this->load->view('genre',$data);
	}
	public function add_genre() {
		$this->load->view('add_genre');
	}
	public function edit_genre($id) {
		$data['datagenre'] = $this->db->query("select id,name from genre where id= '$id' ")->row_array();
		$this->load->view('edit_genre',$data);
	}

	public function action_add_genre() {
		$data = [
			"name" => $this->input->post('genre')
		];
		$this->db->insert('genre', $data);
		redirect('genre');	
	}
	public function action_edit_genre() {
		$id = $this->input->post('id_genre');
		$data = [
			"name" => $this->input->post('genre')
		];
		$this->db->where('id', $id);
		$this->db->update('genre', $data);
		redirect('genre');
	}
	public function action_delete_genre($id) {
		$this->db->query("DELETE FROM genre WHERE id='$id' ");
		redirect('genre');
	}
}
