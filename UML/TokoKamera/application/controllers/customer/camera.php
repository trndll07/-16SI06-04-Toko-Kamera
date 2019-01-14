<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class camera extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('camera_model')

            $data['title'] = 'Dashboard Customers';

            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('customers/dashboard', $data);
            $this->load->view('templates/footer');
        
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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['data'] = $this ->app->get_all('kamera');
		$this->load->view('pages/camera', $data);
	}
}