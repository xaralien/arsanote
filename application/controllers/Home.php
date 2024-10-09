<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('home_m', 'home');
        if (!$this->session->userdata('user_logged_in')) {
            redirect('autentic'); // Redirect to the 'autentic' page
        }
    }

    public function index()
    {
        $data['recently'] = $this->home->getRecent();
        $data['newest_workspace'] = $this->home->getNewest(1);
        $data['content']     = 'webview/home/home_view';
        $data['content_js']  = 'webview/home/home_js';
        $this->load->view('_parts/wrapper', $data);
    }
}
