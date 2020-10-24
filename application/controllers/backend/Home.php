<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
        public function __construct()
        {
            parent::__construct();    
            header("Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT"); 
            header("Expires: " . gmdate( "D, j M Y H:i:s", time() ) . " GMT"); 
            header("Cache-Control: no-store, no-cache, must-revalidate"); 
            header("Cache-Control: post-check=0, pre-check=0", FALSE);
            header("Pragma: no-cache");
            $this->load->helper(array('url','html','form','text'));
            $this->load->library(array('form_validation','upload','encrypt','user_agent','session','pagination'));
            $this->load->model(array("m_login","welcome_model"));
           }
           public function auth_sukses(){
             echo "<script>
                alertify.alert('Informasi diterima.');
                setTimeout(function(){
                  location.href = 'http://".$_SERVER["SERVER_NAME"]."/payunganakbangsa/backend/home/index';
            }, 2000);
              </script>";  
           }
    public function index() {
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
                    if ($this->agent->is_browser())
          {
              $data["agent"] = $this->agent->browser().' '.$this->agent->version();
          }
          elseif ($this->agent->is_robot())
          {
              $data["agent"] = $this->agent->robot();
          }
          elseif ($this->agent->is_mobile())
          {
              $data["agent"] = $this->agent->mobile();
          }
          else
          {
              $data["agent"] = 'Unidentified User Agent';
          }

        
        $query= $this->db->query("select sum(coalesce(counter, 0))counter,title from master_article where lang='ENG' group by title ");
        $data['articles'] = $query->result();
        $query= $this->db->query("select sum(coalesce(counter, 0))counter,title from master_article where lang='ENG' group by title ");
        $data['room'] = $query->result();
        $query= $this->db->query("select sum(coalesce(counter, 0))counter,title from master_article where lang='ENG' group by title ");
        $data['gallery'] = $query->result();
        $query= $this->db->query("select sum(coalesce(counter, 0))counter,title from master_article where lang='ENG' group by title ");
        $data['sub_page'] = $query->result();
        $query= $this->db->query("select sum(level_login)counter,level_login from master_administrator where status=1 group by level_login");
        $data['user'] = $query->result();
         
        $query= $this->db->query("select * from master_administrator where status_online=1");
        $data['user_online'] = $query->result();
        $query= $this->db->query("select * from master_administrator where status_online !=1");
        $data['user_offline'] = $query->result();
        $data['master_count_article'] = $this->welcome_model->master_count_article();
        $data['master_administrator'] = $this->welcome_model->master_administrator();
        $data['master_portfolio'] = $this->welcome_model->master_portfolio();

    $data['title'] = "DASHBOARD";
    $data['main']= "backend/home_v";
    $this->load->view('backend/main_home',$data);
    }
  }
