<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_all_user()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('id_user');

        $query = $this->db->get('user');
        return $query->result();
    }

    public function create_user()
    {

        return $this->db->insert('user', $data);
    }

    // Dapatkan kategori berdasar ID
    public function get_user_by_id($id)
    {
        $query = $this->db->get_where('user', array('id_user' => $id));
        return $query->row();
    }

    public function update_user($data, $id) 
    {
        if ( !empty($data) && !empty($id) ){
            $update = $this->db->update( 'user', $data, array('id_user'=>$id) );
            return $update ? true : false;
        } else {
            return false;
        }
    }

    public function hapus_user($id)
    {
        if ( !empty($id) ){
            $delete = $this->db->delete('user', array('id_user'=>$id) );
            return $delete ? true : false;
        } else {
            return false;
        }
    }
}
