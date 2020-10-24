<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Webmaster extends CI_Controller { 
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
            $this->load->model(array('m_login','webmaster_model'));   
    
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
		        $data['title'] = ' INSERT USER';   
            $data['main'] = 'backend/webmaster';
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
        $this->form_validation->set_rules('username', 'username', 'required|min_length[3]|max_length[225]');
        $this->form_validation->set_rules('name', 'name', 'required|min_length[3]|max_length[225]');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[3]|max_length[225]');
        $this->form_validation->set_rules('level_login', 'level', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $query= $this->db->query("select * from master_administrator where status_online=1");
        $data['user_online'] = $query->result();
        $query= $this->db->query("select * from master_administrator where status_online !=1");
        $data['user_offline'] = $query->result();
    		$data['title'] = ' INSERT USER';   
            $data['main'] = 'backend/webmaster';
            $this->load->view('backend/main_v', $data);
        }
		else
		{
       
        $config['upload_path'] = './assets/foto/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 2048000;
        // $config['max_width'] = 768;
        // $config['max_height'] = 1024; 
        $config['encrypt_name'] = TRUE;
        $this->upload->initialize($config);
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
              //Compress Image
              $config['image_library']='gd2';
              $config['source_image']='./assets/foto/'.$upload['file_name'];
              $config['create_thumb']= FALSE;
              $config['maintain_ratio']= TRUE;
              $config['quality']= '90%';
              // $config['width']= 75;
              // $config['height']= 75;
              $config['new_image']= './assets/foto/'.$upload['file_name'];
              $this->load->library('image_lib', $config);
              $this->image_lib->initialize($config);
              $this->image_lib->resize();
              $this->image_lib->clear();
              $foto=$upload['file_name'];
           $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'status' => $this->input->post('status'),
                'name' => $this->input->post('name'),
                'level_login' => $this->input->post('level_login'),
                'foto' => $foto     
            );
        $create  = $this->db->insert('master_administrator',$data);
        if ($create) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
                redirect('backend/webmaster/cek'); 	
            }
        }
       
            function edit_user()
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
                        $id_administrator = $this->uri->segment(4);
		            $data['single_user'] = $this->webmaster_model->show_user_id($id_administrator);
		      $data['title'] = ' EDIT USER';   
            $data['main'] = 'backend/edit_user';
        $this->load->view('backend/main_v', $data);
    }
    function update_user($id_administrator) 
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
                $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'status' => $this->input->post('status'),
                'level_login' => $this->input->post('level_login'),
                'name' => $this->input->post('name')
            );
         if(empty($_FILES['foto']['name']))
           {
           
          $this->db->where('id_administrator', $id_administrator);
        $this->db->update('master_administrator',$data);
                    $update = $this->db->trans_complete();
        if ($update) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
                redirect('backend/webmaster/cek');  
                }
            else
                {
		$config['upload_path'] = './assets/foto/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 2048000;
        // $config['max_width'] = 768;
        // $config['max_height'] = 1024; 
        $config['encrypt_name'] = TRUE;
        $this->upload->initialize($config);
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
              //Compress Image
              $config['image_library']='gd2';
              $config['source_image']='./assets/foto/'.$upload['file_name'];
              $config['create_thumb']= FALSE;
              $config['maintain_ratio']= TRUE;
              $config['quality']= '90%';
              // $config['width']= 75;
              // $config['height']= 75;
              $config['new_image']= './assets/foto/'.$upload['file_name'];
              $this->load->library('image_lib', $config);
              $this->image_lib->initialize($config);
              $this->image_lib->resize();
              $this->image_lib->clear();
              $foto=$upload['file_name'];
	       $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'status' => $this->input->post('status'),
                'name' => $this->input->post('name'),
                'level_login' => $this->input->post('level_login'),
                'foto' => $foto     
            );
           
			$this->db->where('id_administrator', $id_administrator);
		$update = $this->db->update('master_administrator',$data);
        if ($update)$this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
                 redirect('backend/webmaster/cek'); 	
                }
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
        $config['base_url'] = site_url('backend/webmaster/cek');
        // $count = $this->db->query("select count(*) from master_administrator")->result();
        // var_dump($count);
        $config['total_rows'] = $this->db->count_all("master_administrator");
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
        $data['webmaster'] = $this->webmaster_model->get_user_list($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = ' LIST USER';   
        $data['main'] = 'backend/user';
        $this->load->view('backend/main_v', $data);
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

         
           $multiple = $this->webmaster_model->multiple_delete();
        if (!$multiple) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Proses Success</button></p></strong></div>");
     else $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Data success deleted.</button></p></strong></div>");
            redirect('backend/webmaster/cek');     
                }
            
      function delete($id_administrator){
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
       
        $this->db->where('id_administrator',$id_administrator);
        $query = $this->db->get('master_administrator');
        $row = $query->row();
        $this->db->where('id_administrator', $id_administrator);
        unlink("./assets/foto/$row->foto");
        $this->db->delete('master_administrator', array('foto' => $foto));
        $this->db->where('id_administrator', $id_administrator);
        $delete =  $this->db->delete('master_administrator');
        if (!$delete) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something wrong!</button></p></strong></div>");
         
        else
            $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Data success deleted.</button></p></strong></div>");
            redirect('backend/webmaster/cek');  
        }
    }