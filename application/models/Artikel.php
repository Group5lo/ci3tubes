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

    // public function get_gadget_by_slug($slug)
        //{

            // $this->db->order_by('magazine.id_magazine', 'DESC');
            
          //  $query = $this->db->get_where('magazine', array('post_slug' => $slug));

            // Karena datanya cuma 1, kita return cukup via row() saja
         //   return $query->row();
       // }

	public function update()
	{
		if ( !empty($data) && !empty($id) ){
                $update = $this->db->update( 'magazine', $data, array('id_magazine'=>$id) );
                return $update ? true : false;
            } else {
                return false;
            }
	}


    public function upload()
    {
        $config['upload_path'] = './img/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']  = '2048';
        $config['remove_space']  = TRUE;
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('image')){
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

	 public function create($upload)
        {
             $data = array(
           'judul_magazine'          => $this->input->post('judul_magazine'),
           'tanggal'   => $this->input->post('tanggal'),
            'content'          => $this->input->post('content'),
            'image'          => $upload['file']['filename'],
             'sumber'          => $this->input->post('sumber')
       );
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
	
}