<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Model {


	public function get_artikel(){
        //urutkan berdasarkan tanggal
	   $this->db->order_by('id_magazine');

        $query = $this->db->get('magazine');
        return $query->result();
	}	

	public function get_single($id)
	{
         $this->db->order_by('magazine.id_magazine', 'DESC');
		$query = $this->db->get_where('magazine', array('id_magazine' => $id));
        return $query->row();
	}

      public function get_magazine_by_id($id)
    {
        $query = $this->db->get_where('magazine', array('id_magazine' => $id));
        return $query->row();
    }

    // public function get_gadget_by_slug($slug)
        //{

            // $this->db->order_by('magazine.id_magazine', 'DESC');
            
          //  $query = $this->db->get_where('magazine', array('post_slug' => $slug));

            // Karena datanya cuma 1, kita return cukup via row() saja
         //   return $query->row();
       // }


    public function update_magazine($data, $id) 
        {
            if ( !empty($data) && !empty($id) ){
                $update = $this->db->update( 'magazine', $data, array('id_magazine'=>$id) );
                return $update ? true : false;
            } else {
                return false;
            }
        }

	 public function create_magazine($data)
        {
            return $this->db->insert('magazine', $data);
        }

 	public function delete($id)
        {
            if ( !empty($id) ){
                $delete = $this->db->delete('magazine', array('id_magazine'=>$id) );
                return $delete ? true : false;
            } else {
                return false;
            }
        }
	
      public function get_magazine_by_slug($slug)
        {

             // Inner Join dengan table category
            $this->db->select ( '
                magazine.*, 
                category.id_category as as_category_id, 
                category.category_name,
                category.category_description,
            ' );
            $this->db->join('category', 'category.id_category = category.fk_id_category');
            
            $query = $this->db->get_where('magazine', array('post_slug' => $slug));

            // Karena datanya cuma 1, kita return cukup via row() saja
            return $query->row();
        }
    
    public function get_magazine_by_category($as_category_id)
        {

            $this->db->order_by('magazine.id_magazine', 'DESC');

            $this->db->join('category', 'category.id_category = magazine.fk_id_category');
            $query = $this->db->get_where('magazine', array('id_category' => $as_category_id));
      
            return $query->result();
        }
}