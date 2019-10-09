<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('BlogsModel');
	}
	public function index()
	{
		$blogs = new BlogsModel;
		$data['data'] = $blogs->get_blogs();
		$this->load->view('includes/header');
		$this->load->view('blogs/list',$data);
		$this->load->view('includes/footer');
	}
	public function store()
	{
		$blogs = new BlogsModel;
		$blogs->insert_blog();
		redirect(base_url('blogs'));
	}
	public function create()
	{
		$this->load->view('includes/header');
		$this->load->view('blogs/create');
		$this->load->view('includes/footer');
	}
	public function edit($id)
	{
		$blog = $this->db->get_where('blogs',array('id' => $id))->row();
		$this->load->view('includes/header');
		$this->load->view('blogs/edit',array('blog' => $blog));
		$this->load->view('includes/footer');

	}
	public function update($id)
	{
		$blogs = new BlogsModel;
		$blogs->udpate_blog($id);
		redirect(base_url('blogs'));
	}
	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('blogs');
		redirect(base_url('blogs'));

	}
}
