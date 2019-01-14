<?php
    class Accs_model extends CI_Model{
       
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

        public function get_accs(){
            $this->db->order_by('id_aksesoris');
            $query = $this->db->get('aksesoris');
            return $query->result_array();
        }

        // Create Customer
        public function create($file,$merk,$tipe,$kategori,$deskripsi,$harga){
            // Customers data array
            $data = array(

                'file_aksesoris' => $file,
                'merk_aksesoris' => $merk,
                'tipe_aksesoris' => $tipe,
                'kategori_aksesoris' => $kategori,
                'deskripsi_aksesoris' => $deskripsi,
                'harga_aksesoris' => $harga
            );

            // Insert Customer
            return $this->db->insert('aksesoris', $data);
        }

        // Delete Customer
        public function delete_acc($id){

            //Delete Customer
            $this->db->where('id_aksesoris', $id);
            $this->db->delete('aksesoris');
            return true;
        }

        
    }