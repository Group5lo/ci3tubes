<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Stockprice_model extends CI_Model {

        function __construct()
        {
            parent::__construct();
        }

        public function get_all_stockprice(  ) {
            // Query Manual
            // $query = $this->db->query('
            //      SELECT * FROM stockprice
            //  ');

            // Memakai Query Builder
            // Urutkan berdasar id

            $this->db->order_by('stockprice.id_sh', 'DESC');

            $this->db->join('gadget_table', 'gadget_table.post_id = stockprice.fk_tipe');
            
            $query = $this->db->get('stockprice');

            // Return dalam bentuk object
            return $query->result();
        }

        public function get_total() 
        {
            // Dapatkan jumlah total artikel
            return $this->db->count_all("stockprice");
        }

        public function get_stockprice_by_id($id)
        {
             // Inner Join dengan table gadget
            $this->db->select ( '
                stockprice.*, 
                gadget.gadget_id as as_gadget_id, 
                gadget.gadget_name,
                gadget.gadget_description,
            ' );
            $this->db->join('gadget', 'gadget.gadget_id = stockprice.fk_tipe');

            $query = $this->db->get_where('stockprice', array('stockprice.post_id' => $id));
                        
            return $query->row();
        }

        public function create_stockprice()
        {
             $data = array(
                'fk_tipe'        => $this->input->post('post_id'),
                'stock'          => $this->input->post('stock'),
                'price'          => $this->input->post('price')
            );

            return $this->db->insert('stockprice', $data);
        }

        public function update_stockprice($data, $id) 
        {
            if ( !empty($data) && !empty($id) ){
                $update = $this->db->update( 'stockprice', $data, array('id)sh'=>$id) );
                return $update ? true : false;
            } else {
                return false;
            }
        }

        public function delete_stockprice($id)
        {
            if ( !empty($id) ){
                $delete = $this->db->delete('stockprice', array('id_sh'=>$id) );
                return $delete ? true : false;
            } else {
                return false;
            }
        }

    }