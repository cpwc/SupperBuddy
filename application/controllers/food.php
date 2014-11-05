<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Food extends CI_Controller {

	public function index()
	{
		$caterer = $this->session->userdata('caterer');
		$caterer_id = $caterer['id'];

		if (!$caterer_id) {
			redirect('/caterer/login');
			return;
		}

		$sql = "SELECT * FROM `food` WHERE food.is_deleted = 0 AND food.caterer_id = " . $caterer_id;
		$foods = $this->db->query($sql);

		$data['foods'] = $foods->result();

		$this->load->view('caterer_food_view', $data);
	}

	public function create()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('price', 'Price', 'required');
			
			if ($this->form_validation->run() == FALSE) {
				redirect('/food/create');
			} else {
				if ($this->_create()) {
					$this->session->set_flashdata('status', 1);
					$this->session->set_flashdata('message', 'Food created successfully.');
				} else {
					$this->session->set_flashdata('status', 0);
					$this->session->set_flashdata('message', 'Error creating food. Please try again.');
				}

				redirect('/food');
			}
		} else {
			$this->load->view('caterer_food_create');
		}
	}

	public function edit($food_id = null)
	{
		if (empty($food_id)) {
			redirect('/food');
			return;
		}

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('price', 'Price', 'required');
			
			if ($this->form_validation->run() == FALSE) {
				redirect('/food');
			} else {
				$this->_edit($food_id);
			}
		} else {
			$sql = "SELECT * FROM `food` WHERE id = " . $food_id;
			$food = $this->db->query($sql);
			$data['food'] = $food->row();

			$this->load->view('caterer_food_edit', $data);
		}
	}

	public function detail($food_id)
	{
		if ($this->input->server('REQUEST_METHOD') == 'GET') {
			$sql = "SELECT price FROM `food` WHERE food.is_deleted = 0 AND id = " . $food_id;
			$foods = $this->db->query($sql)->row();

			header('Content-Type: application/json');
			echo json_encode($foods);
		}
	}

	public function delete($food_id)
	{
		$sql = "UPDATE `food` SET food.is_deleted = 1 WHERE food.id = " . $food_id;
		$this->db->query($sql);

		if ($this->db->affected_rows() > 0) {
			$sql = "SELECT * FROM `food` WHERE food.id = " . $food_id;
			$food = $this->db->query($sql);

			$this->session->set_flashdata('status', 1);
			$this->session->set_flashdata('message', 'Food [' . $food->row()->name . '] deleted successfully.');
		} else {
			$sql = "SELECT * FROM `food` WHERE food.id = " . $food_id;
			$food = $this->db->query($sql);

			$this->session->set_flashdata('status', 0);
			$this->session->set_flashdata('message', 'Error deleting Food [' . $food->row()->name . '].');
		}
 
		redirect('/food');
	}

	private function _create()
	{
		$caterer = $this->session->userdata('caterer');
		$caterer_id = $caterer['id'];
		
		if (!$caterer_id) {
			redirect('/caterer/login');
			return;
		}

		$is_deleted = 0;
		$time = date('Y-m-d H:i:s');
		$params = array(
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'is_deleted' => $is_deleted,
			'caterer_id' => $caterer_id,
			'created_at' => $time,
			'updated_at' => $time
		);

		$sql = "INSERT INTO food (name, price, is_deleted, caterer_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";
		$this->db->query($sql, $params);
		
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	private function _edit($food_id)
	{
		$params = array(
				'name' => $this->input->post('name'),
				'price' => $this->input->post('price'),
				'id' => $food_id
			);

		$sql = "UPDATE `food` SET food.name = ?, food.price = ? WHERE food.id = ?";
		$this->db->query($sql, $params);

		if ($this->db->affected_rows() > 0) {
			$sql = "SELECT * FROM `food` WHERE food.id = " . $food_id;
			$food = $this->db->query($sql);

			$this->session->set_flashdata('status', 1);
			$this->session->set_flashdata('message', 'Food [' . $food->row()->name . '] edited successfully.');
		} else {
			$sql = "SELECT * FROM `food` WHERE food.id = " . $food_id;
			$food = $this->db->query($sql);

			$this->session->set_flashdata('status', 0);
			$this->session->set_flashdata('message', 'Error editing Food [' . $food->row()->name . '].');
		}

		redirect('/food');
	}

}

/* End of file food.php */
/* Location: ./application/controllers/food.php */