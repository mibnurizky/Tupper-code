<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Core_Controller extends CI_Controller {
	function __construct(){
        parent::__construct();
        loadModel('users_model','users');
    }
    public function index(){
    	
    }
	// public function index(){
	// 	$this->load->view('welcome_message');
	// }
}
