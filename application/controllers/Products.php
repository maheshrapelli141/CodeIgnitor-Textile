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
       
        $data['title'] = "Rahul Textiles - Products";

        $this->form_validation->set_rules('name','Name',array('required'));
        $this->form_validation->set_rules('description','Description',array('required'));
        $this->form_validation->set_rules('price','Price',array('required'));

        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $price = $this->input->post('price');
        $product_id = substr($name, 0, 3).'-'.date('His').'-'.date('dMY');

        $this->load->view('header',$data);
        $flag= "";
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('addproduct');
        }
        else
        {
                if($this->products_model->add_product($product_id,$name,$description,$price))
                {
                    $flag = "success";
                }
                else
                {
                    $flag = "Failed to add data in database";
                }
        }
        if($flag == "success")
        {
//            $data['product_id'] = $product_id;
//            $this->load->view('productimage',$data);
            $uri = "/index.php/products/addimage/".$product_id;
            redirect($uri);
        } 
        else
        {
            $this->load->view('addproduct',$flag);
        }
        $this->load->view('footer');
	}

	public function addimage($product_id = NULL){
        $data['title'] = "Rahul Textiles - Products";

            if($this->input->post('product_id')!=NULL) {
                $product_id = $this->input->post('product_id');
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size'] = 100;
                $config['max_width'] = 1024;
                $config['max_height'] = 768;

                $this->load->library('upload', $config);
                $this->form_validation->set_rules('userfile', 'Image', array('required'));


                if (!$this->upload->do_upload('userfile')) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $imageData = $this->upload->data();
                    $imageName = $imageData['orig_name'];
                    if ($this->products_model->update_product_image($imageName, $product_id)) {
                        redirect(base_url('index.php/admin/dashboard'));
                    } else {
                        $data['error'] = 'Failed to update database';
                    }
                }
            }


        $this->load->view('header',$data);
	    if($product_id != NULL){
            $data['product'] = $this->products_model->get_product($product_id);
            $this->load->view('productimage', $data);
        }
	    else {
            $data['heading'] = "Product not selected";
            $data['description'] = "Data is not retrived from database";
            $this->load->view('empty_view',$data);
        }
        $this->load->view('footer');
    }
}
