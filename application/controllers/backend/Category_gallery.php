<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Category_gallery extends CI_Controller { 
        function __construct()
        {
            parent::__construct();      
              header("Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT"); // Date in the past
                  header("Expires: " . gmdate( "D, j M Y H:i:s", time() ) . " GMT"); // always modified
                      header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
                              header("Cache-Control: post-check=0, pre-check=0", FALSE);
                          header("Pragma: no-cache");
                      $this->load->library(array('form_validation','upload','session','encrypt'));
                $this->load->helper(array('url','text'));
            $this->load->model(array('m_login','category_gallery_model'));   
    
    }
    function index()
     { if($this->session->userdata('isLogin') == FALSE)
        {
            redirect('backend/login/login_form');
            }
                else
            {    
                $data = array();
                    $this->load->model('m_login');
                                $user = $this->session->userdata('username');
                                $data['level'] = $this->session->userdata('level_login');        
                        $data['pengguna'] = $this->m_login->dataPengguna($user);
                    }
                    $query= $this->db->query("select * from master_administrator where status_online=1");
        $data['user_online'] = $query->result();
        $query= $this->db->query("select * from master_administrator where status_online !=1");
        $data['user_offline'] = $query->result();
                $data['title'] = ' INSERT CATEGORY GALLERY';   
            $data['main'] = 'backend/category_gallery';
        $this->load->view('backend/main_v', $data);
    }
    function proses()
   {
        if($this->session->userdata('isLogin') == FALSE)
        {
            redirect('backend/login/login_form');
            }
                else
            {    
                $data = array();
                    $this->load->model('m_login');
                                $user = $this->session->userdata('username');
                                $data['level'] = $this->session->userdata('level_login');        
                        $data['pengguna'] = $this->m_login->dataPengguna($user);
                    }
                $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>
                                                        x
                                                   </button>", "</button></div>");
        $this->form_validation->set_rules('category', 'Category', 'required|min_length[3]|max_length[225]');
                $this->form_validation->set_rules('lang', 'lang', 'required');

         if ($this->form_validation->run() == FALSE)
        {
        $query= $this->db->query("select * from master_administrator where status_online=1");
        $data['user_online'] = $query->result();
        $query= $this->db->query("select * from master_administrator where status_online !=1");
        $data['user_offline'] = $query->result();
            $data['title'] = ' INSERT CATEGORY GALLERY';   
            $data['main'] = 'backend/category_gallery';
            $this->load->view('backend/main_v', $data);
        }
        else
        {
       
       
           $data = array(
                'category' => $this->input->post('category'),
                'lang' => $this->input->post('lang')

            );
        $create  = $this->db->insert('category_gallery',$data);
        if ($create) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
                redirect('backend/category_gallery/cek');   
            }
        }
       
            function edit_category_gallery()
    {
        if($this->session->userdata('isLogin') == FALSE)
        {
            redirect('backend/login/login_form');
            }
                else
            {    
                $data = array();
                    $this->load->model('m_login');
                                $user = $this->session->userdata('username');
                                $data['level'] = $this->session->userdata('level_login');        
                        $data['pengguna'] = $this->m_login->dataPengguna($user);
                    }
                    $query= $this->db->query("select * from master_administrator where status_online=1");
        $data['user_online'] = $query->result();
        $query= $this->db->query("select * from master_administrator where status_online !=1");
        $data['user_offline'] = $query->result();
                        $id_category = $this->uri->segment(4);
                    $data['single_category_gallery'] = $this->category_gallery_model->show_cat_gallery_id($id_category);
              $data['title'] = ' EDIT CATEGORY GALLERY';   
            $data['main'] = 'backend/Edit_category_gallery';
        $this->load->view('backend/Main_v', $data);
    }
    function update_category_gallery() 
      {
        if($this->session->userdata('isLogin') == FALSE)
        {
            redirect('backend/login/login_form');
            }
                else
            {    
                $data = array();
                    $this->load->model('m_login');
                                $user = $this->session->userdata('username');
                                $data['level'] = $this->session->userdata('level_login');        
                        $data['pengguna'] = $this->m_login->dataPengguna($user);
                    }
                
            $this->db->where('id_category', $this->input->post('id_category'));
            $data = array(
                'category' => $this->input->post('category'),
                'lang' => $this->input->post('lang')

            );
        $update = $this->db->update('category_gallery',$data);
        if ($update)$this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
                 redirect('backend/category_gallery/cek');  
                }
        function cek()
        {
        if($this->session->userdata('isLogin') == FALSE)
        {
            redirect('backend/login/login_form');
            }
                else
            {    
                $data = array();
                    $this->load->model('m_login');
                                $user = $this->session->userdata('username');
                                $data['level'] = $this->session->userdata('level_login');        
                        $data['pengguna'] = $this->m_login->dataPengguna($user);
                    }
                    $query= $this->db->query("select * from master_administrator where status_online=1");
        $data['user_online'] = $query->result();
        $query= $this->db->query("select * from master_administrator where status_online !=1");
        $data['user_offline'] = $query->result();
        $config['base_url'] = site_url('backend/category_gallery/cek');
        // $count = $this->db->query("select count(*) from asset_user")->result();
        // var_dump($count);
        $config['total_rows'] = $this->db->count_all("category_gallery");
        $config['per_page'] = "10";
        $config["uri_segment"] = 4;
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
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['category_gallery'] = $this->category_gallery_model->get_category_gallery_list($config["per_page"], $data['page']); 
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = ' LIST CATEGORY GALLERY';   
        $data['main'] = 'backend/List_category_gallery';
        $this->load->view('backend/Main_v', $data);
      } 
      function delete_multiple() {
        if($this->session->userdata('isLogin') == FALSE)
        {
            redirect('backend/login/login_form');
            }
                else
            {    
                $data = array();
                    $this->load->model('m_login');
                                $user = $this->session->userdata('username');
                                $data['level'] = $this->session->userdata('level_login');        
                        $data['pengguna'] = $this->m_login->dataPengguna($user);
                    }

         
           $multiple = $this->category_gallery_model->multiple_delete();
        if (!$multiple) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Proses Success</button></p></strong></div>");
     else $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Data success deleted.</button></p></strong></div>");
            redirect('backend/category_gallery/cek');     
                }

            
      function delete($id_category){
        if($this->session->userdata('isLogin') == FALSE)
        {
            redirect('backend/login/login_form');
            }
                else
            {    
                $data = array();
                    $this->load->model('m_login');
                                $user = $this->session->userdata('username');
                                $data['level'] = $this->session->userdata('level_login');        
                        $data['pengguna'] = $this->m_login->dataPengguna($user);
                    }
        $this->db->where('id_category', $id_category);
        $delete =  $this->db->delete('category_gallery');
        if (!$delete) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something wrong!</button></p></strong></div>");
         
        else
            $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Data success deleted.</button></p></strong></div>");
            redirect('backend/category_gallery/cek');  
        }
    }