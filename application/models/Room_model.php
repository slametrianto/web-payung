<?php
class Room_model extends CI_Model
    {
        function get_room_list($limit, $start)
    {
       
$this->db->select('a.bahasa,a.id,a.id_category,a.counter,a.title,a.description,a.date_post,
                a.author,a.foto,
                     b.id_category,b.category,a.status');
     $this->db->from('room a')->join("category_room b","a.id_category=b.id_category","left");
     $this->db->order_by('id', 'ASC');
     $this->db->limit($limit, $start);

     return $this->db->get()->result_array();

    }
    function show_single_room_id($id){
        $query = $this->db->query("select a.bahasa,a.id,a.id_category,a.counter,a.title,a.description,a.date_post,
                a.author,a.foto,
                     b.id_category,b.category,a.status from room a left join category_room b on a.id_category=b.id_category where a.id=".$id);
        $result = $query->result_array();
    return $result;
    }
    function show_category_room()
    {
        return $this->db->query("select * from category_room ");

    }
    function Get_show_article(){   
        return $this->db->query("select article.id_article,article.id_category,article.counter,article.title,article.description,article.date_post,
                article.author,article.foto,
                     category.id_category,category.category,
                            article.status, case when article.status = 1 then 'Publish'
                                when article.status = 0 then 'Non Publish' else 'Draft'
                                    end as status from article 
                            inner join category on article.id_category=category.id_category 
                       where
                article.id_category=category.id_category order by article.date_post asc");
    }
    function getcategory(){
    return $this->db->query("select article.*,category.id_category,category.category
                from article left join category on article.id_category=category.id_category 
                where article.id_category=category.id_category order by rand()");
    }
    function show_list_room()
    {
        return $this->db->query("select * from category_room order by id_category desc");

    }
   
   
        function multiple_delete() {
		    $action = $this->input->post('action');
		        if ($action == "delete") {
			        $delete = $this->input->post('selected');
			        for ($i=0; $i < count($delete) ; $i++) { 
                         $this->db->where('id',$delete[$i]);
                        $query = $this->db->get('sub_page');
                        $row = $query->row();
                        $this->db->where('id', $delete[$i]);
                        unlink("./assets/foto/$row->foto");
                        $this->db->delete('room', array('foto' => $delete[$i]));
			     $this->db->where('id', $delete[$i]);
		      $this->db->delete('room');
			}
		}
    }
}
