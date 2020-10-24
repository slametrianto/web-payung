<?php
class Webmaster_model extends CI_Model{
	

// Function To Fetch Selected Student Record

	
// Function To Fetch Selected Student Record
function show_user_id($data){
$this->db->select('*');
$this->db->from('master_administrator');
$this->db->where('id_administrator', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}function getwebmaster()
    {
 		return $this->db->query("SELECT * FROM master_administrator");

    }
function get_user_list($limit, $start)
    {
        
        $this->db->select('*');
     $this->db->from('master_administrator');
     $this->db->order_by('id_administrator', 'desc');
     $this->db->limit($limit, $start);

     return $this->db->get()->result_array();
    }
function multiple_delete() {
		$action = $this->input->post('action');
		if ($action == "delete") {
			$delete = $this->input->post('selected');
			for ($i=0; $i < count($delete) ; $i++) { 
				$this->db->where('id_administrator', $delete[$i]);
				$this->db->delete('master_administrator');
			}
		}}
}
