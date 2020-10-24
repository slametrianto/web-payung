<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller { 
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
        $this->load->model(array('m_login','article_model'));   
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
        $data['list_category'] = $this->article_model->show_list_category()->result_array();
		    $data['title'] = ' INSERT ARTICLE';   
        $data['main'] = 'backend/Article';
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
        $this->form_validation->set_rules('title', 'Judul Article', 'required|min_length[3]|max_length[200]');
        $this->form_validation->set_rules('description', 'Isi Article', 'required|min_length[3]');
        $this->form_validation->set_rules('author', 'Penulis', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('status', 'Status', 'required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('id_category_article', 'Category', 'required|min_length[1]|max_length[4]');
        $this->form_validation->set_rules('lang', 'lang', 'required');
        if ($this->form_validation->run() == FALSE)
    {
      $query= $this->db->query("select * from master_administrator where status_online=1");
        $data['user_online'] = $query->result();
        $query= $this->db->query("select * from master_administrator where status_online !=1");
        $data['user_offline'] = $query->result();
    $data['list_category'] = $this->article_model->show_list_category()->result_array();
		$data['title'] = ' INSERT ARTICLE';   
        $data['main'] = 'backend/Article';
        $this->load->view('backend/Main_v', $data);
    }
		else
		{

        $config['upload_path'] = './assets/foto/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 2048000;
        // $config['max_width'] = 768;
        // $config['max_height'] = 1024; 
       // $config['encrypt_name'] = TRUE;
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
        $slug_article=$pre_slug.'.html'; 
		  $data = array(
            'id_category_article' => $this->input->post('id_category_article'),
            'lang' => $this->input->post('lang'),
            'tag' => $this->input->post('tag'),
            'date_post' => date("Y-m-d H:i:s"),
            'description' => $this->input->post('description'),
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'slug_article' => $slug_article,
            'status' => $this->input->post('status'),
            'foto' => $foto 
			);
		$create = $this->db->insert('master_article',$data);
        if ($create) 
          
            $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something Wrong!</button></p></strong></div>");
      redirect('backend/article/cek'); 	
    
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
         
           $multiple = $this->article_model->multiple_delete();
       if (!$multiple) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Proses Success</button></p></strong></div>");
     else $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Data success deleted.</button></p></strong></div>");
  redirect('backend/article/cek');     
        
    }
      function edit_article()
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
        $id_article = $this->uri->segment(4);
        $data['list_category'] = $this->article_model->show_list_category()->result_array();
    		$data['single_article'] = $this->article_model->show_article_id($id_article);
    		$data['title'] = ' EDIT ARTICLE';   
        $data['main'] = 'backend/Edit_article';
        $this->load->view('backend/Main_v', $data);

}
function update_article($id_article) 
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
        $slug_article=$pre_slug.'.html'; 
      $data = array(
            'id_category_article' => $this->input->post('id_category_article'),
            'lang' => $this->input->post('lang'),
            'tag' => $this->input->post('tag'),
            'date_post' => date("Y-m-d H:i:s"),
            'description' => $this->input->post('description'),
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'slug_article' => $slug_article,
            'status' => $this->input->post('status'),
      );
            if(empty($_FILES['foto']['name']))
                {
        $this->db->where('id_article', $id_article);
        $this->db->update('master_article',$data);
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
                redirect('backend/article/cek');    
            }
       else
            {
       $config['upload_path'] = './assets/foto/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 2048000;
        // $config['max_width'] = 768;
        // $config['max_height'] = 1024; 
       // $config['encrypt_name'] = TRUE;
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
              $foto=$upload['file_name']; //ambil nama file yang terupload enkripsi
        $string=preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $this->input->post('title')); //filter karakter unik dan replace dengan kosong ('')
        $trim=trim($string); // hilangkan spasi berlebihan dengan fungsi trim
        $pre_slug=strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
        $slug_article=$pre_slug.'.html'; 
      $data = array(
            'id_category_article' => $this->input->post('id_category_article'),
            'lang' => $this->input->post('lang'),
            'tag' => $this->input->post('tag'),
            'date_post' => date("Y-m-d H:i:s"),
            'description' => $this->input->post('description'),
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'slug_article' => $slug_article,
            'status' => $this->input->post('status'),
            'foto' => $foto 
      );
            $this->db->where('id_article', $id_article);
            $update = $this->db->update('master_article',$data);
        if ($update)$this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
     
        else
             $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
                  redirect('backend/article/cek');    
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
        $config['base_url'] = site_url('backend/article/cek');
        $config['total_rows'] = $this->db->count_all('master_article');
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
        $data['article'] = $this->article_model->get_article_list($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();    
        $data['title'] = ' LIST ARTICLE';   
        $data['main'] = 'backend/List_article';
        $this->load->view('backend/Main_v', $data);
      } 
      function delete($id_article){
        $this->db->where('id_article',$id_article);
        $query = $this->db->get('master_article');
        $row = $query->row();
        $this->db->where('id_article', $id_article);
        unlink("./assets/foto/$row->foto");
        $this->db->delete('master_article', array('foto' => $foto));
        $this->db->where('id_article', $id_article);
        $delete =  $this->db->delete('master_article');
        if (!$delete) $this->session->set_flashdata('message', "<div class='alert alert-dismissable alert-info'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Something wrong!</button></p></strong></div>");
         
        else
            $this->session->set_flashdata('message', "<div class='alert alert-info alert-block'><button type='button' class='close' data-dismiss='alert'>
                                            <font size ='2' color='black'>
                                                <strong>x</strong>
                                            </font></button><strong><p align='center'>Process Success.</button></p></strong></div>");
            redirect('backend/article/cek');  
        }
    
}