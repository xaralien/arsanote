<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autentic extends CI_Controller
{


    function __construct()
    {

        parent::__construct();
        $this->load->model('Login_m', 'login');
    }
    public function index()
    {
        $data['user'] = $this->login->getUser();
        $data['content']     = 'webview/user/login_view';
        $this->load->view('_parts/wrapper', $data);
    }

    function proses_login()
    {
        if ($this->session->userdata('user_logged_in') == 'true') {
            redirect('admin/dashboard');
        }

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $active     = 1;


        $user = $this->login->user_login($email, $password);

        if (!empty($user)) {
            $this->session->set_userdata([
                'user_user_id'   => $user->id,
                'name'  => $user->name,
                'email'  => $user->email,
                'division'  => $user->division,
                // 'id_role'      => $user->id_role,
                // 'user_email'      => $user->email,
                // 'last_acces_time'      => $user->last_acces,
                'user_logged_in' => true
            ]);
            redirect('home/');
        } else {
            // redirect('autentic/');
            echo 'gagal';
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('user_user_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('division');
        $this->session->unset_userdata('user_logged_in');
        // $this->session->unset_userdata('user_email');
        $this->session->sess_destroy();

        $url = base_url();
        redirect('autentic/');
    }
}
