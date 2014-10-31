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

		$this->load->view('food_view', $data);
	}

	public function create()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('price', 'Price', 'required');
			
			if ($this->form_validation->run() == FALSE) {
				redirect('/food/create');
			} else {
				$this->_create();
			}
		} else {
			$this->load->view('caterer_food');
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

	public function delete($id)
	{
		$sql = "UPDATE `food` SET food.is_deleted = 1 WHERE food.id = " . $id;
		$this->db->query($sql);

		echo $this->db->affected_rows();
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
		
		echo $this->db->affected_rows();
	}

}

/* End of file food.php */
/* Location: ./application/controllers/food.php */