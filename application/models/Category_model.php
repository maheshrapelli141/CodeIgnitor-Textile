<?php

class Category_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function add_category($category = NULL){
        if($category === NULL){
            return FALSE;
        }
        else {
            $datetime = new DateTime();
            $data = array(
                'category' => $category,
                'updated_date' => $datetime->format('Y-m-d H:i:s')
            );
            if($this->db->insert('textile_category',$data)){
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
    }

    public function update_category($category_id = NULL,$category = NULL){
        if($category_id === NULL OR $category === NULL){
            return FALSE;
        }
        else {
            $datetime = new DateTime();
            $data = array(
                'category' => $category,
                'updated_date' => $datetime->format('Y-m-d H:i:s')
            );
            $this->db->where('id',$category_id);
            if($this->db->update('textile_category',$data)){
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
    }

    public function remove_category($category_id = NULL){
        if($category_id === NULL){
            return FALSE;
        }
        else {
            $this->db->where('id',$category_id);
            if($this->db->delete('textile_category')){
                return TRUE;
            }
            else {
                return FAlSE;
            }
        }
    }

    public function get_category($category_id = NULL){
        if($category_id === NULL){
            return FALSE;
        }
        else {
            $query = $this->db->get_where('textile_category',array('id'=>$category_id));
            return $query->row_array();
        }
    }

    public function get_all_categories(){
        $query = $this->db->get('textile_category');
        return $query->result_array();;
    }
}

?>