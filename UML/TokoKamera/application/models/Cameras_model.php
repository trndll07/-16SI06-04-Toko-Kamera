<?php
    class Cameras_model extends CI_Model{
       
        public function register($username, $fullname, $email, $password, $phone, $address){
            // Customers data array
            $data = array(
                'merk_kamera' => $merk,
                'file_kamera' => $file,
                'tipe_kamera' => $tipe,
                'kategori_kamera' => $kategori,
                'deksripsi_kamera' => $deksripsi,
                'harga_kamera' => $harga
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

        public function get_cameras(){
            $this->db->order_by('id_kamera');
            $query = $this->db->get('kamera');
            return $query->result_array();
        }

        // Create Customer
        public function create($file,$merk,$tipe,$kategori,$deskripsi,$harga){
            // Customers data array
            $data = array(

                'file_kamera' => $file,
                'merk_kamera' => $merk,
                'tipe_kamera' => $tipe,
                'kategori_kamera' => $kategori,
                'deskripsi_kamera' => $deskripsi,
                'harga_kamera' => $harga
            );

            // Insert Customer
            return $this->db->insert('kamera', $data);
        }

        // Delete Customer
        public function delete_camera($id){

            //Delete Customer
            $this->db->where('id_kamera', $id);
            $this->db->delete('kamera');
            return true;
        }

        
    }