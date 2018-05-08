<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_all_category()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('category_name');

        $query = $this->db->get('category');
        return $query->result();
    }

    public function create_category()
    {
        $data = array(
            'category_name'          => $this->input->post('category_name'),
            'category_description'   => $this->input->post('category_description')
        );

        return $this->db->insert('category', $data);
    }

    // Dapatkan kategori berdasar ID
    public function get_category_by_id($id)
    {
        $query = $this->db->get_where('category', array('id_category' => $id));
        return $query->row();
    }

    public function update_category($data, $id) 
    {
        if ( !empty($data) && !empty($id) ){
            $update = $this->db->update( 'category', $data, array('id_category'=>$id) );
            return $update ? true : false;
        } else {
            return false;
        }
    }

    public function hapus_category($id)
    {
        if ( !empty($id) ){
            $delete = $this->db->delete('category', array('id_category'=>$id) );
            return $delete ? true : false;
        } else {
            return false;
        }
    }

      public function generate_category_dropdown()
    {

        // Mendapatkan data ID dan nama kategori saja
        $this->db->select ('
            category.id_category,
            category.category_name
        ');

        // Urut abjad
        $this->db->order_by('category_name');

        $result = $this->db->get('category');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dropdown[''] = 'Please Select';

        if ($result->num_rows() > 0) {
            
            foreach ($result->result_array() as $row) {
                // Buat array berisi 'value' (id kategori) dan 'nama' (nama kategori)
                $dropdown[$row['id_category']] = $row['category_name'];
            }
        }

        return $dropdown;
    }
}
