<?php 
	class Lenses extends CI_Controller{
		
		public function index(){
			$data['title'] = 'Lenses';

			$data['lenses'] = $this->lenses_model->get_lenses();

			$this->load->view('admin/templates/header');
			$this->load->view('admin/templates/leftbar');
			$this->load->view('admin/lenses/index', $data);
			$this->load->view('admin/templates/footer');
		}

		public function create(){
			$data['title'] = 'Lenses';

			
			$file = $this->input->post('file');
			$merk = $this->input->post('merk');
			$tipe = $this->input->post('tipe');
			$kategori = $this->input->post('kategori');
			$deskripsi = $this->input->post('deskripsi');
			$harga = $this->input->post('harga');

			$config['upload_path'] = './assets/product/lensa';
			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload',$config);

			if ($file='') {

			} else {

				$config['upload_path'] = './assets/product/lensa';
				$config['allowed_types'] = 'gif|jpg|png';

				$this->load->library('upload',$config);

				if (!$this->upload->do_upload('file')) {
					# code...

					$error = array('error' => $this->upload->display_errors());
			
					$this->load->view('admin/templates/header');
					$this->load->view('admin/templates/leftbar');
					$this->load->view('admin/lenses/create', $data);
					$this->load->view('admin/templates/footer');
				} else {
					$file = $this->upload->data('file_name');
					$hasil = $this->lenses_model->create($file, $merk, $tipe, $kategori, $deskripsi, $harga);
                	if($hasil == 1){
                   		$this->session->set_userdata(array('status_logup'=>'oke'));
                    	redirect('admin/lenses/index');
                	} else {
                    redirect('admin/lenses/create');
                	}
                }
			}
		}

		// Delete Customer
		public function delete($id){

			$this->lenses_model->delete_lens($id);

			// Set message
			$this->session->set_flashdata('lens_deleted', 'Your lens has been deleted');

			redirect('admin/lenses');
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