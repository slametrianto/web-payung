<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slide extends CI_Controller { 
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
        $this->load->model(array('m_login','slide_model'));   
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
		    $data['title'] = ' INSERT SLIDE';   
        $data['main'] = 'backend/Slide';
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
        $this->form_validation->set_rules('title', 'Judul slide', 'required|min_length[3]|max_length[200]');
        $this->form_validation->set_rules('description', 'Isi slide', 'required|min_length[3]');
        if ($this->form_validation->run() == FALSE)
    {
      $query= $this->db->query("select * from master_administrator where status_online=1");
        $data['user_online'] = $query->result();
        $query= $this->db->query("select * from master_administrator where status_online !=1");
        $data['user_offline'] = $query->result();
        $data['list_slide'] = $this->slide_model->show_list_slide()->result_array();
	     	$data['title'] = ' INSERT SLIDE';   
        $data['main'] = 'backend/slide';
        $this->load->view('backend/main_v', $data);
    }
		else
		{
        $config['upload_path'] = './assets/foto/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 2048000;
        // $config['max_width'] = 768;
        // $config['max_height'] = 1024; 
        /*$config['encrypt_name'] = TRUE;*/
        $this->upload->initialize($config);
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
              //Compress Image
              // $config['image_library']='gd2';
              // $config['source_image']='./assets/foto/'.$upload['file_name'];
              // $config['create_thumb']= FALSE;
              // $config['maintain_ratio']= TRUE;
              // $config['quality']= '90%';
              // // $config['width']= 1000;
              // // $config['height']= 1000;
              // $config['new_image']= './assets/foto/'.$upload['file_name'];
              // $this->load->library('image_lib', $config);
              // /*$this->image_lib->initialize($config);*/
              // $this->image_lib->resize();
              /*$this->image_lib->clear();*/
              $foto=$upload['file_name'];
              $string=preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $this->input->post('title')); //filter karakter unik dan replace dengan kosong ('')
        $trim=trim($string); // hilangkan spasi berlebihan dengan fungsi trim
        $pre_slug=strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
        $slug_slider=$pre_slug.'.html'; 
	     	$data = array(
            'description' => $this->input->post('description'),
            'date_post' => date("Y-m-d H:i:s"),
            'title' => $this->input->post('title'),
             'sub_title' => $this->input->post('sub_title'),
            'lang' => $this->input->post('lang'),
            'status' => $this->input->post('status'),
            'slug_slider' => $slug_slider,
            'foto' => $foto 
			);
		  $create = $this->db->insert('slide',$data);
        if ($create) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
      redirect('backend/slide/cek'); 	
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
         
           $multiple = $this->slide_model->multiple_delete();
       if (!$multiple) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Proses Success</button></p></strong></div>");
     else $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Data success deleted.</button></p></strong></div>");
  redirect('backend/slide/cek');     
        
    }
      function edit_slide()
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
        $id = $this->uri->segment(4);
        $data['slide'] = $this->slide_model->show_id_slide($id)->result_array();
		$data['single_slide'] = $this->slide_model->show_slide_id($id);
		$data['title'] = ' EDIT SLIDE';   
        $data['main'] = 'backend/Edit_slide';
        $this->load->view('backend/Main_v', $data);

}
function update_slide($id) 
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
        $slug_slider=$pre_slug.'.html'; 
        
         $data = array(
                'title' => $this->input->post('title'),
                'sub_title' => $this->input->post('sub_title'),
                'status' => $this->input->post('status'),
                'date_post' => date("Y-m-d H:i:s"),
                'lang' => $this->input->post('lang'),
                'slug_slider' => $slug_slider,
                'description' => $this->input->post('description')
            );
            if(empty($_FILES['foto']['name']))
                {
        $this->db->where('id', $id);
        $this->db->update('slide',$data);
        $create = $this->db->trans_complete();
        if ($create)
            $this->session->set_flashdata('message', "<div class='alert alert-warning alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
        else
            $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success</button></p></strong></div>");
                redirect('backend/slide/cek');    
            }
       else
            {
        $config['upload_path'] = './assets/foto/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 2048000;
        $config['encrypt_name'] = TRUE;
        $this->upload->initialize($config);
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
              //Compress Image
              // $config['image_library']='gd2';
              // $config['source_image']='./assets/foto/'.$upload['file_name'];
              // $config['create_thumb']= FALSE;
              // $config['maintain_ratio']= TRUE;
              // $config['quality']= '60%';
              // // $config['width']= 2000;
              // // $config['height']= 2000;
              // $config['new_image']= './assets/foto/'.$upload['file_name'];
              // $this->load->library('image_lib', $config);
              // /*$this->image_lib->initialize($config);*/
              // $this->image_lib->resize();
              /*$this->image_lib->clear();*/
              $foto=$upload['file_name'];
        $data = array(
                'title' => $this->input->post('title'),
                'sub_title' => $this->input->post('sub_title'),
                'description' => $this->input->post('description'),
                'date_post' => date("Y-m-d H:i:s"),
                'lang' => $this->input->post('lang'),
                'status' => $this->input->post('status'),
                 'slug_slider' => $slug_slider,
                'foto' => $foto     
            );
            $this->db->where('id', $id);
            $this->db->update('slide',$data);
            $create = $this->db->trans_complete();
        if ($create)
            $this->session->set_flashdata('message', "<div class='alert alert-warning alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success .</button></p></strong></div>");
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success</button></p></strong></div>");
                 redirect('backend/slide/cek');    
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
        $config['base_url'] = site_url('backend/slide/cek');
        $config['total_rows'] = $this->db->count_all('slide');
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
        $data['slide'] = $this->slide_model->get_slide_list($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();    
        $data['title'] = ' LIST SLIDE';   
        $data['main'] = 'backend/List_slide';
        $this->load->view('backend/Main_v', $data);
      } 
      function delete($id){
        $this->db->where('id',$id);
        $query = $this->db->get('slide');
        $row = $query->row();
        $this->db->where('id', $id);
        unlink("./assets/foto/$row->foto");
        $this->db->delete('slide', array('foto' => $id));
        $this->db->where('id', $id);
        $delete =  $this->db->delete('slide');
        if (!$delete) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something wrong!</button></p></strong></div>");
         
        else
            $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
            redirect('backend/slide/cek');  
        }
    
}