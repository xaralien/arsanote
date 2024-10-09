<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home_m extends CI_Model
{
    public function getRecent()
    {
        $this->db->select('a.*');
        $this->db->from('workspace as a');
        $this->db->join('recently_workspace as b', 'b.id_workspace = a.id', 'left');
        $this->db->join('user as c', 'b.id_user = c.id', 'left');
        $this->db->where('a.is_active', 1);
        $this->db->where('b.id_user', $this->session->userdata('user_user_id'));
        $this->db->order_by('b.open_time', 'desc'); // or 'desc' depending on your sorting preference
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
    }
    public function getNewest()
    {
        $this->db->select('a.*');
        $this->db->from('workspace as a');
        $this->db->where('a.is_active', 1);
        $this->db->order_by('a.created', 'desc'); // or 'desc' depending on your sorting preference
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
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

    public function updatelist($data, $where)
    {
        $this->db->update('list', $data, $where);
    }

    public function deletelist($data, $where)
    {
        $this->db->update('list', $data, $where);
    }
}
