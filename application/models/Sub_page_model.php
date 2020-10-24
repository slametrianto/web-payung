<?php
class Sub_page_model extends CI_Model
    {
        function get_sub_page_list($limit, $start)
    {
       
$this->db->select('a.lang,a.id_sub_page,a.id_page,a.counter,a.title,a.description,a.date_post,
                a.author,a.foto,
                     b.id_page,b.page,a.status');
     $this->db->from('sub_page a')->join("page b","a.id_page=b.id_page","left");
     $this->db->order_by('id_sub_page', 'ASC');
     $this->db->limit($limit, $start);

     return $this->db->get()->result_array();

    }
    function show_sub_page_id($id_sub_page){
        $query = $this->db->query("select a.lang,a.id_sub_page,a.id_page,a.counter,a.title,a.description,a.date_post,
                a.author,a.foto,
                     b.id_page,b.page,a.status from sub_page a left join page b on a.id_page=b.id_page where a.id_sub_page=".$id_sub_page);
        $result = $query->result_array();
    return $result;
    }
    function show_page()
    {
        return $this->db->query("select * from page ");

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
    function show_list_page()
    {
        return $this->db->query("select * from page order by id_page desc");

    }
   
   
        function multiple_delete() {
		    $action = $this->input->post('action');
		        if ($action == "delete") {
			        $delete = $this->input->post('selected');
			        for ($i=0; $i < count($delete) ; $i++) { 
                         $this->db->where('id_sub_page',$delete[$i]);
                        $query = $this->db->get('sub_page');
                        $row = $query->row();
                        $this->db->where('id_sub_page', $delete[$i]);
                        unlink("./assets/foto/$row->foto");
                        $this->db->delete('sub_page', array('foto' => $delete[$i]));
			     $this->db->where('id_sub_page', $delete[$i]);
		      $this->db->delete('sub_page');
			}
		}
    }
}
