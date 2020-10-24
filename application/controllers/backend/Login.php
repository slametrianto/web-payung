<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

  class Login extends CI_Controller
    {
      public function __construct()
        {
        parent::__construct();
           header("Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT"); 
               header("Expires: " . gmdate( "D, j M Y H:i:s", time() ) . " GMT");
                      header("Cache-Control: no-store, no-cache, must-revalidate");
                          header("Cache-Control: post-check=0, pre-check=0", FALSE);
                              header("Pragma: no-cache");
                                $this->load->model('m_login');
                           $this->load->library('user_agent');
                        $this->load->library(array('form_validation','session'));
                  $this->load->database();
              $this->load->helper('url');
       $this->load->helper(array('form', 'url','cookie', 'string'));
     }
     public function index()
        {
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
           
          $data['browser_server'] = $_SERVER['HTTP_USER_AGENT'];
              $data['title'] = 'LOGIN AREA';
        $this->load->view('backend/form_login',$data);            
        
    }
   public function login_form()
    {
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
          
          $data['browser_server'] = $_SERVER['HTTP_USER_AGENT'];
          $username = $this->input->post("username");
              if(empty($username))
            {
             echo "<script>
                alertify.alert('Username dan Password Tidak Boleh Kurang Dari 3 Karakter.');
              </script>";   
        $data['title'] = 'LOGIN AREA';
        $this->load->view('backend/form_login',$data);
      
      }
      else
      {
        $username = $this->db->escape_str($this->input->post("username"));
          $password = $this->input->post('password');
             $remember  = $this->input->post('remember');
             $row = $this->m_login->ambilPengguna($username, $password,1,1)->row();
               if($row)
              {
               $this->session->set_userdata('isLogin', TRUE);
                   $this->session->set_userdata('username',$username);
                  if ($remember){
                   $key = random_string('alnum', 64);
                   set_cookie('admin', $key, 3600*24*30); 
                    $update_key = array(
                    'cookie' => $key);
                    $this->m_login->update($update_key, $row->username);
                   }
                 $this->_sessionadmin($row);
               }
              else
              {
                  echo "<script>
                 alertify.alert('User & password Yang Anda Masukan Belum Terdaftar');
              </script>";       
         }
        }  
      }
    public function logout(){
         $this->session->sess_destroy();
          delete_cookie('admin');
          $this->db->set('status_online', 0, FALSE);
       $this->db->where("username",$this->input->post('username'));
       $this->db->update("master_administrator");
          redirect("backend/login");
   }
   public function identifikasi_session(){
         $this->session->sess_destroy();
         delete_cookie('admin');
           $data['title'] = 'LOGIN AREA';
        $this->load->view('backend/form_login',$data);
   }
    public function _sessionadmin($row) {
       $this->db->set('latest_session', date("Y/m/d h:i:s"));
       $this->db->set('status_online', 1, FALSE);
       $this->db->where("username",$row->username);
       $this->db->update("master_administrator");
           $sess = array(
            'logged' => TRUE,
            'name' => $row->name,
            'username' => $row->username,
            'status_online' => $row->status_online,
            'latest_session' => $row->latest_session,
            'status' => $row->status,
            'foto' => $row->foto,
            'level_login' => $row->level_login,
            'password' => $row->password
        );
        redirect('backend/home/auth_sukses');        
   }
}
