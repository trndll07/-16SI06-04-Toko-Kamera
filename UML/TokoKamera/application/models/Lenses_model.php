<?php
    class Lenses_model extends CI_Model{
       
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

        public function get_lenses(){
            $this->db->order_by('id_lensa');
            $query = $this->db->get('lensa');
            return $query->result_array();
        }

        // Create Customer
        public function create($file,$merk,$tipe,$kategori,$deskripsi,$harga){
            // Customers data array
            $data = array(

                'file_lensa' => $file,
                'merk_lensa' => $merk,
                'tipe_lensa' => $tipe,
                'kategori_lensa' => $kategori,
                'deskripsi_lensa' => $deskripsi,
                'harga_lensa' => $harga
            );

            // Insert Customer
            return $this->db->insert('lensa', $data);
        }

        // Delete Customer
        public function delete_lens($id){

            //Delete Customer
            $this->db->where('id_lensa', $id);
            $this->db->delete('lensa');
            return true;
        }

        
    }