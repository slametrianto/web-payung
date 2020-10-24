<?php
class Page_model extends CI_Model{
	

// Function To Fetch Selected Student Record

	
// Function To Fetch Selected Student Record
function show_user_id($data){
$this->db->select('*');
$this->db->from('page');
$this->db->where('id_page', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}function getpage()
    {
 		return $this->db->query("SELECT * FROM page");

    }
function get_page_data_list($limit, $start)
    {
     $this->db->select('*');
     $this->db->from('page');
     $this->db->order_by('id_page', 'DESC');
     $this->db->limit($limit, $start);

     return $this->db->get()->result_array();
    }
function multiple_delete() {
		$action = $this->input->post('action');
		if ($action == "delete") {
			$delete = $this->input->post('selected');
			for ($i=0; $i < count($delete) ; $i++) { 
				$this->db->where('id_page', $delete[$i]);
				$this->db->delete('page');
			}
		}}
}
