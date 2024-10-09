<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detailboard extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        $this->load->model('Detailboard_m', 'board');
        if (!$this->session->userdata('user_logged_in')) {
            redirect('autentic'); // Redirect to the 'autentic' page
        }
    }
    public function detail($workspaceid, $id)
    {
        $board = $this->board->getboarddetail($id);
        $akses = $this->board->getaccess($board->uniqueId);
        $pass = false;
        foreach ($akses as $a) {
            if ($this->session->userdata('division') == $a->division) {
                $pass = true;
            }
        }
        if ($this->session->userdata('division') == 'GM' || $this->session->userdata('division') == 'OM') {
            $pass = true;
        }

        if ($pass) {
            $data['list'] = $this->board->getList($id);
            $data['content']     = 'webview/detail_board/board_view';
            $data['content_js'] = 'webview/detail_board/board_js';
            $this->load->view('_parts/wrapper', $data);
        } else {
            return redirect('board/allboard/' . $workspaceid);
        }
    }
    public function card_item($id)
    {
        $data = $this->board->get_item_card($id);

        echo json_encode($data);
    }
    public function savelist($id)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->board->savelist(
            array(
                'id_board'  => $id,
                'name'           => $this->input->post('list_name'),
                'created'           => $date->format('Y-m-d H:i:s'),
                'created_by'        => $this->session->userdata('user_user_id'),
                'is_active'      => 1,
            )
        );
        echo json_encode(array("status" => TRUE));
    }

    public function savecard($id)
    {

        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->board->savecard(
            array(
                'id_list'  => $id,
                'name'           => $this->input->post('text_add_card_' . $id),
                'created'           => $date->format('Y-m-d H:i:s'),
                'created_by'        => $this->session->userdata('user_user_id'),
                'is_active'      => 1,
            )
        );
        echo json_encode(array("status" => TRUE));
    }
    public function savelabel()
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->board->savelabel(
            array(
                'id_card'  => $this->input->post('id_detail'),
                'name'           => $this->input->post('labelInput'),
                'color'           => $this->input->post('color'),
                'created'           => $date->format('Y-m-d H:i:s'),
                'is_active'      => 1,
            )
        );
        echo json_encode(array("status" => TRUE));
    }
    public function savechecklist()
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->board->savechecklist(
            array(
                'id_card'  => $this->input->post('id_detail'),
                'name'           => $this->input->post('checklist_name'),
                'created'           => $date->format('Y-m-d H:i:s'),
                'is_active'      => 1,
            )
        );
        echo json_encode(array("status" => TRUE));
    }

    public function udpdatecard()
    {

        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->board->udpdatecard(
            array(

                'updated'           => $date->format('Y-m-d H:i:s'),
                'name'       => $this->input->post('name'),
                'description'           => $this->input->post('desc'),
                'date'           => $this->input->post('date'),
            ),
            array('id' => $this->input->post('id_detail'))
        );
        echo json_encode(array("status" => TRUE));
    }
    public function updateposition()
    {
        $positions = $this->input->post('positions'); // Retrieve positions from the posted data

        if (!empty($positions)) {
            foreach ($positions as $p) {
                // Check if 'id' key exists in the current position array
                if (array_key_exists('id', $p)) {
                    $this->board->updatelist(
                        array(
                            'position' => $p['position_number'],
                        ),
                        array('id' => $p['id'])
                    );
                } else {
                    // Handle the case where 'id' key is missing
                    // You may log an error, skip the element, or take other appropriate action
                }
            }

            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE, "error" => "No positions provided."));
        }
    }
    public function updatepositioncard()
    {
        $positions = $this->input->post('positions'); // Retrieve positions from the posted data

        if (!empty($positions)) {
            foreach ($positions as $p) {
                // Check if 'id' key exists in the current position array
                if (array_key_exists('id', $p)) {
                    $this->board->updatelist(
                        array(
                            'position' => $p['position_number'],
                        ),
                        array('id' => $p['id'])
                    );
                } else {
                    // Handle the case where 'id' key is missing
                    // You may log an error, skip the element, or take other appropriate action
                }
            }

            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE, "error" => "No positions provided."));
        }
    }
    public function updatelist()
    {

        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->board->updatelist(
            array(
                'name'           => $this->input->post('list_name'),
                'updated'           => $date->format('Y-m-d H:i:s'),
                'updated_by'        => $this->session->userdata('user_user_id'),
            ),
            array('id' => $this->input->post('id_edit'))
        );
        echo json_encode(array("status" => TRUE));
    }

    public function deletelist($id)
    {

        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->board->deletelist(
            array(

                'deleted'           => $date->format('Y-m-d H:i:s'),
                'deleted_by'        => $this->session->userdata('user_user_id'),
                'is_active'      => 0,
            ),
            array('id' => $id)
        );
        echo json_encode(array("status" => TRUE));
    }
    // public function save()
    // {
    //     $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
    //     $this->poling->save(
    //         array(

    //             'created'           => $date->format('Y-m-d H:i:s'),
    //             'id_capres'      => $this->input->post('capres'),
    //             'id_cawapres'      => $this->input->post('cawapres'),
    //         ),
    //         array('id' => $this->input->post('id_add'))
    //     );
    //     echo json_encode(array("status" => TRUE));
    // }
    public function ajax_edit_card($id)
    {
        $data = $this->board->get_id_edit_card($id);
        $label = $this->board->get_label_card($id);
        $checklist = $this->board->get_checklist_card($id);
        $activity = $this->board->get_activity_card($id);
        $result = array(
            'data' => $data,
            'label' => $label,
            'checklist' => $checklist,
            'activity' => $activity
        );
        echo json_encode($result);
    }
    public function udpdatchecklist()
    {
        $idCard = $this->input->post('idCard');
        $isChecked = $this->input->post('isChecked');

        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->board->udpdatchecklist(
            array(
                'status'           => $isChecked,
                'updated'           => $date->format('Y-m-d H:i:s'),
                'updated_by'        => $this->session->userdata('user_user_id'),
            ),
            array('id' => $idCard)
        );
        echo json_encode(array("status" => TRUE));
    }
    public function udpdatchecklistname()
    {
        $itemId = $this->input->post('itemId');
        $newName = $this->input->post('newName');

        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->board->udpdatchecklist(
            array(
                'name'           => $newName,
                'updated'           => $date->format('Y-m-d H:i:s'),
                'updated_by'        => $this->session->userdata('user_user_id'),
            ),
            array('id' => $itemId)
        );
        echo json_encode(array("status" => TRUE));
    }
    public function udpdatchecklistnote()
    {
        $itemId = $this->input->post('itemId');
        $newNote = $this->input->post('newNote');

        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->board->udpdatchecklist(
            array(
                'note'           => $newNote,
                'updated'           => $date->format('Y-m-d H:i:s'),
                'updated_by'        => $this->session->userdata('user_user_id'),
            ),
            array('id' => $itemId)
        );
        echo json_encode(array("status" => TRUE));
    }
    public function delete_checklist()
    {
        $itemId = $this->input->post('itemId');
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->board->udpdatchecklist(
            array(

                'deleted'           => $date->format('Y-m-d H:i:s'),
                'deleted_by'        => $this->session->userdata('user_user_id'),
                'is_active'      => 0,
            ),
            array('id' => $itemId)
        );
        echo json_encode(array("status" => TRUE));
    }
    public function saveactivity()
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->board->saveactivity(
            array(
                'id_card'  => $this->input->post('id_detail'),
                'id_user'           => $this->session->userdata('user_user_id'),
                'message'           => $this->input->post('message'),
                'created'           => $date->format('Y-m-d H:i:s'),
                'is_active'      => 1,
            )
        );
        echo json_encode(array("status" => TRUE));
    }
    public function delete_activity()
    {
        $itemId = $this->input->post('itemId');
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->board->updateactivity(
            array(

                'deleted'           => $date->format('Y-m-d H:i:s'),
                'is_active'      => 0,
            ),
            array('id' => $itemId)
        );
        echo json_encode(array("status" => TRUE));
    }
    public function updateactivity()
    {
        $itemId = $this->input->post('itemId');
        $newMessage = $this->input->post('newMessage');

        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->board->updateactivity(
            array(
                'message'           => $newMessage,
                'updated'           => $date->format('Y-m-d H:i:s'),
            ),
            array('id' => $itemId)
        );
        echo json_encode(array("status" => TRUE));
    }
    public function updatelabel()
    {
        $itemId = $this->input->post('itemId');
        $color = $this->input->post('color');
        $labelInput = $this->input->post('labelInput');

        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $this->board->updatelabel(
            array(
                'color'           => $color,
                'name'             => $labelInput,
                'updated'           => $date->format('Y-m-d H:i:s'),
            ),
            array('id' => $itemId)
        );
        echo json_encode(array("status" => TRUE));
    }
}
