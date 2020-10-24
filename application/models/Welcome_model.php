<?php
class Welcome_model extends CI_Model
    {
        function master_count_article(){
        $query = $this->db->query("SELECT * from master_article");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
         function master_administrator(){
        $query = $this->db->query("SELECT * from master_administrator");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    function master_portfolio(){
        $query = $this->db->query("SELECT * from gallery");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }function trending_article(){
            $this->db->select("*");
            $this->db->from("master_article");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('lang','ID')->where("status=1")->order_by('counter','desc')->limit('5');
                }
                else
                {
                $this->db->where('lang','EN')->where("status=1")->order_by('counter','desc')->limit('5');
                }
            $query = $this->db->get();
            return $query->result_array();
    }
        function show_all_tags_article(){
            $this->db->select("*");
            $this->db->from("master_article");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('lang','ID')->where("status=1");
                }
                else
                {
                $this->db->where('lang','EN')->where("status=1");
                }
            $query = $this->db->get();
            return $query->result_array();
        }
        function show_room_detail($id){
        
        $this->db->select("a.id,a.lang,a.id_category,a.title,a.description,a.date_post,a.foto,a.author,a.status,a.counter,b.id_category,b.category");
        $this->db->from("room a");
        $this->db->join("category_room b","a.id_category=b.id_category","left");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('a.lang','ID')->where("a.id",$id)->where("status=1");
                }
                else
                {
                $this->db->where('a.lang','EN')->where("a.id",$id)->where("status=1");
                }
            $query = $this->db->get();
            return $query->result_array();
    }
    function show_article_detail($slug_article){
      
        $this->db->select("a.id_article,a.lang,a.tag,a.id_category_article,a.title,a.description,a.date_post,a.foto,a.author,a.status,coalesce(a.counter, 0)counter,b.id_category_article,b.category_article");
        $this->db->from("master_article a");
        $this->db->join("master_category_article b","a.id_category_article=b.id_category_article","left");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('a.lang','ID')->where("a.slug_article",$slug_article)->where("a.status=1");
                }
                else
                {
                $this->db->where('a.lang','EN')->where("a.slug_article",$slug_article)->where("a.status=1");
                }
            $query = $this->db->get();
            return $query->result_array();
    }
    function search_article($title){
        $this->db->select("a.slug_article,a.id_article,a.lang,a.tag,a.id_category_article,a.title,a.description,a.date_post,a.foto,a.author,a.status,coalesce(a.counter, 0)counter,b.id_category_article,b.category_article");
        $this->db->from("master_article a");
        $this->db->join("master_category_article b","a.id_category_article=b.id_category_article","left");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('a.lang','ID')->like("a.title",$title)->where("a.status=1");
                }
                else
                {
                $this->db->where('a.lang','EN')->like("a.title",$title)->where("a.status=1");
                }
            $query = $this->db->get();
            return $query->result_array();
    }
    function show_article_by_tag($tag){
      

        $this->db->select("a.slug_article,a.id_article,a.lang,a.tag,a.id_category_article,a.title,a.description,a.date_post,a.foto,a.author,a.status,coalesce(a.counter, 0)counter,b.id_category_article,b.category_article");
        $this->db->from("master_article a");
        $this->db->join("master_category_article b","a.id_category_article=b.id_category_article","left");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('a.lang','ID')->like("a.tag",$tag)->where("a.status=1");
                }
                else
                {
                $this->db->where('a.lang','EN')->like("a.tag",$tag)->where("a.status=1");
                }
            $query = $this->db->get();
            return $query->result_array();
    }function show_category_article($category_article){
      

        $this->db->select("a.slug_article,a.id_article,a.lang,a.tag,a.id_category_article,a.title,a.description,a.date_post,a.foto,a.author,a.status,coalesce(a.counter, 0)counter,b.id_category_article,b.category_article");
        $this->db->from("master_article a");
        $this->db->join("master_category_article b","a.id_category_article=b.id_category_article","left");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('a.lang','ID')->where("b.category_article",$category_article)->where("a.status=1");
                }
                else
                {
                $this->db->where('a.lang','EN')->where("b.category_article",$category_article)->where("a.status=1");
                }
            $query = $this->db->get();
            return $query->result_array();
    }
    function show_menu(){

        $this->db->select("a.id_sub_page,a.slug_sub_page,a.lang,a.id_page,a.title,b.page");
            $this->db->from("sub_page a")->join("page b","a.id_page=b.id_page","left");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('a.lang','ID')->where("a.status=1")->order_by("a.id_sub_page","desc");
                }
                else
                {
                $this->db->where('a.lang','EN')->where("a.status=1")->order_by("a.id_sub_page","desc");
                 
                }
            $query = $this->db->get();
            return $query;
    }
    function count_data_gallery(){
        if(get_cookie('lang_is') === 'in'){
            $this->db->where('lang','ID')->where("status=1");
        return $this->db->get('gallery')->num_rows();
            }   
            else
           {
            $this->db->where('lang','EN')->where("status=1");
        return $this->db->get('gallery')->num_rows();
    }
    }
    function show_data_gallery($limit, $start){
             $this->db->select('a.slug_gallery,a.id_gallery,a.id_category,a.counter,a.title,a.description,a.date_post,
                a.author,a.foto,a.lang,a.tags,
                     b.id_category,b.category,a.status');
              $this->db->from('gallery a')->join("category_gallery b","a.id_category=b.id_category","left");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('a.lang','ID')->where("a.status=1");
                }
                else
                {
                $this->db->where('a.lang','EN')->where("a.status=1");
                }
            $this->db->limit($limit, $start);
            $query = $this->db->get();
            return $query->result_array();
        }
function count_data_article(){
        if(get_cookie('lang_is') === 'in'){
            $this->db->where('lang','ID')->where("status=1");
        return $this->db->get('master_article')->num_rows();
            }   
            else
           {
            $this->db->where('lang','EN')->where("status=1");
        return $this->db->get('master_article')->num_rows();
    }
    }
    function show_data_article($limit, $start){
            $this->db->select("*");
            $this->db->from("master_article");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('lang','ID')->where("status=1");
                }
                else
                {
                $this->db->where('lang','EN')->where("status=1");
                 
                }
                $this->db->limit($limit, $start);
            $query = $this->db->get();
            return $query->result_array();
        }
        function show_list_article(){
            $this->db->select("*");
            $this->db->from("master_article");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('lang','ID')->where("status=1");
                }
                else
                {
                $this->db->where('lang','EN')->where("status=1");
                }
            $query = $this->db->get();
            return $query->result_array();
        }
        function count_data_event(){
        if(get_cookie('lang_is') === 'in'){
            $this->db->where('lang','ID')->where("status=1");
        return $this->db->get('event')->num_rows();
            }   
            else
           {
            $this->db->where('lang','EN')->where("status=1");
        return $this->db->get('event')->num_rows();
    }
    }
    function show_list_event($limit, $start){
            $this->db->select("*");
            $this->db->from("event");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('lang','ID')->where("status=1");
                }
                else
                {
                $this->db->where('lang','EN')->where("status=1");
                 
                }
                $this->db->limit($limit, $start);
            $query = $this->db->get();
            return $query->result_array();
        }function show_event_detail($id_event){
        
        $this->db->select("a.id_event,a.lang,a.id_category,a.title,a.description,a.date_post,a.foto,a.author,a.status,a.counter,b.id_category,b.category");
        $this->db->from("event a");
        $this->db->join("category_event b","a.id_category=b.id_category","left");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('a.lang','ID')->where("a.id_event",$id_event)->where("status=1");
                }
                else
                {
                $this->db->where('a.lang','EN')->where("a.id_event",$id_event)->where("status=1");
                }
            $query = $this->db->get();
            return $query->result_array();
    }
    function count_data_room(){
        if(get_cookie('lang_is') === 'in'){
            $this->db->where('lang','ID')->where("status=1");
        return $this->db->get('room')->num_rows();
            }   
            else
           {
            $this->db->where('lang','EN')->where("status=1");
        return $this->db->get('room')->num_rows();
    }
    }
    function show_list_room($limit, $start){
            $this->db->select("*");
            $this->db->from("room");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('lang','ID')->where("status=1");
                }
                else
                {
                $this->db->where('lang','EN')->where("status=1");
                 
                }
                $this->db->limit($limit, $start);
            $query = $this->db->get();
            return $query->result_array();
        }
        function show_gallery_detail($slug_gallery){
          $this->db->select('a.id_gallery,a.id_category,a.client_name,a.slug_gallery,a.client_foto,a.counter,a.title,a.description,a.date_post,
                a.author,a.foto,a.lang,a.tags,
                     b.id_category,b.category,a.status');
     $this->db->from('gallery a')->join("category_gallery b","a.id_category=b.id_category","left");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('a.lang','ID')->where("a.slug_gallery",$slug_gallery)->where("a.status=1");
                }
                else
                {
                $this->db->where('a.lang','EN')->where("a.slug_gallery",$slug_gallery)->where("a.status=1");
                }
            $query = $this->db->get();
            return $query->result_array();
    }
        function show_all_gallery(){
          $this->db->select('a.client_name,a.slug_gallery,a.client_foto,a.id_gallery,a.id_category,a.counter,a.title,a.description,a.date_post,
                a.author,a.foto,a.lang,a.tags,
                     b.id_category,b.category,a.status');
     $this->db->from('gallery a')->join("category_gallery b","a.id_category=b.id_category","left");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('a.lang','ID')->where("a.status=1");
                }
                else
                {
                $this->db->where('a.lang','EN')->where("a.status=1");
                }
            $query = $this->db->get();
            return $query->result_array();
        }
    function show_all_room(){
            $this->db->select("*");
            $this->db->from("room");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('lang','ID')->where("status=1");
                }
                else
                {
                $this->db->where('lang','EN')->where("status=1");
                }
            $query = $this->db->get();
            return $query->result_array();
        }
         function show_latest_article(){
            $this->db->select("*");
            $this->db->from("master_article");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('lang','ID')->where("status=1")->limit(3);
                }
                else
                {
                $this->db->where('lang','EN')->where("status=1")->limit(3);
                }
            $query = $this->db->get();
            return $query->result_array();
        }

        function show_list_category()
    {
        $this->db->select("distinct(a.id_category_article),a.id_category_article,b.category_article,b.id_category_article");
        $this->db->from("master_article a")->join("master_category_article b","a.id_category_article=b.id_category_article","left")->where("a.status=1");
            $query = $this->db->get();
            return $query->result_array();

    }function show_list_category_room()
    {
        $this->db->select("*");
        $this->db->from("category_room");
            $query = $this->db->get();
            return $query->result_array();

    }
    function show_page_detail($slug_sub_page){
        $this->db->select("a.id_sub_page,a.lang,a.id_page,a.title,a.description,a.date_post,a.foto,a.author,a.status,a.counter,b.id_page,b.page");
        $this->db->from("sub_page a");
        $this->db->join("page b","a.id_page=b.id_page","left");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('a.lang','ID')->where("a.slug_sub_page",$slug_sub_page)->where("a.status=1")->order_by("a.id_sub_page","desc");
                }
                else
                {
                $this->db->where('a.lang','EN')->where("a.slug_sub_page",$slug_sub_page)->where("a.status=1")->order_by("a.id_sub_page","desc");
                }
            $query = $this->db->get();
            return $query->result_array();
    }
function slide_active(){
            $this->db->select("*");
            $this->db->from("slide");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('lang','ID')->where("status=1")->order_by("id","desc")->limit(1);
                }
                else
                {
                $this->db->where('lang','EN')->where("status=1")->order_by("id","desc")->limit(1);
                }
            $query = $this->db->get()->result_array();
            return $query;
        }

    function slide_item(){
            $this->db->select("*");
            $this->db->from("slide");
            if(get_cookie('lang_is') === 'in'){
                $this->db->where('lang','ID')->where("status=1")->order_by("id","asc")->limit(3);
                }
                else
                {
                $this->db->where('lang','EN')->where("status=1")->order_by("id","asc")->limit(3);
                }
            $query = $this->db->get();
            return $query->result_array();
        }
    
    
}
