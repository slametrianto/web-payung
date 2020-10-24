<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    /**
         * Project : PT.PAYUNG ANAK BANGSA 
         * Founder & CEO , Developer : PT. Payung Anak Bangsa , Andre Marbun M.TI, PMP
         * @mail : developerpdak@gmail.com
         * Contack Phone : 085206451636
         * Build date on : 03-08-2020
         */
        public function __construct()
    {
    parent::__construct();      
        header("Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT"); 
        header("Expires: " . gmdate( "D, j M Y H:i:s", time() ) . " GMT"); 
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", FALSE);
        header("Pragma: no-cache");
        $this->load->helper('text');
        $this->load->database();
        $this->load->helper(array('url','html','form','text'));
    $this->load->library(array('form_validation','upload','session','encrypt'));
        $this->load->model('welcome_model');   
        $this->load->database();
    }
    function save_message()
   {
               
                $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>
                                                        x
                                                   </button>", "</button></div>");
        $this->form_validation->set_rules('nama', 'Name', 'required|min_length[3]|max_length[225]');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('description', 'Messages', 'required');

         if ($this->form_validation->run() == FALSE)
        {
             $data['menu'] = $this->welcome_model->show_menu()->result_array();
             $data['mobile_menu'] = $this->welcome_model->show_menu()->result_array();
            $data['slide_active'] = $this->welcome_model->slide_active();
            $data['slide_item'] = $this->welcome_model->slide_item();
            $data['latest_article'] = $this->welcome_model->show_latest_article();
            $data['all_tags'] = $this->welcome_model->show_all_tags_article();
            $data['menu_footer'] = $this->welcome_model->show_menu()->result_array();
            $data['title'] = "PT.PAYUNG ANAK BANGSA";
            $data['main']= "faq";
            $this->load->view('main_v',$data);
        }
        else
        {
           $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'no_hp' => $this->input->post('no_hp'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                 'date_post' => date("Y/m/d H:i:s"),
                'website' => $this->input->post('website'),
                'status' => 0

            );
        $create  = $this->db->insert('faq',$data);
        if ($create) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success, we'll review Your message asap.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
                redirect('page/faq');   
            }
        }
    public function blog()
    {
    $data['menu_footer'] = $this->welcome_model->show_menu()->result_array();
    $config['base_url'] = site_url('page/blog');
        $config['total_rows'] = $this->welcome_model->count_data_article();
        $config['per_page'] = "3";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['list_article'] = $this->welcome_model->show_data_article($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
    $data['menu'] = $this->welcome_model->show_menu()->result_array();
    $data['slide_active'] = $this->welcome_model->slide_active();
    $data['slide_item'] = $this->welcome_model->slide_item();
    $data['latest_article'] = $this->welcome_model->show_latest_article();
    $data['all_tags'] = $this->welcome_model->show_all_tags_article();
    $data['title'] = "PT.PAYUNG ANAK BANGSA";
    $data['main']= "blog";
    $this->load->view('main_v',$data);
    }
    public function gallery()
    {
    $data['menu_footer'] = $this->welcome_model->show_menu()->result_array();
    $config['base_url'] = site_url('page/gallery');
        $config['total_rows'] = $this->welcome_model->count_data_gallery();
        $config['per_page'] = "3";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['list_gallery'] = $this->welcome_model->show_data_gallery($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
    $data['menu'] = $this->welcome_model->show_menu()->result_array();
    $data['slide_active'] = $this->welcome_model->slide_active();
    $data['slide_item'] = $this->welcome_model->slide_item();
    $data['latest_article'] = $this->welcome_model->show_latest_article();
    $data['all_tags'] = $this->welcome_model->show_all_tags_article();
    $data['title'] = "PT.PAYUNG ANAK BANGSA";
    $data['main']= "gallery";
    $this->load->view('main_v',$data);
    }
	public function index()
	{
    $data['menu'] = $this->welcome_model->show_menu()->result_array();
    $data['mobile_menu'] = $this->welcome_model->show_menu()->result_array();
     $data['menu_footer'] = $this->welcome_model->show_menu()->result_array();
	$data['slide_active'] = $this->welcome_model->slide_active();
	$data['slide_item'] = $this->welcome_model->slide_item();
	$data['latest_article'] = $this->welcome_model->show_latest_article();
    $data['all_gallery'] = $this->welcome_model->show_all_gallery();
    $data['all_client'] = $this->welcome_model->show_all_gallery();
	$data['title'] = "PT.PAYUNG ANAK BANGSA";
    $data['main']= "home_v";
    $this->load->view('main_template',$data);
	}
    public function detail($slug_sub_page){
    $data['list_article'] = $this->welcome_model->show_list_article();
    $data['menu_footer'] = $this->welcome_model->show_menu()->result_array();
    $data['mobile_menu'] = $this->welcome_model->show_menu()->result_array();
    $data['menu'] = $this->welcome_model->show_menu()->result_array();
    $data['slide_active'] = $this->welcome_model->slide_active();
    $data['slide_item'] = $this->welcome_model->slide_item();
    $data['latest_article'] = $this->welcome_model->show_latest_article();
    $data['all_tags_article'] = $this->welcome_model->show_all_tags_article();
    $data['page_detail'] = $this->welcome_model->show_page_detail($slug_sub_page);  
    $this->db->set('counter', 'coalesce(counter, 0)+1', FALSE);
    $this->db->where("slug_sub_page",$slug_sub_page);
    $this->db->update('sub_page');  
    $data['title'] = "Corporate";
    $data['main']= "page_detail";
    $this->load->view('main_v',$data);
    }
    public function faq()
    {
    $data['menu_footer'] = $this->welcome_model->show_menu()->result_array();
    $data['menu'] = $this->welcome_model->show_menu()->result_array();
    $data['slide_active'] = $this->welcome_model->slide_active();
    $data['slide_item'] = $this->welcome_model->slide_item();
    $data['latest_article'] = $this->welcome_model->show_latest_article();
    $data['all_tags_article'] = $this->welcome_model->show_all_tags_article();
    $data['title'] = "PT.PAYUNG ANAK BANGSA";
    $data['main']= "faq";
    $this->load->view('main_v',$data);
    }
    public function search_article(){
    $title = $this->input->post('title');
    $data['menu_footer'] = $this->welcome_model->show_menu()->result_array();
    $data['list_article'] = $this->welcome_model->show_list_article();
    $data['list_category'] = $this->welcome_model->show_list_category();
    $data['all_tags_article'] = $this->welcome_model->show_all_tags_article();
    $data['trending_article'] = $this->welcome_model->trending_article();
    $data['article_detail'] = $this->welcome_model->search_article($title); 
    $data['menu'] = $this->welcome_model->show_menu()->result_array();
    $data['slide_active'] = $this->welcome_model->slide_active();
    $data['slide_item'] = $this->welcome_model->slide_item();
    $data['latest_article'] = $this->welcome_model->show_latest_article();
    $data['all_tags'] = $this->welcome_model->show_all_tags_article();
    $data['title'] = "PT.PAYUNG ANAK BANGSA";
    $data['main']= "search_article";
    $this->load->view('main_v',$data);
    }
	public function article_by_tag($tag)
    {
    $pattern = '/-/i';
    $tag = preg_replace($pattern, ' ', $tag);
    // var_dump($category_article);
    $data['menu_footer'] = $this->welcome_model->show_menu()->result_array();
    $data['list_article'] = $this->welcome_model->show_list_article();
    $data['list_category'] = $this->welcome_model->show_list_category();
    $data['all_tags_article'] = $this->welcome_model->show_all_tags_article();
    $data['trending_article'] = $this->welcome_model->trending_article();
    $data['article_detail'] = $this->welcome_model->show_article_by_tag($tag); 
    $data['menu'] = $this->welcome_model->show_menu()->result_array();
    $data['slide_active'] = $this->welcome_model->slide_active();
    $data['slide_item'] = $this->welcome_model->slide_item();
    $data['latest_article'] = $this->welcome_model->show_latest_article();
    $data['all_tags'] = $this->welcome_model->show_all_tags_article();
    $data['title'] = "PT.PAYUNG ANAK BANGSA";
    $data['main']= "article_by_tag";
    $this->load->view('main_v',$data);
    }
    public function category_article($category_article)
    {
    $pattern = '/-/i';
    $category_article = preg_replace($pattern, ' ', $category_article);
    // var_dump($category_article);
    $data['menu_footer'] = $this->welcome_model->show_menu()->result_array();
    $data['list_article'] = $this->welcome_model->show_list_article();
    $data['list_category'] = $this->welcome_model->show_list_category();
    $data['all_tags_article'] = $this->welcome_model->show_all_tags_article();
    $data['trending_article'] = $this->welcome_model->trending_article();
    $data['article_detail'] = $this->welcome_model->show_category_article($category_article); 
    $data['menu'] = $this->welcome_model->show_menu()->result_array();
    $data['slide_active'] = $this->welcome_model->slide_active();
    $data['slide_item'] = $this->welcome_model->slide_item();
    $data['latest_article'] = $this->welcome_model->show_latest_article();
    $data['all_tags'] = $this->welcome_model->show_all_tags_article();
    $data['title'] = "PT.PAYUNG ANAK BANGSA";
    $data['main']= "article_category";
    $this->load->view('main_v',$data);
    }
    public function article_detail($slug_article)
    {
    $data['menu_footer'] = $this->welcome_model->show_menu()->result_array();
    $data['list_article'] = $this->welcome_model->show_list_article();
    $data['list_category'] = $this->welcome_model->show_list_category();
    $data['header_article_detail'] = $this->welcome_model->show_article_detail($slug_article); 
    $data['all_tags_article'] = $this->welcome_model->show_all_tags_article();
    $data['trending_article'] = $this->welcome_model->trending_article();
    $data['article_detail'] = $this->welcome_model->show_article_detail($slug_article); 
    $this->db->set('counter', 'coalesce(counter, 0)+1', FALSE);
    $this->db->where("slug_article",$slug_article);
    $this->db->update('master_article');
    $data['menu'] = $this->welcome_model->show_menu()->result_array();
    $data['slide_active'] = $this->welcome_model->slide_active();
    $data['slide_item'] = $this->welcome_model->slide_item();
    $data['latest_article'] = $this->welcome_model->show_latest_article();
    $data['all_tags'] = $this->welcome_model->show_all_tags_article();
    $data['title'] = "PT.PAYUNG ANAK BANGSA";
    $data['main']= "article_detail";
    $this->load->view('main_v',$data);
    }
    public function gallery_detail($slug_gallery)
    {
    $data['menu_footer'] = $this->welcome_model->show_menu()->result_array();
    $this->db->set('counter', 'coalesce(counter, 0)+1', FALSE);
    $this->db->where("slug_gallery",$slug_gallery);
    $this->db->update('gallery');
    $data['list_article'] = $this->welcome_model->show_list_article();
    $data['gallery_detail'] = $this->welcome_model->show_gallery_detail($slug_gallery);    
    $data['header_gallery_detail'] = $this->welcome_model->show_gallery_detail($slug_gallery);    
    $data['menu'] = $this->welcome_model->show_menu()->result_array();
    $data['all_tags_article'] = $this->welcome_model->show_all_tags_article();
    $data['trending_article'] = $this->welcome_model->trending_article();
    $data['list_category'] = $this->welcome_model->show_list_category();
    $data['slide_active'] = $this->welcome_model->slide_active();
    $data['slide_item'] = $this->welcome_model->slide_item();
    $data['latest_article'] = $this->welcome_model->show_latest_article();
     $data['title'] = "PT.PAYUNG ANAK BANGSA";
    $data['main']= "gallery_detail";
    $this->load->view('main_v',$data);
    }
}
