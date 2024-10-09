<?php defined('BASEPATH') or exit('No direct script access allowed');

class Workspace_m extends CI_Model
{
    public function getAllWorkspace()
    {
        $this->db->select('a.*');
        $this->db->from('workspace as a');
        $this->db->where('a.is_active', 1);
        $this->db->order_by('a.created', 'desc'); // or 'desc' depending on your sorting preference
        $query = $this->db->get();
        return $query->result();
    }
    public function saveworkspace($data)
    {

        $this->db->insert('workspace', $data);
        return $this->db->insert_id();
    }
    public function updateworkspace($data, $where)
    {
        $this->db->update('workspace', $data, $where);
    }
}
