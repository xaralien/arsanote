<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {

        $data['content']     = 'webview/login/loginrole_view';
        $this->load->view('_parts/wrapper', $data);
    }
 
}
