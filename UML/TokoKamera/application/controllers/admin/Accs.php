<?php 
	class Accs extends CI_Controller{
		
		public function index(){
			$data['title'] = 'Accs';

			$data['accs'] = $this->accs_model->get_accs();

			$this->load->view('admin/templates/header');
			$this->load->view('admin/templates/leftbar');
			$this->load->view('admin/accs/index', $data);
			$this->load->view('admin/templates/footer');
		}

		public function create(){
			$data['title'] = 'Accs';

			
			$file = $this->input->post('file');
			$merk = $this->input->post('merk');
			$tipe = $this->input->post('tipe');
			$kategori = $this->input->post('kategori');
			$deskripsi = $this->input->post('deskripsi');
			$harga = $this->input->post('harga');

			$config['upload_path'] = './assets/product/aksesoris';
			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload',$config);

			if ($file='') {

			} else {

				$config['upload_path'] = './assets/product/aksesoris';
				$config['allowed_types'] = 'gif|jpg|png';

				$this->load->library('upload',$config);

				if (!$this->upload->do_upload('file')) {
					# code...

					$error = array('error' => $this->upload->display_errors());
			
					$this->load->view('admin/templates/header');
					$this->load->view('admin/templates/leftbar');
					$this->load->view('admin/accs/create', $data);
					$this->load->view('admin/templates/footer');
				} else {
					$file = $this->upload->data('file_name');
					$hasil = $this->accs_model->create($file, $merk, $tipe, $kategori, $deskripsi, $harga);
                	if($hasil == 1){
                   		$this->session->set_userdata(array('status_logup'=>'oke'));
                    	redirect('admin/accs/index');
                	} else {
                    redirect('admin/accs/create');
                	}
                }
			}
		}

		// Delete Customer
		public function delete($id){

			$this->accs_model->delete_acc($id);

			// Set message
			$this->session->set_flashdata('acc_deleted', 'Your acc has been deleted');

			redirect('admin/accs');
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