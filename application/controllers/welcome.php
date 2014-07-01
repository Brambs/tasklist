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

	public function removeAll()
	{
		$result=$this->tasks_model->remove_all();
		echo $result;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */