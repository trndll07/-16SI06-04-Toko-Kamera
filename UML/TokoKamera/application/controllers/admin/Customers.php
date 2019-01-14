<?php 
	class Customers extends CI_Controller{
		
		public function index(){
			$data['title'] = 'Customers';

			$data['customers'] = $this->customers_model->get_customers();

			$this->load->view('admin/templates/header');
			$this->load->view('admin/templates/leftbar');
			$this->load->view('admin/customers/index', $data);
			$this->load->view('admin/templates/footer');
		}

		public function create(){
			$data['title'] = 'New Customer';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');


			if($this->form_validation->run() === FALSE){
				$this->load->view('admin/templates/header');
				$this->load->view('admin/templates/sidebar');
				$this->load->view('admin/customers/create', $data);
				$this->load->view('admin/templates/footer');
			} else {
				// Encrypt password
				$enc_password = md5($this->input->post('password'));

				$this->customer_model->create($enc_password);

				// Set message
				$this->session->set_flashdata('customer_created', 'You are now created');

				redirect('admin/customers');
			}
		}

		// Delete Customer
		public function delete($id){

			$this->customers_model->delete_customer($id);

			// Set message
			$this->session->set_flashdata('customer_deleted', 'Your customer has been deleted');

			redirect('admin/customers');
		}

		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
			if($this->customer_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}


	}

?>