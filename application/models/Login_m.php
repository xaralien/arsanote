<?php
class Login_m extends CI_Model
{
    public function getUser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('is_active', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function user_login($email, $password)
    {
        $this->db->select('u.*');
        $this->db->from('user u');
        // $this->db->join('mast_regional m', 'u.id_regional=m.id', 'left');

        $this->db->where('u.email', $email);

        $this->db->where('u.is_active', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        $user = $query->row();
        if (!empty($user) && password_verify($password, $user->password) && $user->is_active == 1) {
            return $user;
        } else {
            return false;
        }
    }
}
