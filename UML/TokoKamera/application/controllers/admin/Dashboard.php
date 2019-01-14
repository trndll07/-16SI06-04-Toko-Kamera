<?php

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Dashboard Admin';


		$this->load->view('admin/dashboard', $data);
	}
}

?>