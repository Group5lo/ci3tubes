<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Transaksi_model extends CI_Model {

        function __construct()
        {
            parent::__construct();
        }

        public function get_all_gadget( $limit = FALSE, $offset = FALSE ) {
            if ( $limit ) {
                $this->db->limit($limit, $offset);
            }
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

        public function get_transaksi_by_slug($slug)
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
    }