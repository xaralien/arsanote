<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Board extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Board_m', 'board');
        if (!$this->session->userdata('user_logged_in')) {
            redirect('autentic'); // Redirect to the 'autentic' page
        }
    }
    public function allboard($id)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $dataRecent = $this->board->getRecently($id);
        if ($dataRecent != null) {
            $this->board->updateRecently(
                array(
                    'open_time'           => $date->format('Y-m-d H:i:s'),
                ),
                array('id_workspace' => $id, 'id_user' => $this->session->userdata('user_user_id'))
            );
        } else {
            $this->board->insertRecently(
                array(

                    'open_time'           => $date->format('Y-m-d H:i:s'),
                    'id_workspace' => $id,
                    'id_user' => $this->session->userdata('user_user_id'),
                ),
            );
        }
        $data['allboard'] = $this->board->getBoard($id);
        $data['content']     = 'webview/board/board_view';
        $data['content_js'] = 'webview/board/board_js';
        $this->load->view('_parts/wrapper', $data);
    }
    public function saveboard()
    {

        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $title = $this->input->post('labelwork');
        $selectedCheckboxes = json_decode($this->input->post('selectedCheckboxes'), true);

        $config['upload_path'] = './upload/board'; // Same as the config file
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

            $idwaktu = $date->format('Y-m-d H:i:s');

            $randomNumber = mt_rand(1000, 9999);

            // Concatenate timestamp and random number to create a unique ID
            $uniqueId = $idwaktu . $randomNumber;

            $this->board->saveboard(
                array(

                    'created'           => $date->format('Y-m-d H:i:s'),
                    'created_by'        => $this->session->userdata('user_user_id'),
                    'uniqueId' => $uniqueId,
                    'id_workspace' => $this->input->post('id_workspace'),
                    'thumbnail' => $image,
                    'name'      => $title,
                    'is_active'      => 1,
                ),
            );

            foreach ($selectedCheckboxes as $checkbox) {
                $this->board->saveaccess(
                    array(

                        'created'           => $date->format('Y-m-d H:i:s'),
                        'uniqueId_board' => $uniqueId,
                        'division' => strtoupper($checkbox),
                        'is_active'      => 1,
                    ),
                );
            }


            echo json_encode(array("status" => TRUE));
        }
    }
    public function updateboard()
    {
        $labelwork = $this->input->post('labelwork');
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

        $id_edit = $this->input->post('id_edit');
        $selectedCheckboxes = json_decode($this->input->post('selectedCheckboxes'), true);

        $data_update = [
            'updated'           => $date->format('Y-m-d H:i:s'),
            'updated_by'        => $this->session->userdata('user_user_id'),
            'name'             => $labelwork,
        ];

        $config['upload_path'] = './upload/board'; // Same as the config file
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

        $this->board->updateboard($data_update, array('id' => $id_edit));
        $board = $this->board->getBoardID($id_edit);
        $uniqueId = $board->uniqueId;
        $accessnow = $this->board->getAccess($uniqueId);
        foreach ($accessnow as $an) {
            $this->board->updateaccess(
                array(

                    'deleted'           => $date->format('Y-m-d H:i:s'),
                    // 'deleted_by'        => $this->session->userdata('user_user_id'),
                    'is_active'      => 0,
                ),
                array('id' => $an->id)
            );
        }
        foreach ($selectedCheckboxes as $checkbox) {

            $this->board->saveaccess(
                array(

                    'created'           => $date->format('Y-m-d H:i:s'),
                    'uniqueId_board' => $uniqueId,
                    'division' => strtoupper($checkbox),
                    'is_active'      => 1,
                ),
            );
        }

        echo json_encode(array("status" => TRUE));
    }
    public function delete($url, $id)
    {

        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->board->deleteboard(
            array(

                'deleted'           => $date->format('Y-m-d H:i:s'),
                // 'deleted_by'        => $this->session->userdata('user_user_id'),
                'is_active'      => 0,
            ),
            array('id' => $id)
        );
        redirect('board/allboard/' . $url);
    }
}
