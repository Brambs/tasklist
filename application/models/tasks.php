<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tasks extends CI_Model {
	//List all active task list
	//called from index
	function list_active()
	{
		try
		{
			$this->db->where('status', 1);
			$return=$this->db->get('taks');
			return $return->result();
		}
		catch(Exception $e)
		{
			throw Exception($e);
		}
		
	}

	//List all inactive taks
	//called from index
	function list_inactive()
	{
		try
		{
			$this->db->where('status', 0);
			$return=$this->db->get('status', 'Inactive');
			return $return->result();
		}
		catch(Exception $e)
		{
			throw Exception($e);
		}
		
	}

	//Add new item
	//called from Section-Active
	function add_item($content)
	{
		try
		{
			$data = array('content' => $content,'status'=>1 );
			$this->db->insert('tasks', $data);
			return 'OK';
		}
		catch(Exception $e){
			throw  Exception($e);
			
		}
		
	}

}

/* End of file tasks.php */
/* Location: ./application/models/tasks.php */