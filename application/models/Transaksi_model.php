<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Transaksi_model extends CI_Model {

        function __construct()
        {
            parent::__construct();
                $this->load->helper('MY');
                $this->load->model('gadget_model');
                $this->load->model('brand_model');
                $this->load->model('transaksi_model');
                $this->load->library('session');
        }

        public function get_transaksi()
        {

            $query = $this->db->get('transaksi');
                        
            return $query->result();
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


        public function get_transaksi_by_id($id)
        {
             // Inner Join dengan table brand
            $this->db->select ( '
                gadget_table.*, 
                brand.brand_id as as_brand_id, 
                brand.brand_name,
                brand.brand_description,
            ' );
            $this->db->join('brand', 'brand.brand_id = gadget_table.fk_brand_id');
            $id = $this->session->userdata('post_id') ;

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

        public function insert_transaksi()
        {
            $data = array(
                'nama_pembeli'    => $this->input->post('nama_pembeli'),
                'alamat'          => $this->input->post('alamat'),
                'no_hp'           => $this->input->post('no_hp'),
                'email'           => $this->input->post('email'),
                'nama_barang'     => $this->input->post('nama_barang'),
                'jumlah'          => $this->input->post('jumlah'),
                'harga_satuan'    => $this->input->post('harga_satuan'),
                'total_bayar'     => $this->input->post('total_bayar'),
                'status' => 'baru'
            );

            return $this->db->insert('transaksi', $data);
        }

        public function get_kurang_stock($id){
            $data = array(
                'status' => 'lunas'
            );

            if ( !empty($id) ){
                $update = $this->db->update( 'transaksi', $data, array('id_transaksi'=>$id) );
                return $update ? true : false;
            } else {
                return false;
            }
        }

        public function delete_transaksi($id)
        {
            if ( !empty($id) ){
                $delete = $this->db->delete('transaksi', array('id_transaksi'=>$id) );
                return $delete ? true : false;
            } else {
                return false;
            }
        }
    }