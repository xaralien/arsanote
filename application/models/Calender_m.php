<?php
class Calender_m extends CI_Model
{
    public function getAllCalender()
    {
        $this->db->select('*');
        $this->db->from('card');
        $this->db->where('is_active', 1);
        $this->db->where('date IS NOT NULL', null, false);
        $query = $this->db->get();
        return $query->result();
    }
}
