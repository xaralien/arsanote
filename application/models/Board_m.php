<?php defined('BASEPATH') or exit('No direct script access allowed');

class Board_m extends CI_Model
{
    public function getBoard($id)
    {
        $this->db->select('*');
        $this->db->from('board');
        $this->db->where('is_active', 1);
        $this->db->where('id_workspace', $id);
        // $this->db->where('id_board', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAccess($id)
    {
        $this->db->select('*');
        $this->db->from('board_access');
        $this->db->where('is_active', 1);
        $this->db->where('uniqueId_board', $id);
        // $this->db->where('id_board', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function updateaccess($data, $where)
    {
        $this->db->update('board_access', $data, $where);
    }
    public function getBoardID($id)
    {
        $this->db->select('*');
        $this->db->from('board');
        $this->db->where('is_active', 1);
        $this->db->where('id', $id);
        // $this->db->where('id_board', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function saveboard($data)
    {

        $this->db->insert('board', $data);
        return $this->db->insert_id();
    }
    public function saveaccess($data)
    {

        $this->db->insert('board_access', $data);
        return $this->db->insert_id();
    }
    public function updateboard($data, $where)
    {
        $this->db->update('board', $data, $where);
    }

    public function deleteboard($data, $where)
    {
        $this->db->update('board', $data, $where);
    }
    public function getRecently($id)
    {
        $this->db->select('*');
        $this->db->from('recently_workspace');
        $this->db->where('id_workspace', $id);
        $this->db->where('id_user', $this->session->userdata('user_user_id'));
        // $this->db->where('id_board', $id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }
    public function insertRecently($data)
    {
        $this->db->insert('recently_workspace', $data);
        return $this->db->insert_id();
    }
    public function updateRecently($data, $where)
    {
        $this->db->update('recently_workspace', $data, $where);
    }
}
