<?php 
	class Cameras extends CI_Controller{
		
		public function index(){
			$data['title'] = 'Cameras';

			$data['cameras'] = $this->cameras_model->get_cameras();

			$this->load->view('admin/templates/header');
			$this->load->view('admin/templates/leftbar');
			$this->load->view('admin/cameras/index', $data);
			$this->load->view('admin/templates/footer');
		}

		public function create(){
			$data['title'] = 'Cameras';

			
			$file = $this->input->post('file');
			$merk = $this->input->post('merk');
			$tipe = $this->input->post('tipe');
			$kategori = $this->input->post('kategori');
			$deskripsi = $this->input->post('deskripsi');
			$harga = $this->input->post('harga');

			$config['upload_path'] = './assets/product/kamera';
			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload',$config);

			if ($file='') {

			} else {

				$config['upload_path'] = './assets/product/kamera';
				$config['allowed_types'] = 'gif|jpg|png';

				$this->load->library('upload',$config);

				if (!$this->upload->do_upload('file')) {
					# code...

					$error = array('error' => $this->upload->display_errors());
			
					$this->load->view('admin/templates/header');
					$this->load->view('admin/templates/leftbar');
					$this->load->view('admin/cameras/create', $data);
					$this->load->view('admin/templates/footer');
				} else {
					$file = $this->upload->data('file_name');
					$hasil = $this->cameras_model->create($file, $merk, $tipe, $kategori, $deskripsi, $harga);
                	if($hasil == 1){
                   		$this->session->set_userdata(array('status_logup'=>'oke'));
                    	redirect('admin/cameras/index');
                	} else {
                    redirect('admin/cameras/create');
                	}
                }
			}
		}

		// Delete Customer
		public function delete($id){

			$this->cameras_model->delete_camera($id);

			// Set message
			$this->session->set_flashdata('customer_deleted', 'Your customer has been deleted');

			redirect('admin/cameras');
		}

		


	}

?>