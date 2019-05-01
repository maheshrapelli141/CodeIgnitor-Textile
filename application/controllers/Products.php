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
    
    public function product($id = NULL){

        $data['product'] = $this->products_model->get_product($id);
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

    public function add($name = NULL,$image = NULL,$description = NULL,$price = NULL){
       
        $data['title'] = "Rahul Textiles - Products";

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);


        $this->form_validation->set_rules('name','Name',array('required'));
        $this->form_validation->set_rules('description','Description',array('required'));
        $this->form_validation->set_rules('price','Price',array('required'));
        $this->form_validation->set_rules('image','Image',array('required'));

        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $image = $this->input->post('image');
        $price = $this->input->post('price');

        $imageName = './uploads/'.basename($image);

        $this->load->view('header',$data);
        $flag= "";
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('addproduct');
        }
        else
        {
            if($this->upload->do_upload($this->input->post('image'))){
                if($this->products_model->add_product($name,$imageName,$description,$price))
                {
                    $flag = "success";
                }
                else
                {
                    $flag = "Failed to add data in database";
                }
            }
            else {
                $flag = "Failed to upload image";
            }
        }
        if($flag != "")
        {
            $this->load->view('welcomeadmin');
        } 
        else
        {
            $this->load->view('addproduct',$flag);
        }
        $this->load->view('footer');
        }
}
