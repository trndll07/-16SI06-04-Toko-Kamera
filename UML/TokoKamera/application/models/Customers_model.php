<?php
    class Customers_model extends CI_Model{
       
        public function register($username, $fullname, $email, $password, $phone, $address){
            // Customers data array
            $data = array(
                'username' => $username,
                'fullname' => $fullname,
                'email' => $email,
                'password' => $password,
                'phone' => $phone,
                'address' => $address
            );

            // Insert customers
            return $this->db->insert('pelanggan', $data);
        }
        

        // Login
        public function login($username, $password){
            // Validate
            $periksa =  $this->db->get_where('pelanggan',array('username' => $username, 'password' => $password));
            if ($periksa->num_rows()>0) {
                return 1;
                } else {
                    return 0;
                }
        }
        

        // Check email exists
        public function check_email_exists($email){
            $query = $this->db->get_where('pelanggan', array('email' => $email));
            if(empty($query->row_array())){
                return true;
            } else {
                return false;
            }
        }


        // Connect to database
        public function __construct(){
            $this->load->database();
        }

        public function get_customers(){
            $this->db->order_by('id_pelanggan');
            $query = $this->db->get('pelanggan');
            return $query->result_array();
        }

        // Create Customer
        public function create($enc_password){
            // Customers data array
            $data = array(
                'name_cus' => $this->input->post('nama'),
                'email_cus' => $this->input->post('email'),
                'password_cus' => $enc_password
            );

            // Insert Customer
            return $this->db->insert('customers', $data);
        }

        // Delete Customer
        public function delete_customer($id){

            //Delete Customer
            $this->db->where('id_pelanggan', $id);
            $this->db->delete('pelanggan');
            return true;
        }

        
    }