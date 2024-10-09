<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calendar extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Calender_m', 'calender');
        if (!$this->session->userdata('user_logged_in')) {
            redirect('autentic'); // Redirect to the 'autentic' page
        }
    }
    public function index()
    {
        $data['calenderdata'] = $this->calender->getAllCalender();
        $data['content']     = 'webview/calendar/calendar_view';
        $data['content_js']  = 'webview/calendar/calendar_js';
        $this->load->view('_parts/wrapper', $data);
    }
}
