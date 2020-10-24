<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller { 
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
        $this->load->model(array('m_login','event_model'));   
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
        $data['list_category'] = $this->event_model->show_list_category()->result_array();
		    $data['title'] = ' INSERT EVENT';   
        $data['main'] = 'backend/Event';
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
        $this->form_validation->set_rules('title', 'Judul Event', 'required|min_length[3]|max_length[200]');
        $this->form_validation->set_rules('description', 'Isi Event', 'required|min_length[3]');
        $this->form_validation->set_rules('author', 'Penulis', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('status', 'Status', 'required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('id_category', 'Category', 'required|min_length[1]|max_length[4]');
        $this->form_validation->set_rules('bahasa', 'Bahasa', 'required');
        if ($this->form_validation->run() == FALSE)
    {
    $data['list_category'] = $this->event_model->show_list_category()->result_array();
		$data['title'] = ' INSERT EVENT';   
        $data['main'] = 'backend/Event';
        $this->load->view('backend/Main_v', $data);
    }
		else
		{
        chmod($config['upload_path'], 0777); 
        $config['overwrite'] = true;
        $config['upload_path'] = './assets/foto/';
        $this->upload->initialize($config);
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
        $foto = $upload['file_name'];
		  $data = array(
            'id_category' => $this->input->post('id_category'),
            'bahasa' => $this->input->post('bahasa'),
            'tags' => $this->input->post('tags'),
            'date_post' => date("Y/m/d H:i:s"),
            'description' => $this->input->post('description'),
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'status' => $this->input->post('status'),
            'foto' => $foto 
			);
        $this->db->set("id_event","NEXTVAL('sequence_event')",FALSE);
		$create = $this->db->insert('event',$data);
        if ($create) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
      redirect('backend/event/cek'); 	
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
           $multiple = $this->event_model->multiple_delete();
       if (!$multiple) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Proses Success</button></p></strong></div>");
     else $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Data success deleted.</button></p></strong></div>");
  redirect('backend/event/cek');     
        
    }
      function edit_event()
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
        $id_event = $this->uri->segment(4);
        $data['list_category'] = $this->event_model->show_list_category()->result_array();
    		$data['single_event'] = $this->event_model->show_event_id($id_event);
    		$data['title'] = ' EDIT EVENT';   
        $data['main'] = 'backend/Edit_event';
        $this->load->view('backend/Main_v', $data);

}
function update_event($id_event) 
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
            'id_category' => $this->input->post('id_category'),
            'bahasa' => $this->input->post('bahasa'),
            'tags' => $this->input->post('tags'),
            'date_post' => date("Y/m/d H:i:s"),
            'description' => $this->input->post('description'),
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'status' => $this->input->post('status')
      );
            if(empty($_FILES['foto']['name']))
                {
        $this->db->where('id_event', $id_event);
        $this->db->update('event',$data);
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
                redirect('backend/event/cek');    
            }
       else
            {
        chmod($config['upload_path'], 0777); 
        $config['overwrite'] = true;
        $config['upload_path'] = './assets/foto/';
        $this->upload->initialize($config);
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
        $foto = $upload['file_name'];
        $data = array(
            'id_category' => $this->input->post('id_category'),
            'bahasa' => $this->input->post('bahasa'),
            'tags' => $this->input->post('tags'),
            'date_post' => date("Y/m/d H:i:s"),
            'description' => $this->input->post('description'),
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'status' => $this->input->post('status'),
            'foto' => $foto 
      );
            $this->db->where('id_event', $id_event);
            $update = $this->db->update('event',$data);
        if ($update)$this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
                  redirect('backend/event/cek');    
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
        $config['base_url'] = site_url('backend/event/cek');
        $config['total_rows'] = $this->db->count_all('event');
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
        $data['event'] = $this->event_model->get_event_list($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();    
        $data['title'] = ' LIST EVENT';   
        $data['main'] = 'backend/List_event';
        $this->load->view('backend/Main_v', $data);
      } 
      function delete($id_event){
        $this->db->where('id_event',$id_event);
        $query = $this->db->get('event');
        $row = $query->row();
        $this->db->where('id_event', $id_event);
        unlink("./assets/foto/$row->foto");
        $this->db->delete('event', array('foto' => $foto));
        $this->db->where('id_event', $id_event);
        $delete =  $this->db->delete('event');
        if (!$delete) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something wrong!</button></p></strong></div>");
         
        else
            $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
            redirect('backend/event/cek');  
        }
    
}