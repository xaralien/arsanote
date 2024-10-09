<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Workspace extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Workspace_m', 'workspace');
        if (!$this->session->userdata('user_logged_in')) {
            redirect('autentic'); // Redirect to the 'autentic' page
        }
    }
    public function index()
    {
        $data['allworkspace'] = $this->workspace->getAllWorkspace();
        $data['content']     = 'webview/workspace/workspace_view';
        $data['content_js'] = 'webview/workspace/workspace_js';
        $this->load->view('_parts/wrapper', $data);
    }
    public function saveworkspace()
    {

        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $title = $this->input->post('labelwork');


        $config['upload_path'] = './upload/workspace/'; // Same as the config file
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = 'thumbnail_' . $title;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('avatar')) {
            $error = $this->upload->display_errors();
            echo json_encode(array("status" => FALSE, "error" => $error));
        } else {
            $image_data = $this->upload->data();
            $thumbnail = file_get_contents($image_data['full_path']);
            $image = $image_data['file_name'];



            $this->workspace->saveworkspace(
                array(

                    'created'           => $date->format('Y-m-d H:i:s'),
                    'created_by'        => 1,
                    'thumbnail' => $image,
                    'title'      => $title,
                    'is_active'      => 1,
                ),
            );

            echo json_encode(array("status" => TRUE));
        }
    }
    public function updateworkspace($id)
    {
        $labelwork = $this->input->post('labelwork');
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

        $id_edit = $id;
        $data_update = [
            'updated'           => $date->format('Y-m-d H:i:s'),
            'updated_by'        => $this->session->userdata('user_user_id'),
            'title'             => $labelwork,
        ];

        $config['upload_path'] = './upload/workspace/'; // Same as the config file
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = 'thumbnail_' . $labelwork;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('avatar')) {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $thumbnail = $image_data['file_name'];
            $data_update['thumbnail'] = $thumbnail;
        }

        $this->workspace->updateworkspace($data_update, array('id' => $id_edit));

        echo json_encode(array("status" => TRUE));
    }
    public function delete($id)
    {

        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->workspace->updateworkspace(
            array(
                'deleted'           => $date->format('Y-m-d H:i:s'),
                'is_active'      => 0,
            ),
            array('id' => $id)
        );
        redirect('workspace');
    }
}
