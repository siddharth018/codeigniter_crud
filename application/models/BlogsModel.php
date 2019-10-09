<?php

class BlogsModel extends CI_Model
{
	
	public function get_blogs()
	{
		$query = $this->db->get('blogs');
		return $query->result();
	}
	public function insert_blog()
	{
		 $data = array('title' => $this->input->post('title'),
		 'description' => $this->input->post('description'));
		 return $this->db->insert('blogs',$data);
	}
	public function udpate_blog($id)
	{
		 $data = array('title' => $this->input->post('title'),
		 'description' => $this->input->post('description'));
		 if ($id == 0) {
		 	 return $this->db->insert('blogs',$data);
		 }
		 else {
		 	$this->db->where('id',$id);
		 	return $this->db->insert('blogs',$data);
		 }
	}

}