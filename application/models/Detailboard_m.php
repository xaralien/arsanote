<?php defined('BASEPATH') or exit('No direct script access allowed');

class Detailboard_m extends CI_Model
{
    public function getList($id)
    {
        $this->db->select('*');
        $this->db->from('list');
        $this->db->where('is_active', 1);
        $this->db->where('id_board', $id);
        $this->db->order_by('position', 'asc'); // or 'desc' depending on your sorting preference
        $query = $this->db->get();
        return $query->result();
    }
    public function getaccess($id)
    {
        $this->db->select('*');
        $this->db->from('board_access');
        $this->db->where('is_active', 1);
        $this->db->where('uniqueId_board', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getboarddetail($id)
    {
        $this->db->select('*');
        $this->db->from('board');
        $this->db->where('is_active', 1);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function savelist($data)
    {

        $this->db->insert('list', $data);
        return $this->db->insert_id();
    }

    public function savecard($data)
    {

        $this->db->insert('card', $data);
        return $this->db->insert_id();
    }
    public function savelabel($data)
    {

        $this->db->insert('label', $data);
        return $this->db->insert_id();
    }
    public function savechecklist($data)
    {

        $this->db->insert('checklist', $data);
        return $this->db->insert_id();
    }
    public function updatelist($data, $where)
    {
        $this->db->update('list', $data, $where);
    }
    public function udpdatecard($data, $where)
    {
        $this->db->update('card', $data, $where);
    }
    public function deletelist($data, $where)
    {
        $this->db->update('list', $data, $where);
    }
    public function get_id_edit_card($id)
    {
        $this->db->select('*');
        $this->db->from('card');
        $this->db->where('id', $id);
        $this->db->where('is_active', 1);
        $query = $this->db->get();

        return $query->row();
    }
    public function get_label_card($id)
    {
        $this->db->select('*');
        $this->db->from('label');
        $this->db->where('id_card', $id);
        $this->db->where('is_active', 1);
        $this->db->order_by('created', 'desc');
        $query = $this->db->get();

        return $query->result();
    }
    public function get_checklist_card($id)
    {
        $this->db->select('*');
        $this->db->from('checklist');
        $this->db->where('id_card', $id);
        $this->db->where('is_active', 1);
        $this->db->order_by('created', 'desc');
        $query = $this->db->get();

        return $query->result();
    }
    public function udpdatchecklist($data, $where)
    {
        $this->db->update('checklist', $data, $where);
    }
    public function get_activity_card($id)
    {
        $this->db->select('a.*, b.name');
        $this->db->from('activity as a');
        $this->db->join('user as b', 'b.id = a.id_user');
        $this->db->where('a.id_card', $id);
        $this->db->where('a.is_active', 1);
        $this->db->order_by('a.created', 'desc');
        $query = $this->db->get();

        return $query->result();
    }
    public function saveactivity($data)
    {

        $this->db->insert('activity', $data);
        return $this->db->insert_id();
    }
    public function updateactivity($data, $where)
    {
        $this->db->update('activity', $data, $where);
    }
    public function updatelabel($data, $where)
    {
        $this->db->update('label', $data, $where);
    }
}
