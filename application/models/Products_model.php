<?php 

class Products_model extends CI_Model {

    var $datetime;

    public function __construct()
    {
        parent::__construct();
        $this->datetime = date("Y-m-d H:i:s");
    }

    public function get_all_products(){
        $query = $this->db->get('textile_products');
        return $query->result_array();
    }

    public function get_product($product_id = NULL){
        $query = $this->db->get_where('textile_products',array('product_id' => $product_id));
        return $query->row_array();
    }

    //pending to check this function
    public function add_product($product_id = NULL,$name = NULL,$description = NULL,$bag_size = NULL,$bag_strap = NULL,$bag_shape = NULL,$weight_capacity = NULL,$strength = NULL,$bag_color = NULL,$wash = NULL,$inner_stitches = NULL,$printing_bags = NULL){
        if($product_id!=NULL && $name != NULL){
            $data = array(
                'product_id' => $product_id,
                'name' => $name,
                'description'=> $description,
                'bag_size' => $bag_size,
                'bag_strap' => $bag_strap,
                'bag_shape' => $bag_shape,
                'weight_capacity' => $weight_capacity,
                'strength' => $strength,
                'bag_color' => $bag_color,
                'wash' => $wash,
                'inner_stitches' => $inner_stitches,
                'printing_bags' => $printing_bags,
                'image' => './assets/img/no_image_available.png',
                'sec_image' => './assets/img/no_image_available.png',
                'third_image' => './assets/img/no_image_available.png',
                'fourth_image' => './assets/img/no_image_available.png',
                'fifth_image' => './assets/img/no_image_available.png',
                'updated_date' => $this->datetime
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

    public function update_product_image($imageName = NULL,$sec_imageName = NULL,$third_imageName = NULL,$fourth_imageName = NULL,$fifth_imageName = NULL,$product_id = NULL){
        if($imageName === NULL OR $imageName == "" OR $product_id === NULL)
        {
            return FALSE;
        }
        else
        {
            $image = './uploads/'.$imageName;
            $sec_image = './assets/img/no_image_available.png';
            $third_image = './assets/img/no_image_available.png';
            $fourth_image = './assets/img/no_image_available.png';
            $fifth_image = './assets/img/no_image_available.png';
            if($sec_imageName != NULL OR $sec_imageName!=""){
                $sec_image = './uploads/'.$sec_imageName;
            }
            if($third_imageName != NULL OR $third_imageName!=""){
                $third_image = './uploads/'.$third_imageName;
            }
            if($fourth_imageName != NULL OR $fourth_imageName!=""){
                $fourth_image = './uploads/'.$fourth_imageName;
            }
            if($fifth_imageName != NULL OR $fifth_imageName!=""){
                $fifth_image = './uploads/'.$fifth_imageName;
            }
            try {
                $data = array(
                    'image' => $image,
                    'sec_image' => $sec_image,
                    'third_image' => $third_image,
                    'fourth_image' => $fourth_image,
                    'fifth_image' => $fifth_image,
                    'updated_date' => $this->datetime
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

    public function update_product_details($product_id = NULL,$name = NULL,$description = NULL,$bag_size = NULL,$bag_strap = NULL,$bag_shape = NULL,$weight_capacity = NULL,$strength = NULL,$bag_color = NULL,$wash = NULL,$inner_stitches = NULL,$printing_bags = NULL){
        if($product_id === NULL OR $name === NULL)
        {
            return FALSE;
        }
        else
        {
            try {
                $data = array(
                    'name' => $name,
                    'description'=> $description,
                    'bag_size' => $bag_size,
                    'bag_strap' => $bag_strap,
                    'bag_shape' => $bag_shape,
                    'weight_capacity' => $weight_capacity,
                    'strength' => $strength,
                    'bag_color' => $bag_color,
                    'wash' => $wash,
                    'inner_stitches' => $inner_stitches,
                    'printing_bags' => $printing_bags,
                    'updated_date' => $this->datetime
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

    public function delete_product($product_id = NULL){
        if($product_id === NULL){
            return FALSE;
        }
        else {
            try{
                $this->db->where('product_id',$product_id);
                if($this->db->delete('textile_products'))
                {
                    return TRUE;
                }
                else {
                    return FALSE;
                }
            }
            catch (Exception $exception){
                log_message($exception);
                return FALSE;
            }
        }
    }

    public function update_first_image($product_id = NULL,$imageName = NULL){
        if($product_id === NULL OR $imageName === NULL){
            return FALSE;
        }
        else {
            try {
                $image = './uploads/'.$imageName;
                $data = array(
                    'image' => $image,
                    'updated_date' => $this->datetime
                );
                $this->db->where('product_id', $product_id);
                if ($this->db->update('textile_products',$data)) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
            catch (Exception $exception){
                log_message($exception);
                return FALSE;
            }
        }
    }


    public function update_second_image($product_id = NULL,$imageName = NULL){
        if($product_id === NULL OR $imageName === NULL){
            return FALSE;
        }
        else {
            try {
                $image = './uploads/'.$imageName;
                $data = array(
                    'sec_image' => $image,
                    'updated_date' => $this->datetime
                );
                $this->db->where('product_id', $product_id);
                if ($this->db->update('textile_products',$data)) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
            catch (Exception $exception){
                log_message($exception);
                return FALSE;
            }
        }
    }

    public function update_third_image($product_id = NULL,$imageName = NULL){
        if($product_id === NULL OR $imageName === NULL){
            return FALSE;
        }
        else {
            try {
                $image = './uploads/'.$imageName;
                $data = array(
                    'third_image' => $image,
                    'updated_date' => $this->datetime
                );
                $this->db->where('product_id', $product_id);
                if ($this->db->update('textile_products',$data)) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
            catch (Exception $exception){
                log_message($exception);
                return FALSE;
            }
        }
    }

    public function update_fourth_image($product_id = NULL,$imageName = NULL){
        if($product_id === NULL OR $imageName === NULL){
            return FALSE;
        }
        else {
            try {
                $image = './uploads/'.$imageName;
                $data = array(
                    'fourth_image' => $image,
                    'updated_date' => $this->datetime
                );
                $this->db->where('product_id', $product_id);
                if ($this->db->update('textile_products',$data)) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
            catch (Exception $exception){
                log_message($exception);
                return FALSE;
            }
        }
    }

    public function update_fifth_image($product_id = NULL,$imageName = NULL){
        if($product_id === NULL OR $imageName === NULL){
            return FALSE;
        }
        else {
            try {
                $image = './uploads/'.$imageName;
                $data = array(
                    'fifth_image' => $image,
                    'updated_date' => $this->datetime
                );
                $this->db->where('product_id', $product_id);
                if ($this->db->update('textile_products',$data)) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
            catch (Exception $exception){
                log_message($exception);
                return FALSE;
            }
        }
    }
}


?>