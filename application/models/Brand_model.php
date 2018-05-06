<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_model extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_all_brand()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('brand_name');

        $query = $this->db->get('brand');
        return $query->result();
    }

    public function create_brand()
    {
        $data = array(
            'brand_name'          => $this->input->post('brand_name'),
            'brand_description'   => $this->input->post('brand_description')
        );

        return $this->db->insert('brand', $data);
    }

    // Dapatkan kategori berdasar ID
    public function get_brand_by_id($id)
    {
        $query = $this->db->get_where('brand', array('brand_id' => $id));
        return $query->row();
    }

    public function update_brand($data, $id) 
    {
        if ( !empty($data) && !empty($id) ){
            $update = $this->db->update( 'brand', $data, array('brand_id'=>$id) );
            return $update ? true : false;
        } else {
            return false;
        }
    }

    public function delete_brand($id)
    {
        if ( !empty($id) ){
            $delete = $this->db->delete('brand', array('brand_id'=>$id) );
            return $delete ? true : false;
        } else {
            return false;
        }
    }

    public function generate_cat_dropdown()
    {

        // Mendapatkan data ID dan nama kategori saja
        $this->db->select ('
            brand.brand_id,
            brand.brand_name
        ');

        // Urut abjad
        $this->db->order_by('brand_name');

        $result = $this->db->get('brand');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dropdown[''] = 'Please Select';

        if ($result->num_rows() > 0) {
            
            foreach ($result->result_array() as $row) {
                // Buat array berisi 'value' (id kategori) dan 'nama' (nama kategori)
                $dropdown[$row['brand_id']] = $row['brand_name'];
            }
        }

        return $dropdown;
    }
}
