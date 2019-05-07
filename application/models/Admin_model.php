<?php 

class Admin_model extends CI_Model {

    var $datetime;

    public function __construct()
    {
        parent::__construct();
        $this->datetime = date("Y-m-d H:i:s");
    }

    public function login_check($username = NULL,$password = NULL){
        $query = $this->db->get('textile_admin');
        foreach($query->result() as $row){
            if($row->username==$username && $row->password==$password){
                return TRUE;
            }
        }
        return FALSE;
    }

    public function change_username($username = NULL){
        if($username === NULL) {
            return FALSE;
        }
        else {
            $data = array(
                'username' => $username,
                'updated_date' => $this->datetime
            );

            $this->db->where('id', 1);
            if ($this->db->update('textile_admin', $data)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    public function get_password()
    {
        $query = $this->db->get('textile_admin');
        $password = "";
        foreach ($query->result() as $row) {
            $password = $row->password;
        }
        return $password;
    }

    public function change_password($password = NULL){
        if($password === NULL) {
            return FALSE;
        }
        else {
            $data = array(
                'password' => $password,
                'updated_date' => $this->datetime
            );

            $this->db->where('id', 1);
            if ($this->db->update('textile_admin', $data)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
}   

?>