<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Custom404 extends CI_Controller 
		{
		public function __construct() 
		{
		    parent::__construct(); 
		} 
		public function index() 
		{ 
	    $this->output->set_status_header('404'); 
	    $data['title'] = 'ERROR ,HALAMAN TIDAK DITEMUKAN';
        $this->load->view('error_404', $data);
		} 
	 } 
