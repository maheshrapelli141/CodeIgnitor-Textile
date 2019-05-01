<?php 

class Products_model extends CI_Model {


    public function get_all_products(){
        $query = $this->db->get('textile_products');
        return $query->result_array();;
    }

    public function get_product($id = NULL){
        $query = $this->db->get_where('textile_products',array('id' => $id));
        return $query->row_array();
    }

    //pending to check this function
    public function add_product($name = NULL,$image = NULL,$description = NULL,$price = NULL){
        if($name != NULL && $image != NULL && $description != NULL && $price != NULL){
            $data = array(
                'name' => $name,
                'image'=> $image,
                'description'=> $description,
                'price' => $price
            );
            try {
                if($this->db->set($data)->get_compiled_insert('textile_admin'))
                    return TRUE;
                else
                    return FALSE;
            }
            catch(Exception $e){
                return FALSE;
            }
        }
    }
}   

?>