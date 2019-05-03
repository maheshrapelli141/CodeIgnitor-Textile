<?php 

class Products_model extends CI_Model {


    public function get_all_products(){
        $query = $this->db->get('textile_products');
        return $query->result_array();;
    }

    public function get_product($product_id = NULL){
        $query = $this->db->get_where('textile_products',array('product_id' => $product_id));
        return $query->row_array();
    }

    //pending to check this function
    public function add_product($product_id = NULL,$name = NULL,$description = NULL,$price = NULL){
        if($name != NULL && $description != NULL && $price != NULL){
            $data = array(
                'product_id' => $product_id,
                'name' => $name,
                'description'=> $description,
                'price' => $price,
                'image' => './assets/img/no_image_available.png'
            );
            try {
                if($this->db->insert('textile_products',$data))
                    return TRUE;
                else
                    return FALSE;
            }
            catch(Exception $e){
                return FALSE;
            }
        }
    }

    public function update_product_image($imageName = NULL,$product_id = NULL){
        if($imageName === NULL OR $product_id === NULL)
        {
            return FALSE;
        }
        else
        {
            $image = './uploads/'.$imageName;
            try {
                $data = array(
                    'image' => $image
                );
                $this->db->where('product_id', $product_id);
                if($this->db->update('textile_products',$data))
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