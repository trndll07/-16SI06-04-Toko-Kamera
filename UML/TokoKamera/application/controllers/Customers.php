<?php 
    class Customers extends CI_Controller{

        function __construct(){
            parent::__construct();
            $this->load->model('Customers_model');
        }

        public function dashboard(){
            $data['title'] = 'Dashboard Customers';

            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('customers/dashboard', $data);
            $this->load->view('templates/footer');
        }

        public function register(){
            $data['title'] = 'Register Customers';


                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('customers/register', $data);
                $this->load->view('templates/footer');

            if(isset($_POST['submit'])){
                $username = $this->input->post('username');

                $fullname = $this->input->post('fullname');

                $email = $this->input->post('email');

                $password = $this->input->post('password');

                $phone = $this->input->post('phone');

                $address = $this->input->post('address');
                // Login customer
                $hasil = $this->Customers_model->register($username, $fullname, $email, $password, $phone, $address);
                if($hasil == 1){
                    $this->session->set_userdata(array('status_logup'=>'oke'));
                    redirect('Customers/login');
                } else {
                    redirect('Customers/register');
                }
            } else {
            }
        }
/*
            {
                // Encrypt password
                $enc_password = md5($this->input->post('password'));

                $this->Customers_model->register($enc_password);

                // Set message
                $this->session->set_flashdata('customer_registered', 'You are now registered and can log in');

                redirect('customers/register');
            }
*/
    


        // Log in customers
        public function login(){

                $data['title'] = 'Login Customers';

                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('customers/login', $data);
                $this->load->view('templates/footer');
            if(isset($_POST['submit'])){
                $username = $this->input->post('username');
                // Get and encrypt the password
                $password = $this->input->post('password');
                // Login customer
                $hasil = $this->Customers_model->login($username, $password);
                if($hasil == 1){
                    $this->session->set_userdata(array('status_login'=>'oke'));
                    redirect('Pages/view');
                } else {
                    redirect('Customers/login');
                }
            } else {
            }      
        }

        // Log customer out
        public function logout(){
            // Unset customer data
            $this->session->unset_userdata('customer_logged_in');
            $this->session->unset_userdata('id_pelanggan');
            $this->session->unset_userdata('nama_pelanggan');
            $this->session->unset_userdata('email_cus');


            // Set message
            $this->session->set_flashdata('customer_loggedout', 'You are now logged out');

            redirect('customers/login');
        }
/*
        // Check if email exists
        public function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
            if($this->customers_model->check_email_exists($email)){
                return true;
            } else {
                return false;
            }
        }
*/ 
    }
