<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class M_login extends CI_Model
{
  private $table = "master_administrator";
  private $pk = "username";
  public function __construct()
  {
    parent::__construct();
  }
  public function ambilPengguna($username, $password, $status, $level)
  {
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $this->db->where('status', $status);
    $this->db->where('level_login', $level);
     return $this->db->get($this->table);
  }
  public function dataPengguna($username){
   $this->db->select('id_administrator');
   $this->db->select('name');
   $this->db->select('username');
   $this->db->select('password');
   $this->db->select('level_login');
   $this->db->select('status');
   $this->db->select('foto');
   $this->db->select('cookie');
   $this->db->select('date_save');
   $this->db->select('date_updated');
   $this->db->select('latest_session');
   $this->db->select('status_online');
   $this->db->where('username', $username);
   $query = $this->db->get($this->table);
   return $query->row();
  }
   public function update($data, $username)
    {
        $this->db->where($this->pk, $username);
        $this->db->update($this->table, $data);
    }
    // ambil data berdasarkan cookie
    public function get_by_cookie($cookie)
    {
        $this->db->where('cookie', $cookie);
        return $this->db->get($this->table);
    }
}  
