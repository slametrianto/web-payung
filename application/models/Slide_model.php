<?php
class slide_model extends CI_Model
    {
        function get_slide_list($limit, $start)
    {
        $this->db->select('*');
     $this->db->from('slide');
     $this->db->order_by('id', 'DESC');
     $this->db->limit($limit, $start);

     return $this->db->get()->result_array();
    }
    function show_slide_id($id){
        $query = $this->db->query("select * from slide where id=".$id);
        $result = $query->result_array();
    return $result;
    }
    function Get_show_slide(){   
        return $this->db->query("select * from slide order by slide.id desc");
    }
    function getslide(){
    return $this->db->query("select * from slide order by id desc");
    }
    function show_id_slide($id)
    {
        return $this->db->query("select * from slide where slide.id=".$id);

    }
   

    function show_list_slide()
    {
        return $this->db->query("select * from slide order by id desc");

    }
   
   
        function multiple_delete() {
		    $action = $this->input->post('action');
		        if ($action == "delete") {
			        $delete = $this->input->post('selected');
			        for ($i=0; $i < count($delete) ; $i++) { 
                         $this->db->where('id',$delete[$i]);
                        $query = $this->db->get('slide');
                        $row = $query->row();
                        $this->db->where('id', $delete[$i]);
                        unlink("./assets/foto/$row->foto");
                        $this->db->delete('slide', array('foto' => $delete[$i]));
			     $this->db->where('id', $delete[$i]);
		      $this->db->delete('slide');
			}
		}
    }
}
