<?php
class Event_model extends CI_Model
    {
    function get_event_list($limit, $start)
        {
        $this->db->select('a.id_event,a.id_category,a.counter,a.title,a.description,a.date_post,
                a.author,a.foto,a.bahasa,a.tags,
                     b.id_category,b.category,a.status');
     $this->db->from('event a')->join("category b","a.id_category=b.id_category","left");
     $this->db->order_by('id_event', 'ASC');
     $this->db->limit($limit, $start);

     return $this->db->get()->result_array();

    }
    function show_event_id($id_event){
        $query = $this->db->query("select a.id_event,a.id_category,a.counter,a.title,a.description,a.date_post,
                a.author,a.foto,a.bahasa,a.tags,
                     b.id_category,b.category,a.status from event a left join category b on a.id_category=b.id_category where a.id_event=".$id_event);
        $result = $query->result_array();
    return $result;
    }
    function show_event()
    {
        return $this->db->query("select * from event ");

    }
   
    function show_list_category()
    {
        return $this->db->query("select * from category_event order by id_category desc");

    }
   
   
        function multiple_delete() {
		    $action = $this->input->post('action');
		        if ($action == "delete") {
			        $delete = $this->input->post('selected');
			        for ($i=0; $i < count($delete) ; $i++) { 
                         $this->db->where('id_event',$delete[$i]);
                        $query = $this->db->get('event');
                        $row = $query->row();
                        $this->db->where('id_event', $delete[$i]);
                        unlink("./assets/foto/$row->foto");
                        $this->db->delete('event', array('foto' => $delete[$i]));
			     $this->db->where('id_event', $delete[$i]);
		      $this->db->delete('event');
			}
		}
    }
}
