<?php
class Article_model extends CI_Model
    {
    function get_article_list($limit, $start)
        {
        $this->db->select('a.*,b.*');
     $this->db->from('master_article a')->join("master_category_article b","a.id_category_article=b.id_category_article","left");
     $this->db->order_by('a.id_article', 'DESC');
     $this->db->limit($limit, $start);

     return $this->db->get()->result_array();

    }
    function show_article_id($id_article){
        $query = $this->db->query("select a.*,b.* from master_article a left join master_category_article b on a.id_category_article=b.id_category_article where a.id_article=".$id_article);
        $result = $query->result_array();
    return $result;
    }
    function show_article()
    {
        return $this->db->query("select * from master_article ");

    }
    function Get_show_article(){   
        return $this->db->query("select master_article.id_article,master_article.id_category_article,master_article.counter,master_article.title,master_article.description,master_article.date_post,
                master_article.author,master_article.foto,
                     master_category_article.id_category_article,master_category_article.category,
                            master_article.status, case when master_article.status = 1 then 'Publish'
                                when master_article.status = 0 then 'Non Publish' else 'Draft'
                                    end as status from master_article 
                            inner join master_category_article on master_article.id_category_article=master_category_article.id_category_article 
                       where
                master_article.id_category_article=master_category_article.id_category_article order by master_article.date_post asc");
    }
    function getcategory(){
    return $this->db->query("select master_article.*,master_category_article.id_category_article,master_category_article.category
                from master_article left join master_category_article on master_article.id_category_article=master_category_article.id_category_article 
                where master_article.id_category_article=master_category_article.id_category_article order by master_category_article.id_category_article desc");
    }
    function show_list_category()
    {
        return $this->db->query("select * from master_category_article order by id_category_article desc");

    }
   
   
        function multiple_delete() {
		    $action = $this->input->post('action');
		        if ($action == "delete") {
			        $delete = $this->input->post('selected');
			        for ($i=0; $i < count($delete) ; $i++) { 
                         $this->db->where('id_article',$delete[$i]);
                        $query = $this->db->get('master_article');
                        $row = $query->row();
                        $this->db->where('id_article', $delete[$i]);
                        unlink("./assets/foto/$row->foto");
                        $this->db->delete('article', array('foto' => $delete[$i]));
			     $this->db->where('id_article', $delete[$i]);
		      $this->db->delete('master_article');
			}
		}
    }
}
