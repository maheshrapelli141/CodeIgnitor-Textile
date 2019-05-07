<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    

	public function __construct()
	{
			parent::__construct();
			$this->load->model('products_model');
			$this->load->helper('url_helper');
    }
    
	public function index()
	{
        $data['title'] = "Rahul Textiles - Products";

        try{
            $data['products'] = $this->products_model->get_all_products();

            $this->load->view('header',$data);
            if (empty($data['products']))
            {
                $data['heading'] = "No Products Found";
                $data['description'] = "No products are uploaded yet by admin";    
                $this->load->view('empty_view',$data);
            } 
            else
            {
                $this->load->view('productsview',$data);
            }
        }
        catch(Exception $e) {
            $data['heading'] = "Error in loading products";
            $data['description'] = "Data is not retrived from database";    
            $this->load->view('empty_view',$data);
            log_message($e);
        }
        $this->load->view('footer');
		
    }
    
    public function product($product_id = NULL){

        $data['product'] = $this->products_model->get_product($product_id);
        $data['title'] = "Rahul Textiles - ".$data['product']['name'];

        try{
            $this->load->view('header',$data);
            if (empty($data['product']))
            {
                $data['heading'] = "Product not found";
                $data['description'] = "Product details not found at server";    
                $this->load->view('empty_view',$data);
            } 
            else
            {
                $this->load->view('singleproduct',$data);
            }
        }
        catch(Exception $e) {
            $data['heading'] = "Error in loading product";
            $data['description'] = "Data is not retrived from database";    
            $this->load->view('empty_view',$data);
            log_message($e);
        }
        $this->load->view('footer');
    }

    public function addproduct(){
        $data['title'] = "Rahul Textiles - Add Product";

        $this->load->view('header',$data);
        if($this->session->has_userdata('adminusername')){
            $this->load->view('addproduct');
        }
        else {
            redirect(base_url('/index.php/admin'));
        }
        $this->load->view('footer');
    }

    public function add(){
        if($this->session->has_userdata('adminusername')) {
            $data['title'] = "Rahul Textiles - Products";

            $this->form_validation->set_rules('name', 'Name', array('required'));
            $this->form_validation->set_rules('description', 'Description', array('required'));
            $this->form_validation->set_rules('price', 'Price', array('required'));

            $name = $this->input->post('name');
            $description = $this->input->post('description');
            $price = $this->input->post('price');
            $product_id = substr($name, 0, 3) . '-' . date('His') . '-' . date('dMY');

            $this->load->view('header', $data);
            $flag = "";
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('addproduct');
            } else {
                if ($this->products_model->add_product($product_id, $name, $description, $price)) {
                    $flag = "success";
                } else {
                    $flag = "Failed to add data in database";
                }
            }
            if ($flag == "success") {
                $uri = "/index.php/products/addimage/" . $product_id;
                redirect($uri);
            } else {
                $this->load->view('addproduct', $flag);
            }
            $this->load->view('footer');
        }
        else {
            redirect(base_url('/index.php/admin'));
        }
	}

	public function addimage($product_id = NULL){
        if($this->session->has_userdata('adminusername')) {
            $data['title'] = "Rahul Textiles - Products";

            if ($this->input->post('product_id') != NULL) {

                $product_id = $this->input->post('product_id');
                $imageCount = count(array_filter($_FILES['userfile']['name']));

                if ($imageCount < 1) {
                    $data['error'] = "The Image field is required";
                } else {
                    if ($imageCount > 2) {
                        $data['error'] = "Maximum 2 images can upload";
                    } else {
                        $imageNames = array();
                        $imageNames[0] = "";
                        $imageNames[1] = "";
                        for ($i = 0; $i < $imageCount; $i++) {
                            $config['upload_path'] = './uploads/';
                            $config['allowed_types'] = 'jpeg|jpg|png';
//                            $config['max_size'] = 1000;
//                            $config['max_width'] = 1024;
//                            $config['max_height'] = 768;


                            $_FILES['file']['name'] = $_FILES['userfile']['name'][$i];
                            $_FILES['file']['type'] = $_FILES['userfile']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
                            $_FILES['file']['error'] = $_FILES['userfile']['error'][$i];
                            $_FILES['file']['size'] = $_FILES['userfile']['size'][$i];

                            $imageName = time() . $_FILES['file']['name'];
                            $config['file_name'] = $imageName;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);

                            if (!$this->upload->do_upload('file')) {
                                $data['error'] = $this->upload->display_errors();
                            } else {
                                $imageData = $this->upload->data();
                                $imageNames[$i] = $imageName;
                            }
                        }
                        if ($this->products_model->update_product_image($imageNames[0], $imageNames[1], $product_id)) {
                            redirect(base_url('index.php/products/addimage/' . $product_id));
                        } else {
                            var_dump($imageNames[0] . " - " . $imageNames[1]);
                            $data['error'] = 'Failed to update database';
                        }
                    }
                }
            }


            $this->load->view('header', $data);
            if ($product_id != NULL) {
                $data['product'] = $this->products_model->get_product($product_id);
                $this->load->view('productimage', $data);
            } else {
                $data['heading'] = "Product not selected";
                $data['description'] = "Data is not retrived from database";
                $this->load->view('empty_view', $data);
            }
            $this->load->view('footer');
        }
        else {
            redirect(base_url('/index.php/admin'));
        }
    }

    public function updateimage($product_id = NULL){
        if($this->session->has_userdata('adminusername')) {
            $data['title'] = "Rahul Textiles - Products";

            if ($this->input->post('product_id') != NULL) {

                $product_id = $this->input->post('product_id');
                $imageCount = count(array_filter($_FILES['userfile']['name']));

                if ($imageCount < 1) {
                    $data['error'] = "The Image field is required";
                } else {
                    if ($imageCount > 2) {
                        $data['error'] = "Maximum 2 images can upload";
                    } else {
                        $imageNames = array();
                        $imageNames[0] = "";
                        $imageNames[1] = "";
                        for ($i = 0; $i < $imageCount; $i++) {
                            $config['upload_path'] = './uploads/';
                            $config['allowed_types'] = 'jpeg|jpg|png';
//                            $config['max_size'] = 1000;
//                            $config['max_width'] = 1024;
//                            $config['max_height'] = 768;


                            $_FILES['file']['name'] = $_FILES['userfile']['name'][$i];
                            $_FILES['file']['type'] = $_FILES['userfile']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
                            $_FILES['file']['error'] = $_FILES['userfile']['error'][$i];
                            $_FILES['file']['size'] = $_FILES['userfile']['size'][$i];

                            $imageName = time() . $_FILES['file']['name'];
                            $config['file_name'] = $imageName;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);

                            if (!$this->upload->do_upload('file')) {
                                $data['error'] = $this->upload->display_errors();
                            } else {
                                $imageData = $this->upload->data();
                                $imageNames[$i] = $imageName;
                            }
                        }
                        if ($this->products_model->update_product_image($imageNames[0], $imageNames[1], $product_id)) {
                            $this->session->set_flashdata('product_image_message', 'Images updates successfully');
                            redirect(base_url('index.php/products/updateimage/' . $product_id));
                        } else {
                            var_dump($imageNames[0] . " - " . $imageNames[1]);
                            $data['error'] = 'Failed to update database';
                        }
                    }
                }
            }


            $this->load->view('header', $data);
            if ($product_id != NULL) {
                $data['product'] = $this->products_model->get_product($product_id);
                $this->load->view('updateproduct', $data);
            } else {
                $data['heading'] = "Product not selected";
                $data['description'] = "Data is not retrived from database";
                $this->load->view('empty_view', $data);
            }
            $this->load->view('footer');
        }
        else {
            redirect(base_url('/index.php/admin'));
        }
    }

    public function updatefirstimage()
    {
        if($this->session->has_userdata('adminusername')) {
            if ($this->input->post('product_id') != NULL) {

                $product_id = $this->input->post('product_id');


                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpeg|jpg|png';


                $_FILES['file']['name'] = $_FILES['userfile']['name'];
                $_FILES['file']['type'] = $_FILES['userfile']['type'];
                $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'];
                $_FILES['file']['error'] = $_FILES['userfile']['error'];
                $_FILES['file']['size'] = $_FILES['userfile']['size'];

                $imageName = time() . $_FILES['file']['name'];
                $config['file_name'] = $imageName;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('file')) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $imageData = $this->upload->data();
                    $imageName = $imageData['orig_name'];
                }
            }
            if ($this->products_model->update_first_image($product_id, $imageName)) {
                $this->session->set_flashdata('product_image_message', 'Image updated successfully');
                redirect(base_url('index.php/products/updateimage/' . $product_id));
            } else {
                $data['error'] = 'Failed to update database';
            }
        }
        else {
            redirect(base_url('/index.php/admin'));
        }
    }

    public function updatesecondimage()
    {
        if($this->session->has_userdata('adminusername')) {
            if ($this->input->post('product_id') != NULL) {

                $product_id = $this->input->post('product_id');


                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpeg|jpg|png';


                $_FILES['file']['name'] = $_FILES['userfile']['name'];
                $_FILES['file']['type'] = $_FILES['userfile']['type'];
                $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'];
                $_FILES['file']['error'] = $_FILES['userfile']['error'];
                $_FILES['file']['size'] = $_FILES['userfile']['size'];

                $imageName = time() . $_FILES['file']['name'];
                $config['file_name'] = $imageName;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('file')) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $imageData = $this->upload->data();
                    $imageName = $imageData['orig_name'];
                }
            }
            if ($this->products_model->update_second_image($product_id, $imageName)) {
                $this->session->set_flashdata('product_image_message', 'Image updated successfully');
                redirect(base_url('index.php/products/updateimage/' . $product_id));
            } else {
                $data['error'] = 'Failed to update database';
            }
        }
        else {
            redirect(base_url('/index.php/admin'));
        }
    }

    public function updateproduct($product_id = NULL){
	    if($this->session->has_userdata('adminusername')) {
            $data['title'] = 'Update Product';
            $data['product'] = $this->products_model->get_product($product_id);

            if($this->input->post('product_id')!=NULL) {

                $product_id = $this->input->post('product_id');
                $name = $this->input->post('name');
                $price = $this->input->post('price');
                $description = $this->input->post('description');
                if($this->products_model->update_product_details($product_id,$name,$price,$description)){
                    $this->session->set_flashdata('product_details_message','Updation success');
                    redirect(base_url('index.php/products/updateproduct/'.$product_id));
                }
                else {
                    $data['error'] = 'Failed to update database';
                }
            }


            $this->load->view('header', $data);
            $this->load->view('updateproduct', $data);
            $this->load->view('footer', $data);
        }
	    else {
	        redirect(base_url('/index.php/admin/'));
        }
    }

    public function deleteproduct($product_id = NULL) {
        if($this->session->has_userdata('adminusername')) {
            if ($product_id === NULL) {
                $this->session->set_flashdata('delete_message', 'Invalid Product details');
                redirect(base_url('index.php/admin/dashboard'));
            } else {
                if ($this->products_model->delete_product($product_id)) {
                    $this->session->set_flashdata('delete_message', 'Product deleted successfully');
                    redirect(base_url('index.php/admin/dashboard'));
                } else {
                    $this->session->set_flashdata('delete_message', 'Product not deleted from database');
                    redirect(base_url('index.php/admin/dashboard'));
                }
            }
        }
        else {
            redirect(base_url('/index.php/admin'));
        }
    }
}
