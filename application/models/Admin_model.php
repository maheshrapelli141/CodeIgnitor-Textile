<?php 

class Admin_model extends CI_Model {

    public function login_check($username = NULL,$password = NULL){
        $query = $this->db->get('textile_admin');
        foreach($query->result() as $row){
            if($row->username==$username && $row->password==$password){
                return TRUE;
            }
        }
        return FALSE;
    }
}   

?>