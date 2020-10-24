<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sub_page extends CI_Controller { 
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
        $this->load->model(array('m_login','sub_page_model'));   
        $this->load->database();
	}
function index()
	{
		      if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('backend/login/login_form');
    }else
    {    $data = array();
         $this->load->model('m_login');
         $user = $this->session->userdata('username');
         $data['level'] = $this->session->userdata('level_login');        
         $data['pengguna'] = $this->m_login->dataPengguna($user);
         }
          $query= $this->db->query("select * from master_administrator where status_online=1");
        $data['user_online'] = $query->result();
        $query= $this->db->query("select * from master_administrator where status_online !=1");
        $data['user_offline'] = $query->result();
        $config['base_url'] = site_url('backend/page/cek');
        $data['list_page'] = $this->sub_page_model->show_list_page()->result_array();
		$data['title'] = ' INSERT SUB PAGE';   
        $data['main'] = 'backend/Sub_page';
        $this->load->view('backend/Main_v', $data);

}

function proses()
   {
		      if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('backend/login/login_form');
    }else
    {    $data = array();
         $this->load->model('m_login');
         $user = $this->session->userdata('username');
         $data['level'] = $this->session->userdata('level_login');        
         $data['pengguna'] = $this->m_login->dataPengguna($user);
         }
  	    $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>
                                                        x
                                                   </button>", "</button></div>");
        $this->form_validation->set_rules('title', 'Title ', 'required|min_length[3]|max_length[200]');
        $this->form_validation->set_rules('description', 'Description', 'required|min_length[3]');
        $this->form_validation->set_rules('author', 'Author', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('status', 'Status', 'required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('id_page', 'Page', 'required|min_length[1]|max_length[4]');
        $this->form_validation->set_rules('lang', 'Lang', 'required|min_length[1]|max_length[4]');
        if ($this->form_validation->run() == FALSE)
    {
       $query= $this->db->query("select * from master_administrator where status_online=1");
        $data['user_online'] = $query->result();
        $query= $this->db->query("select * from master_administrator where status_online !=1");
        $data['user_offline'] = $query->result();
        $config['base_url'] = site_url('backend/page/cek');
        $data['list_page'] = $this->sub_page_model->show_list_page()->result_array();
		$data['title'] = ' INSERT SUB PAGE';   
        $data['main'] = 'backend/Sub_page';
        $this->load->view('backend/Main_v', $data);
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
      $string=preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $this->input->post('title')); //filter karakter unik dan replace dengan kosong ('')
        $trim=trim($string); // hilangkan spasi berlebihan dengan fungsi trim
        $pre_slug=strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
        $slug_sub_page=$pre_slug.'.html'; 
		$data = array(
            'id_page' => $this->input->post('id_page'),
            'date_post' => date("Y-m-d H:i:s"),
            'description' => $this->input->post('description'),
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'lang' => $this->input->post('lang'),
            'status' => $this->input->post('status'),
            'slug_sub_page'=>$slug_sub_page,
            'foto' => $foto 
			);
		$create = $this->db->insert('sub_page',$data);
        if ($create) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
      redirect('backend/sub_page/cek'); 	
            }
        }
    
    function delete_multiple() {
          if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('backend/login/login_form');
    }else
    {    $data = array();
         $this->load->model('m_login');
         $user = $this->session->userdata('username');
         $data['level'] = $this->session->userdata('level_login');        
         $data['pengguna'] = $this->m_login->dataPengguna($user);
         }
           $multiple = $this->sub_page_model->multiple_delete();
       if (!$multiple) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Proses Success</button></p></strong></div>");
     else $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Data success deleted.</button></p></strong></div>");
  redirect('backend/sub_page/cek');     
        
    }
      function edit_sub_page()
	{
		      if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('backend/login/login_form');
    }else
    {    $data = array();
         $this->load->model('m_login');
         $user = $this->session->userdata('username');
         $data['level'] = $this->session->userdata('level_login');        
         $data['pengguna'] = $this->m_login->dataPengguna($user);
         }
          $query= $this->db->query("select * from master_administrator where status_online=1");
        $data['user_online'] = $query->result();
        $query= $this->db->query("select * from master_administrator where status_online !=1");
        $data['user_offline'] = $query->result();
        $config['base_url'] = site_url('backend/page/cek');
        $id_sub_page = $this->uri->segment(4);
        $data['show_page'] = $this->sub_page_model->show_page()->result_array();
		$data['single_sub_page'] = $this->sub_page_model->show_sub_page_id($id_sub_page);
		$data['title'] = ' EDIT SUB PAGE';   
        $data['main'] = 'backend/Edit_sub_page';
        $this->load->view('backend/Main_v', $data);

}
function update_sub_page($id_sub_page) 
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
          $string=preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $this->input->post('title')); //filter karakter unik dan replace dengan kosong ('')
        $trim=trim($string); // hilangkan spasi berlebihan dengan fungsi trim
        $pre_slug=strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
        $slug_sub_page=$pre_slug.'.html';
         $data = array(
                'id_page' => $this->input->post('id_page'),
                'title' => $this->input->post('title'),
                'author' => $this->input->post('author'),
                'lang' => $this->input->post('lang'),
                'status' => $this->input->post('status'),
                'description' => $this->input->post('description'),
                'slug_sub_page'=> $slug_sub_page,
                'date_post' => date("Y-m-d H:i:s")
            );
            if(empty($_FILES['foto']['name']))
                {
        $this->db->where('id_sub_page', $id_sub_page);
        $this->db->update('sub_page',$data);
         $update = $this->db->trans_complete();
        if ($update) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
                redirect('backend/sub_page/cek');    
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
      $string=preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $this->input->post('title')); //filter karakter unik dan replace dengan kosong ('')
        $trim=trim($string); // hilangkan spasi berlebihan dengan fungsi trim
        $pre_slug=strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
        $slug_sub_page=$pre_slug.'.html';
        $data = array(
                'id_page' => $this->input->post('id_page'),
                'title' => $this->input->post('title'),
                'author' => $this->input->post('author'),
                'status' => $this->input->post('status'),
                'lang' => $this->input->post('lang'),
                'description' => $this->input->post('description'),
                'date_post' => date("Y-m-d H:i:s"),
                'slug_sub_page'=>$slug_sub_page,
                'foto' => $foto     
            );
            $this->db->where('id_sub_page', $id_sub_page);
            $update = $this->db->update('sub_page',$data);
        if ($update)$this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
                  redirect('backend/sub_page/cek');    
                }
        }
    function cek()
    {
          if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('backend/login/login_form');
    }else
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
        $config['base_url'] = site_url('backend/page/cek');
        $config['base_url'] = site_url('backend/sub_page/cek');
        $config['total_rows'] = $this->db->count_all('sub_page');
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
        $data['sub_page'] = $this->sub_page_model->get_sub_page_list($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();    
        $data['title'] = ' LIST SUB PAGE';   
        $data['main'] = 'backend/List_sub_page';
        $this->load->view('backend/Main_v', $data);
      } 
      function delete($id_sub_page){
        $this->db->where('id_sub_page',$id_sub_page);
        $query = $this->db->get('sub_page');
        $row = $query->row();
        $this->db->where('id_sub_page', $id_sub_page);
        unlink("./assets/foto/$row->foto");
        $this->db->delete('sub_page', array('foto' => $foto));
        $this->db->where('id_sub_page', $id_sub_page);
        $delete =  $this->db->delete('sub_page');
        if (!$delete) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something wrong!</button></p></strong></div>");
         
        else
            $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
            redirect('backend/sub_page/cek');  
        }
    
}