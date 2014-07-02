<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('tasks_model');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function addtask()
	{
		$content=$this->input->post('content');
		$result = $this->tasks_model->add_item($content);
		echo $result;
		//echo "wazaaa";
	}

	public function active()
	{
		$result=$this->tasks_model->list_active();
		echo json_encode($result);
	}

	public function inactive()
	{
		$result=$this->tasks_model->list_inactive();
		echo json_encode($result);
	}

	public function setactive()
	{
		$id = $this->input->post('id');
		$result = $this->tasks_model->set_active($id);
		echo $result;
	}

	public function setinactive()
	{
		$id=$this->input->post('id');
		$result=$this->tasks_model->set_inactive($id);
		echo $result;
	}

	public function removeall()
	{
		$result=$this->tasks_model->remove_all();
		echo $result;
	}

	public function updatecontent()
	{
		$id=$this->input->post('id');
		$content=$this->input->post('content');
		$result = $this->tasks_model->update_content($id,$content);
		echo $result;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */