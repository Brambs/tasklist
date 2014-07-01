<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tasks_model extends CI_Model {

	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    } 

	//List all active task list
	//called from index
	function list_active()
	{
		try
		{
			$this->db->where('status', 1);
			$this->db->order_by('id', 'desc');
			$return=$this->db->get('tasks');
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
			$this->db->order_by('id', 'desc');
			$return=$this->db->get('tasks');
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

	//set a tas as inactive
//callled from checkbox-cheked
function set_inactive($id)
{
	try
	{
		$data = array('status' => 0);
		$this->db->where('id', $id);
		$this->db->update('tasks', $data);
		return 'OK';
	}
	catch(Exception $e)
	{
		throw Exception($e);
	}
}
//Delete all inactive tasks from the DB
//called from inactive- remove all
function remove_all()
{
	try
	{
		$this->db->where('status', 0);
		$this->db->delete('tasks');
		return 'OK';
	}
	catch(Exception $e)
	{
		throw Exception($e);
	}
}

}



/* End of file tasks.php */
/* Location: ./application/models/tasks.php */