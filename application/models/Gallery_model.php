<?php
class Gallery_model extends CI_Model
    {
    function get_gallery_list($limit, $start)
        {
        $this->db->select('a.client_name,a.client_foto,a.id_gallery,a.id_category,a.counter,a.title,a.description,a.date_post,
                a.author,a.foto,a.lang,a.tags,
                     b.id_category,b.category,a.status');
     $this->db->from('gallery a')->join("category_gallery b","a.id_category=b.id_category","left");
     $this->db->order_by('id_gallery', 'ASC');
     $this->db->limit($limit, $start);

     return $this->db->get()->result_array();

    }
    function show_gallery_id($id_gallery){
        $query = $this->db->query("select a.client_name,a.client_foto,a.id_gallery,a.id_category,a.counter,a.title,a.description,a.date_post,
                a.author,a.foto,a.lang,a.tags,
                     b.id_category,b.category,a.status from gallery a left join category_gallery b on a.id_category=b.id_category where a.id_gallery=".$id_gallery);
        $result = $query->result_array();
    return $result;
    }
    function show_gallery()
    {
        return $this->db->query("select * from gallery ");

    }
    function show_list_category_gallery()
    {
        return $this->db->query("select * from category_gallery order by id_category desc");

    }
   
   
        function multiple_delete() {
		    $action = $this->input->post('action');
		        if ($action == "delete") {
			        $delete = $this->input->post('selected');
			        for ($i=0; $i < count($delete) ; $i++) { 
                         $this->db->where('id_gallery',$delete[$i]);
                        $query = $this->db->get('gallery');
                        $row = $query->row();
                        $this->db->where('id_gallery', $delete[$i]);
                        unlink("./assets/foto/$row->foto");
                        $this->db->delete('gallery', array('foto' => $delete[$i]));
			     $this->db->where('id_gallery', $delete[$i]);
		      $this->db->delete('gallery');
			}
		}
    }
}
