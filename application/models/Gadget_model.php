<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Gadget_model extends CI_Model {

        function __construct()
        {
            parent::__construct();
        }

        public function get_all_gadget() {
            // Query Manual
            // $query = $this->db->query('
            //      SELECT * FROM gadget_table
            //  ');

            // Memakai Query Builder
            // Urutkan berdasar tanggal
            $this->db->order_by('gadget_table.post_date', 'DESC');

            // Inner Join dengan table brand
            $this->db->join('brand', 'brand.brand_id = gadget_table.fk_brand_id');
            
            $query = $this->db->get('gadget_table');

            // Return dalam bentuk object
            return $query->result();
        }

        public function get_gadget_by_id($id)
        {
             // Inner Join dengan table brand
            $this->db->select ( '
                gadget_table.*, 
                brand.brand_id as as_brand_id, 
                brand.brand_name,
                brand.brand_description,
            ' );
            $this->db->join('brand', 'brand.brand_id = gadget_table.fk_brand_id');

            $query = $this->db->get_where('gadget_table', array('gadget_table.post_id' => $id));
                        
            return $query->row();
        }

        public function get_gadget_by_slug($slug)
        {

             // Inner Join dengan table brand
            $this->db->select ( '
                gadget_table.*, 
                brand.brand_id as as_brand_id, 
                brand.brand_name,
                brand.brand_description,
            ' );
            $this->db->join('brand', 'brand.brand_id = gadget_table.fk_brand_id');
            
            $query = $this->db->get_where('gadget_table', array('post_slug' => $slug));

            // Karena datanya cuma 1, kita return cukup via row() saja
            return $query->row();
        }

        public function create_gadget($data)
        {
            return $this->db->insert('gadget_table', $data);
        }

        public function update_gadget($data, $id) 
        {
            if ( !empty($data) && !empty($id) ){
                $update = $this->db->update( 'gadget_table', $data, array('post_id'=>$id) );
                return $update ? true : false;
            } else {
                return false;
            }
        }

        public function delete_gadget($id)
        {
            if ( !empty($id) ){
                $delete = $this->db->delete('gadget_table', array('post_id'=>$id) );
                return $delete ? true : false;
            } else {
                return false;
            }
        }

        public function get_gadget_by_brand($as_brand_id)
        {

            $this->db->order_by('gadget_table.post_id', 'DESC');

            $this->db->join('brand', 'brand.brand_id = gadget_table.fk_brand_id');
            $query = $this->db->get_where('gadget_table', array('brand_id' => $as_brand_id));
      
            return $query->result();
        }
    }